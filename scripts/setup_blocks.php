<?php
/**
 * ENSMG - Configure les blocs du theme
 * Execution : vendor\bin\drush php:script scripts\setup_blocks.php
 */

use Drupal\block\Entity\Block;

$theme = 'ensmg_theme';

// 1. Supprimer tous les blocs existants du theme pour repartir propre
$existing = \Drupal::entityTypeManager()->getStorage('block')->loadByProperties(['theme' => $theme]);
foreach ($existing as $block) {
  echo "Suppression bloc: " . $block->id() . "\n";
  $block->delete();
}

// 2. Creer les blocs necessaires

// Menu principal dans primary_menu
$b = Block::create([
  'id' => 'ensmg_main_nav',
  'plugin' => 'system_menu_block:main',
  'theme' => $theme,
  'region' => 'primary_menu',
  'weight' => 0,
  'status' => TRUE,
  'settings' => [
    'id' => 'system_menu_block:main',
    'label' => 'Navigation principale',
    'label_display' => '0',
    'provider' => 'system',
    'level' => 1,
    'depth' => 3,
    'expand_all_items' => FALSE,
  ],
  'visibility' => [],
]);
$b->save();
echo "Cree: menu principal\n";

// Contenu principal
$b = Block::create([
  'id' => 'ensmg_content',
  'plugin' => 'system_main_block',
  'theme' => $theme,
  'region' => 'content',
  'weight' => 0,
  'status' => TRUE,
  'settings' => [
    'id' => 'system_main_block',
    'label' => 'Contenu principal',
    'label_display' => '0',
    'provider' => 'system',
  ],
  'visibility' => [],
]);
$b->save();
echo "Cree: contenu principal\n";

// Messages systeme (highlighted)
$b = Block::create([
  'id' => 'ensmg_messages',
  'plugin' => 'system_messages_block',
  'theme' => $theme,
  'region' => 'highlighted',
  'weight' => -100,
  'status' => TRUE,
  'settings' => [
    'id' => 'system_messages_block',
    'label' => 'Messages',
    'label_display' => '0',
    'provider' => 'system',
  ],
  'visibility' => [],
]);
$b->save();
echo "Cree: messages\n";

// Fil d'Ariane
$b = Block::create([
  'id' => 'ensmg_breadcrumb',
  'plugin' => 'system_breadcrumb_block',
  'theme' => $theme,
  'region' => 'breadcrumb',
  'weight' => 0,
  'status' => TRUE,
  'settings' => [
    'id' => 'system_breadcrumb_block',
    'label' => "Fil d'Ariane",
    'label_display' => '0',
    'provider' => 'system',
  ],
  'visibility' => [],
]);
$b->save();
echo "Cree: fil d'ariane\n";

// Taches locales (onglets admin)
$b = Block::create([
  'id' => 'ensmg_local_tasks',
  'plugin' => 'local_tasks_block',
  'theme' => $theme,
  'region' => 'pre_content',
  'weight' => -10,
  'status' => TRUE,
  'settings' => [
    'id' => 'local_tasks_block',
    'label' => 'Taches',
    'label_display' => '0',
    'provider' => 'core',
    'primary' => TRUE,
    'secondary' => TRUE,
  ],
  'visibility' => [],
]);
$b->save();
echo "Cree: taches locales\n";

// Titre de la page
$b = Block::create([
  'id' => 'ensmg_page_title',
  'plugin' => 'page_title_block',
  'theme' => $theme,
  'region' => 'pre_content',
  'weight' => -5,
  'status' => TRUE,
  'settings' => [
    'id' => 'page_title_block',
    'label' => 'Titre de la page',
    'label_display' => '0',
    'provider' => 'core',
  ],
  'visibility' => [],
]);
$b->save();
echo "Cree: titre de la page\n";

echo "\nConfiguration des blocs terminee.\n";
