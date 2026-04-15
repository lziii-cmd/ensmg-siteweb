#!/bin/bash

SETTINGS="/var/www/html/sites/default/settings.php"

echo "==> Génération de settings.php..."
cat > $SETTINGS << 'PHP'
<?php
$db = parse_url(getenv('DATABASE_URL'));
$databases['default']['default'] = [
  'database'  => ltrim($db['path'], '/'),
  'username'  => urldecode($db['user']),
  'password'  => urldecode($db['pass']),
  'host'      => $db['host'],
  'port'      => (string)($db['port'] ?? '5432'),
  'driver'    => 'pgsql',
  'namespace' => 'Drupal\\pgsql\\Driver\\Database\\pgsql',
  'autoload'  => 'core/modules/pgsql/src/Driver/Database/pgsql/',
  'prefix'    => '',
];
$settings['hash_salt'] = getenv('HASH_SALT') ?: 'ensmg-hash-changeme-2025';
$settings['config_sync_directory'] = 'sites/default/files/config_sync';
$settings['trusted_host_patterns'] = ['^.*\.onrender\.com$', '^localhost$'];
PHP

echo "==> settings.php généré."
echo "==> DATABASE_URL défini : $([ -n "$DATABASE_URL" ] && echo OUI || echo NON)"

echo "==> Attente de la base de données (15s)..."
sleep 15

echo "==> Vérification connexion DB..."
DB_CHECK=$(vendor/bin/drush sql:query "SELECT 1" 2>&1)
echo "==> Résultat : $DB_CHECK"

if echo "$DB_CHECK" | grep -q "1"; then
  echo "==> DB connectée. Vérification installation Drupal..."
  USER_COUNT=$(vendor/bin/drush sql:query "SELECT COUNT(*) FROM users_field_data" 2>&1)
  if echo "$USER_COUNT" | grep -qE "^[0-9]+$"; then
    echo "==> Drupal déjà installé. Mise à jour de la configuration et du thème..."
    echo "==> Réinitialisation du mot de passe admin..."
    vendor/bin/drush user:password admin "${DRUPAL_ADMIN_PASS:-Admin@ENSMG2025}" || true
    vendor/bin/drush config:import --yes || true
    vendor/bin/drush theme:install ensmg_theme -y || true
    vendor/bin/drush config:set system.theme default ensmg_theme -y || true
    vendor/bin/drush php:script scripts/setup_blocks.php || true
    echo "==> Vidage du cache..."
    vendor/bin/drush cr
  else
    echo "==> Tables absentes. Installation de Drupal..."
    vendor/bin/drush site-install standard \
      --site-name="ENSMG - École des Mines et de la Géologie" \
      --account-name=admin \
      --account-pass="${DRUPAL_ADMIN_PASS:-Admin@ENSMG2025}" \
      --yes
    echo "==> Import de la configuration locale..."
    vendor/bin/drush config:import --yes || true
    echo "==> Activation du thème ENSMG..."
    vendor/bin/drush theme:install ensmg_theme -y
    vendor/bin/drush config:set system.theme default ensmg_theme -y
    echo "==> Import du contenu (pages, menus, actualités)..."
    vendor/bin/drush php:script scripts/import_content.php
    vendor/bin/drush cr
  fi
else
  echo "==> ERREUR : Impossible de se connecter à la base de données."
  echo "==> Détail : $DB_CHECK"
  echo "==> Démarrage d'Apache quand même..."
fi

echo "==> Démarrage d'Apache..."
exec "$@"
