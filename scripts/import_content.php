<?php

/**
 * Script d'import du contenu ENSMG.
 * Usage : vendor/bin/drush php:script scripts/import_content.php
 */

use Drupal\node\Entity\Node;
use Drupal\menu_link_content\Entity\MenuLinkContent;
use Drupal\path_alias\Entity\PathAlias;

echo "==> Import du contenu ENSMG...\n";

// ============================================================
// PAGES
// ============================================================

$pages = [
  // Institut
  [
    'title' => 'Vocation et Ambition',
    'alias' => '/ecole/vocation-ambition',
    'body'  => '<h2>Notre Vocation</h2>
<p>L\'École Nationale Supérieure des Mines et de la Géologie (ENSMG), anciennement Institut des Sciences de la Terre (IST), a été créée en 1971. Elle forme depuis plus de 40 ans des ingénieurs et chercheurs de haut niveau, au service du développement durable du Sénégal et de l\'Afrique.</p>
<p>Érigée en école nationale supérieure par décrets présidentiels en 2021-2022, l\'ENSMG a pour vocation de former des cadres supérieurs compétents dans les domaines des mines, de la géologie et des géosciences appliquées.</p>
<h2>Notre Ambition</h2>
<p>L\'ENSMG ambitionne de devenir un centre d\'excellence africain en géosciences, reconnu à l\'international pour la qualité de ses formations, la pertinence de ses recherches et l\'impact de ses diplômés sur le développement économique de l\'Afrique.</p>
<p>Dans le cadre de sa vision 2029, l\'école vise à renforcer ses partenariats académiques et industriels, à moderniser ses équipements pédagogiques et à accroître sa visibilité sur la scène internationale.</p>
<h2>Chiffres clés</h2>
<ul>
<li>Plus de 400 ingénieurs formés depuis sa création</li>
<li>40 ans d\'excellence académique</li>
<li>4 programmes de formation</li>
<li>3 laboratoires de recherche</li>
</ul>',
  ],
  [
    'title' => 'Gouvernance',
    'alias' => '/ecole/gouvernance',
    'body'  => '<h2>Direction</h2>
<p>L\'ENSMG est dirigée par le Professeur Mahamadane DIENE, qui assure la direction générale de l\'école et pilote sa transformation vers l\'excellence académique dans le cadre de la vision 2029.</p>
<h2>Organisation</h2>
<ul>
<li>La Direction Générale</li>
<li>Le Conseil Pédagogique</li>
<li>Le Conseil Scientifique</li>
<li>Les Départements d\'enseignement</li>
<li>Les Laboratoires de recherche</li>
<li>La Scolarité et les Services administratifs</li>
</ul>
<h2>Tutelle</h2>
<p>L\'ENSMG est une composante de l\'Université Cheikh Anta Diop (UCAD) de Dakar, sous la tutelle du Ministère de l\'Enseignement Supérieur, de la Recherche et de l\'Innovation du Sénégal.</p>',
  ],
  [
    'title' => 'Corps Enseignant',
    'alias' => '/ecole/enseignants',
    'body'  => '<h2>Notre équipe pédagogique</h2>
<p>L\'ENSMG dispose d\'un corps enseignant de haut niveau, composé d\'enseignants-chercheurs permanents et d\'intervenants professionnels issus du secteur industriel.</p>
<h2>Enseignants-chercheurs</h2>
<ul>
<li><strong>DIONE Adama</strong> — Géologie structurale</li>
<li><strong>NDIAYE Abdoul Aziz</strong> — Géochimie</li>
<li><strong>FAYE Gayane</strong> — Pétrologie</li>
<li><strong>FAYE Cheikh Ibrahima</strong> — Télédétection</li>
<li><strong>NDIAYE Matar</strong> — Hydrogéologie</li>
<li><strong>DIEYE Moumar</strong> — Géotechnique</li>
<li><strong>NIANG Magatte F.K</strong> — Minéralogie</li>
<li><strong>NDIAYE Codou</strong> — Sédimentologie</li>
<li><strong>DIENE Mouhamadane</strong> — Géophysique</li>
<li><strong>THIAM Mohamadou M.</strong> — Géomatériaux</li>
</ul>',
  ],
  [
    'title' => 'Vie Estudiantine',
    'alias' => '/ecole/vie-estudiantine',
    'body'  => '<h2>Vie sur le campus</h2>
<p>L\'ENSMG offre à ses étudiants un cadre de vie académique et social stimulant, au sein du campus de l\'Université Cheikh Anta Diop de Dakar.</p>
<h2>Associations et clubs</h2>
<ul>
<li>Association des Étudiants en Géologie et Mines (AEGM)</li>
<li>Club Environnement et Développement Durable</li>
<li>Club Sports et Culture</li>
</ul>
<h2>Activités parascolaires</h2>
<p>Des sorties de terrain, des séminaires professionnels et des visites industrielles sont organisés régulièrement pour enrichir la formation des étudiants.</p>',
  ],
  // Formation
  [
    'title' => 'Ingénieur Géologue',
    'alias' => '/formation/ingenieur-geologue',
    'body'  => '<h2>Présentation</h2>
<p>La formation d\'Ingénieur Géologue est le programme phare de l\'ENSMG. Les études sont organisées en deux cycles pour la formation de concepteurs en ingénierie et les diplômes du système LMD.</p>
<h2>Objectifs</h2>
<ul>
<li>Réaliser des études géologiques et minières complexes</li>
<li>Gérer des projets d\'exploration et d\'exploitation</li>
<li>Appliquer les méthodes modernes de prospection</li>
<li>Contribuer au développement durable du secteur extractif</li>
</ul>
<h2>Admission</h2>
<p>L\'admission en première année se fait chaque année au mois d\'octobre par des tests d\'entrée dans les différentes matières scientifiques et de langues.</p>
<h2>Débouchés</h2>
<p>Compagnies minières nationales et internationales, bureaux d\'études géologiques, Direction des Mines et de la Géologie, entreprises de géotechnique, recherche académique.</p>',
  ],
  [
    'title' => 'Master Géotechnique',
    'alias' => '/formation/master-geotechnique',
    'body'  => '<h2>Présentation</h2>
<p>Le Master Géotechnique vise à former des masters sur des bases solides de connaissances disciplinaires à la fois théoriques et pratiques.</p>
<h2>Objectifs</h2>
<ul>
<li>Analyser et résoudre des problèmes géotechniques complexes</li>
<li>Concevoir des ouvrages géotechniques</li>
<li>Mener des recherches en géomécanique</li>
<li>Gérer des projets de construction en milieu géologique difficile</li>
</ul>',
  ],
  [
    'title' => 'Licence Pro Géotechnique',
    'alias' => '/formation/licence-pro-geotechnique',
    'body'  => '<h2>Présentation</h2>
<p>La Licence Professionnelle Géotechnique Géominier est une formation d\'un an destinée aux titulaires d\'un Bac+2 en sciences.</p>
<h2>Admission</h2>
<p>L\'admission se fait sur sélection de dossiers pour les étudiants titulaires d\'un bac + 2 en sciences (DUT, BTS, DEUG, DUES...).</p>',
  ],
  [
    'title' => 'Certification MOFI',
    'alias' => '/formation/certification-mofi',
    'body'  => '<h2>Présentation</h2>
<p>La Certification MOFI (Modélisation Financière des Projets Miniers) est une formation spécialisée destinée aux professionnels du secteur minier.</p>
<h2>Objectifs</h2>
<ul>
<li>Maîtriser les fondamentaux de la finance minière</li>
<li>Construire des modèles financiers de projets miniers</li>
<li>Évaluer la viabilité économique d\'un projet minier</li>
</ul>',
  ],
  // Admissions
  [
    'title' => 'Admissions',
    'alias' => '/admissions',
    'body'  => '<h2>Rejoindre l\'ENSMG</h2>
<h3>Ingénieur Géologue</h3>
<p>Admission en octobre par tests d\'entrée (sciences + langues). Baccalauréat scientifique requis.</p>
<h3>Licence Professionnelle</h3>
<p>Sélection sur dossier pour titulaires d\'un bac+2 en sciences (DUT, BTS, DEUG, DUES).</p>
<h2>Contact Scolarité</h2>
<p>📍 Bâtiment BRGM, Route de l\'Université, BP 5396 Dakar-Fann<br>
📞 +221 33 824 23 45<br>
✉️ contact@ensmg.ucad.sn</p>',
  ],
  // Recherches
  [
    'title' => 'Recherches',
    'alias' => '/recherches',
    'body'  => '<h2>Nos Laboratoires</h2>
<h3>Laboratoire Pétro-structural et Métallogénie</h3>
<p>Créé en 2013 par un financement de la coopération française (projet U3E). Recherches sur la structure des roches et la genèse des gisements minéraux.</p>
<h3>Laboratoire de Télédétection Appliquée</h3>
<p>Projets de recherche internationaux appliquant les technologies satellitaires et SIG à l\'étude des ressources naturelles.</p>
<h3>Laboratoire Géomatériaux</h3>
<p>À l\'avant-garde de l\'innovation, avec des missions d\'enseignement, de recherche et de services. Étude des propriétés mécaniques des matériaux géologiques.</p>',
  ],
  // Entreprise (page principale)
  [
    'title' => 'Entreprise',
    'alias' => '/entreprise',
    'body'  => '<h2>L\'ENSMG &amp; l\'Entreprise</h2>
<p>L\'ENSMG entretient des relations étroites avec le tissu industriel national et international, notamment dans les secteurs des mines, de la géologie, de l\'environnement et des travaux publics. Notre école forme des ingénieurs directement opérationnels, capables de répondre aux besoins des entreprises du secteur extractif et de la construction.</p>

<div class="entreprise-layout" style="display:grid;grid-template-columns:1fr 1fr;gap:3rem;align-items:start;margin:2rem 0;">
<div>
<h3>Nos engagements</h3>
<ul class="check-list-v2" style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:.85rem;">
<li style="display:flex;align-items:flex-start;gap:.9rem;"><span class="check-icon" style="flex-shrink:0;width:24px;height:24px;border-radius:50%;background:linear-gradient(135deg,#C9A84C,#E3C47A);color:#142850;font-size:.8rem;font-weight:800;display:flex;align-items:center;justify-content:center;">✓</span><span>Partenariats avec <strong>Randgold Resources</strong>, Teranga Gold, SOCOCIM</span></li>
<li style="display:flex;align-items:flex-start;gap:.9rem;"><span class="check-icon" style="flex-shrink:0;width:24px;height:24px;border-radius:50%;background:linear-gradient(135deg,#C9A84C,#E3C47A);color:#142850;font-size:.8rem;font-weight:800;display:flex;align-items:center;justify-content:center;">✓</span><span>Conventions de stage avec les grandes compagnies minières</span></li>
<li style="display:flex;align-items:flex-start;gap:.9rem;"><span class="check-icon" style="flex-shrink:0;width:24px;height:24px;border-radius:50%;background:linear-gradient(135deg,#C9A84C,#E3C47A);color:#142850;font-size:.8rem;font-weight:800;display:flex;align-items:center;justify-content:center;">✓</span><span>Intervenants professionnels dans les formations</span></li>
<li style="display:flex;align-items:flex-start;gap:.9rem;"><span class="check-icon" style="flex-shrink:0;width:24px;height:24px;border-radius:50%;background:linear-gradient(135deg,#C9A84C,#E3C47A);color:#142850;font-size:.8rem;font-weight:800;display:flex;align-items:center;justify-content:center;">✓</span><span>Projets de recherche appliquée en partenariat</span></li>
</ul>
</div>
<div>
<h3>Compétences de nos ingénieurs</h3>
<div class="competences-grid-v2" style="display:grid;grid-template-columns:repeat(3,1fr);gap:.75rem;">
<div class="comp-card"><div class="comp-icon-wrap"><i class="bi bi-geo-alt-fill"></i></div><span class="comp-label">Exploration minière</span></div>
<div class="comp-card"><div class="comp-icon-wrap"><i class="bi bi-map-fill"></i></div><span class="comp-label">Cartographie géologique</span></div>
<div class="comp-card"><div class="comp-icon-wrap"><i class="bi bi-bar-chart-fill"></i></div><span class="comp-label">Modélisation financière</span></div>
<div class="comp-card"><div class="comp-icon-wrap"><i class="bi bi-water"></i></div><span class="comp-label">Hydrogéologie</span></div>
<div class="comp-card"><div class="comp-icon-wrap"><i class="bi bi-building-fill"></i></div><span class="comp-label">Géotechnique BTP</span></div>
<div class="comp-card"><div class="comp-icon-wrap"><i class="bi bi-globe2"></i></div><span class="comp-label">Télédétection SIG</span></div>
</div>
</div>
</div>

<h3>Partenaires internationaux</h3>
<div class="partners-grid-v2" style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:1rem;margin-top:1.5rem;">
<a href="#" class="partner-card-v2"><div class="partner-badge">CSM</div><div class="partner-info"><div class="partner-name">Colorado School of Mines</div><div class="partner-country"><i class="bi bi-geo-alt"></i> États-Unis</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">ÉPM</div><div class="partner-info"><div class="partner-name">École Polytechnique de Montréal</div><div class="partner-country"><i class="bi bi-geo-alt"></i> Canada</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">EMN</div><div class="partner-info"><div class="partner-name">École des Mines de Nancy</div><div class="partner-country"><i class="bi bi-geo-alt"></i> France</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">EMA</div><div class="partner-info"><div class="partner-name">École des Mines d\'Alès</div><div class="partner-country"><i class="bi bi-geo-alt"></i> France</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">EMP</div><div class="partner-info"><div class="partner-name">École des Mines de Paris</div><div class="partner-country"><i class="bi bi-geo-alt"></i> France</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">UW</div><div class="partner-info"><div class="partner-name">University of Witwatersrand</div><div class="partner-country"><i class="bi bi-geo-alt"></i> Afrique du Sud</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">2iE</div><div class="partner-info"><div class="partner-name">Institut 2iE Ouagadougou</div><div class="partner-country"><i class="bi bi-geo-alt"></i> Burkina Faso</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">CGS</div><div class="partner-info"><div class="partner-name">China Geological Survey</div><div class="partner-country"><i class="bi bi-geo-alt"></i> Chine</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">USGS</div><div class="partner-info"><div class="partner-name">U.S. Geological Survey</div><div class="partner-country"><i class="bi bi-geo-alt"></i> États-Unis</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
<a href="#" class="partner-card-v2"><div class="partner-badge">DMG</div><div class="partner-info"><div class="partner-name">Dir. Mines &amp; Géologie Sénégal</div><div class="partner-country"><i class="bi bi-geo-alt"></i> Sénégal</div></div><i class="bi bi-arrow-up-right partner-arrow"></i></a>
</div>',
  ],
  // Alumni
  [
    'title' => 'Alumni',
    'alias' => '/alumni',
    'body'  => '<h2>Réseau des anciens de l\'ENSMG</h2>
<p>Plus de 400 ingénieurs et chercheurs formés depuis la création de l\'école. Nos diplômés exercent dans les plus grandes compagnies minières d\'Afrique et du monde.</p>
<h2>Rejoindre le réseau</h2>
<p>✉️ contact@ensmg.ucad.sn | 📞 +221 33 824 23 45</p>',
  ],
  // Contact
  [
    'title' => 'Contact',
    'alias' => '/contact',
    'body'  => '<h2>Contactez-nous</h2>
<p>📍 <strong>Adresse :</strong> Bâtiment BRGM, Route de l\'Université, BP 5396 Dakar-Fann, Sénégal<br>
📞 <strong>Téléphone :</strong> +221 33 824 23 45<br>
📱 <strong>Mobile :</strong> +221 77 745 42 13<br>
✉️ <strong>Email :</strong> contact@ensmg.ucad.sn</p>
<h2>Localisation</h2>
<p>Campus de l\'Université Cheikh Anta Diop (UCAD), bâtiment BRGM, Dakar-Fann.</p>',
  ],
  // Actualités
  [
    'title' => 'Actualités',
    'alias' => '/actualites',
    'body'  => '<h2>Actualités de l\'ENSMG</h2>
<p>Retrouvez ici toutes les dernières nouvelles de l\'École Nationale Supérieure des Mines et de la Géologie.</p>',
  ],

  // Admissions — sous-pages
  [
    'title' => 'Admissions — Licence Professionnelle',
    'alias' => '/admissions/licence-professionnelle',
    'body'  => '<h2>Licence Professionnelle en Géotechnique</h2>
<p>La Licence Professionnelle en Géotechnique est ouverte aux titulaires d\'un BTS ou d\'un DUT dans les domaines des travaux publics, du génie civil ou de la géologie.</p>
<h2>Conditions d\'admission</h2>
<ul>
<li>Être titulaire d\'un BTS, DUT ou équivalent dans un domaine scientifique</li>
<li>Avoir validé 120 crédits dans un cursus compatible</li>
<li>Dossier de candidature complet (CV, lettres de recommandation, relevés de notes)</li>
<li>Entretien de sélection</li>
</ul>
<h2>Dossier de candidature</h2>
<p>Le dossier complet doit être déposé à la scolarité de l\'ENSMG ou envoyé par email à <a href="mailto:scolarite@ensmg.ucad.sn">scolarite@ensmg.ucad.sn</a>.</p>
<h2>Calendrier</h2>
<ul>
<li>Ouverture des dossiers : 1er juin</li>
<li>Clôture des dossiers : 31 juillet</li>
<li>Entretiens : Août</li>
<li>Résultats : 1er septembre</li>
</ul>',
  ],
  [
    'title' => 'Admissions — Ingénieur Géologue',
    'alias' => '/admissions/ingenieur-geologue',
    'body'  => '<h2>Programme Ingénieur Géologue</h2>
<p>Le cursus Ingénieur Géologue de l\'ENSMG est accessible par deux voies : sur concours après le baccalauréat (classes préparatoires) ou par intégration directe en 3e année pour les titulaires d\'une Licence.</p>
<h2>Voie prépa — Concours</h2>
<ul>
<li>Être titulaire du baccalauréat série S ou équivalent avec mention</li>
<li>Avoir suivi deux années de classes préparatoires scientifiques (MPSI, PCSI, PTSI)</li>
<li>Réussir le concours d\'entrée commun UCAD-ENSMG</li>
</ul>
<h2>Intégration directe (3e année)</h2>
<ul>
<li>Être titulaire d\'une Licence en sciences de la terre, géologie, géophysique ou domaine connexe</li>
<li>Dossier de sélection sur titre et entretien</li>
</ul>
<h2>Dossier de candidature</h2>
<p>Envoyez votre candidature à : <a href="mailto:admissions@ensmg.ucad.sn">admissions@ensmg.ucad.sn</a></p>',
  ],

  // Entreprise — sous-pages (contenu réel de ensmg.ucad.sn)
  [
    'title' => 'Partenariats industriels',
    'alias' => '/entreprise/partenariats',
    'body'  => '<h2>Partenariats industriels</h2>
<p>L\'ENSMG est particulièrement appuyé dans ses différentes missions pédagogiques par des entreprises partenaires comme Randgold Resources, Teranga, la SOCOCIM etc. ; entreprises qui se sont engagées avec l\'Institut dans des partenariats techniques et financiers efficaces.</p>
<p>La société minière Randgold Resources attribue chaque année deux bourses d\'excellence aux deux meilleurs bacheliers recrutés pour toute la durée de leur formation.</p>
<p>En 2015, la société minière Teranga Gold a octroyé une subvention d\'un total de 50 000 USD à l\'Institut, qui a permis aujourd\'hui d\'acquérir du matériel pédagogique et des logiciels performants.</p>
<h2>Nos principaux partenaires</h2>
<ul>
<li><strong>Randgold Resources / Barrick Gold</strong> — Bourses d\'excellence et partenariat pédagogique</li>
<li><strong>Teranga Gold Corporation</strong> — Financement de matériel et logiciels pédagogiques</li>
<li><strong>SOCOCIM Industries</strong> — Partenariat dans le domaine des géomatériaux</li>
<li><strong>Grande Côte Operations (GCO)</strong> — Accueil de stagiaires sur site minier</li>
<li><strong>Direction des Mines et de la Géologie (DMG)</strong> — Partenariat institutionnel</li>
<li><strong>MIFERSO</strong> — Société des Mines de Fer du Sénégal</li>
</ul>',
  ],
  [
    'title' => 'Compétences de nos ingénieurs',
    'alias' => '/entreprise/competences',
    'body'  => '<h2>Compétences de nos ingénieurs</h2>
<h3>Ressources Minières, Minérales et énergétiques</h3>
<ul>
<li>Géologie et cartographie géologique</li>
<li>Tectonique et analyse structurale</li>
<li>Exploration et exploitation minière</li>
<li>Valorisation des minerais</li>
<li>Ressources pétrolières</li>
<li>Pédologie et physico-chimie des sols</li>
<li>Géostatistique</li>
<li>Management des projets miniers</li>
</ul>
<h3>Hydrogéologie</h3>
<ul>
<li>Ressources en eau</li>
<li>Modélisation des nappes et des eaux de surface</li>
</ul>
<h3>Géomatériaux, Géotechnique</h3>
<ul>
<li>Géotechnique routière</li>
<li>Aménagement et risques naturels</li>
<li>Matériaux de construction</li>
</ul>
<h3>Environnement</h3>
<ul>
<li>Audit environnemental</li>
<li>Études d\'impacts environnementaux</li>
<li>Réhabilitation des sites d\'exploitation</li>
</ul>
<h3>Techniques de géologie de l\'ingénieur</h3>
<ul>
<li>Imagerie et télédétection</li>
<li>Géophysique</li>
<li>Système d\'information géographique (SIG)</li>
</ul>',
  ],
  [
    'title' => 'Stages',
    'alias' => '/entreprise/stages',
    'body'  => '<h2>Stages</h2>
<p>Des conventions de stage ont été établies entre l\'Institut et les structures d\'accueil de nos stagiaires pour une plus grande prise en compte des besoins de la formation et des entreprises hôtes.</p>
<h2>Structures d\'accueil</h2>
<p>Nos stagiaires sont accueillis dans diverses structures au Sénégal et à l\'international :</p>
<ul>
<li>Compagnies minières (Randgold, Teranga Gold, GCO, MIFERSO)</li>
<li>Direction des Mines et de la Géologie (DMG)</li>
<li>Bureaux d\'études et sociétés de conseil en géotechnique</li>
<li>Laboratoires de recherche et universités partenaires</li>
<li>ONAS, SDE et structures de gestion des eaux</li>
<li>Entreprises de BTP et travaux publics</li>
</ul>
<h2>Déposer une offre de stage</h2>
<p>Vous êtes une entreprise et souhaitez accueillir un stagiaire ou recruter un diplômé ENSMG ? Contactez-nous :</p>
<p>📞 +221 33 824 23 45<br>
✉️ <a href="mailto:contact@ensmg.ucad.sn">contact@ensmg.ucad.sn</a></p>',
  ],
  [
    'title' => 'Site Web Géologie et Mining',
    'alias' => '/entreprise/geologie-mining',
    'body'  => '<h2>Site Web Géologie et Mining</h2>
<h3>1 — Institutions</h3>
<ul>
<li>Union Africaine</li>
<li>UEMOA</li>
<li>CEDEAO</li>
</ul>
<h3>2 — États partenaires / Grandes Organisations</h3>
<p>Organisations ayant une politique d\'appui au secteur minier africain :</p>
<ul>
<li>Australian Institute of Mining and Metallurgy (AusIMM)</li>
<li>Society of Economic Geologists (SEG)</li>
<li>Society for Mining, Metallurgy &amp; Exploration (SME)</li>
<li>The Geological Society of America (GSA)</li>
<li>International Association of Engineering Geology (IAEG)</li>
</ul>
<h3>3 — Ressources géologiques en ligne</h3>
<ul>
<li>USGS — United States Geological Survey</li>
<li>BRGM — Bureau de Recherches Géologiques et Minières (France)</li>
<li>Direction des Mines et de la Géologie du Sénégal</li>
<li>OneGeology — portail mondial de cartographie géologique</li>
</ul>',
  ],
];

// Créer les pages
foreach ($pages as $page_data) {
  $existing = \Drupal::entityQuery('node')
    ->condition('title', $page_data['title'])
    ->condition('type', 'page')
    ->accessCheck(FALSE)
    ->execute();

  if (!empty($existing)) {
    echo "  [EXISTE] " . $page_data['title'] . "\n";
    continue;
  }

  $node = Node::create([
    'type'   => 'page',
    'title'  => $page_data['title'],
    'body'   => ['value' => $page_data['body'], 'format' => 'full_html'],
    'status' => 1,
    'uid'    => 1,
  ]);
  $node->save();
  $nid = $node->id();

  $alias = PathAlias::create([
    'path'  => '/node/' . $nid,
    'alias' => $page_data['alias'],
  ]);
  $alias->save();

  echo "  [CREE] " . $page_data['title'] . " → " . $page_data['alias'] . "\n";
}

// ============================================================
// ACTUALITÉS (articles)
// ============================================================

echo "==> Création des actualités...\n";

$articles = [
  [
    'title' => 'Recrutement Enseignant chercheur',
    'date'  => '2024-07-16',
    'body'  => '<p>L\'ENSMG lance un appel à candidatures pour le recrutement d\'un enseignant chercheur spécialisé en ingénierie minière.</p>
<p>Les candidats sont priés de déposer leur dossier complet (CV, lettre de motivation, copies des diplômes) auprès de la scolarité de l\'ENSMG.</p>
<p>Contact : contact@ensmg.ucad.sn</p>',
  ],
  [
    'title' => 'Passation de service',
    'date'  => '2023-11-10',
    'body'  => '<p>Une cérémonie de passation de service s\'est tenue à l\'ENSMG marquant une transition importante dans la direction de l\'institution.</p>
<p>Cette cérémonie s\'est déroulée en présence des autorités académiques de l\'UCAD et du corps enseignant de l\'école.</p>',
  ],
];

foreach ($articles as $article_data) {
  $existing = \Drupal::entityQuery('node')
    ->condition('title', $article_data['title'])
    ->condition('type', 'article')
    ->accessCheck(FALSE)
    ->execute();

  if (!empty($existing)) {
    echo "  [EXISTE] " . $article_data['title'] . "\n";
    continue;
  }

  $node = Node::create([
    'type'    => 'article',
    'title'   => $article_data['title'],
    'body'    => ['value' => $article_data['body'], 'format' => 'full_html'],
    'created' => strtotime($article_data['date']),
    'status'  => 1,
    'uid'     => 1,
  ]);
  $node->save();
  echo "  [CREE] Article: " . $article_data['title'] . "\n";
}

// ============================================================
// MENU PRINCIPAL
// ============================================================

echo "==> Création du menu principal...\n";

// Supprimer les anciens liens du menu main
$old_links = \Drupal::entityQuery('menu_link_content')
  ->condition('menu_name', 'main')
  ->accessCheck(FALSE)
  ->execute();
if (!empty($old_links)) {
  $storage = \Drupal::entityTypeManager()->getStorage('menu_link_content');
  $storage->delete($storage->loadMultiple($old_links));
  echo "  [SUPPRIME] Anciens liens du menu\n";
}

$menu_structure = [
  ['title' => 'Institut',   'uri' => 'internal:/ecole/vocation-ambition',      'weight' => 1, 'children' => [
    ['title' => 'Vocation & Ambition', 'uri' => 'internal:/ecole/vocation-ambition',  'weight' => 0],
    ['title' => 'Gouvernance',         'uri' => 'internal:/ecole/gouvernance',         'weight' => 1],
    ['title' => 'Enseignants',         'uri' => 'internal:/ecole/enseignants',         'weight' => 2],
    ['title' => 'Vie estudiantine',    'uri' => 'internal:/ecole/vie-estudiantine',    'weight' => 3],
  ]],
  ['title' => 'Formation',  'uri' => 'internal:/formation/ingenieur-geologue', 'weight' => 2, 'children' => [
    ['title' => 'Ingénieur Géologue',      'uri' => 'internal:/formation/ingenieur-geologue',    'weight' => 0],
    ['title' => 'Master Géotechnique',     'uri' => 'internal:/formation/master-geotechnique',   'weight' => 1],
    ['title' => 'Licence Pro Géotechnique','uri' => 'internal:/formation/licence-pro-geotechnique','weight' => 2],
    ['title' => 'Certification MOFI',      'uri' => 'internal:/formation/certification-mofi',    'weight' => 3],
  ]],
  ['title' => 'Admissions', 'uri' => 'internal:/admissions',                  'weight' => 3, 'children' => [
    ['title' => 'Ingénieur Géologue',        'uri' => 'internal:/admissions/ingenieur-geologue',      'weight' => 0],
    ['title' => 'Licence Professionnelle',   'uri' => 'internal:/admissions/licence-professionnelle', 'weight' => 1],
  ]],
  ['title' => 'Recherches', 'uri' => 'internal:/recherches',                  'weight' => 4],
  ['title' => 'Entreprise', 'uri' => 'internal:/entreprise',                  'weight' => 5, 'children' => [
    ['title' => 'Partenariats industriels',      'uri' => 'internal:/entreprise/partenariats',   'weight' => 0],
    ['title' => 'Compétences de nos ingénieurs', 'uri' => 'internal:/entreprise/competences',    'weight' => 1],
    ['title' => 'Stages',                        'uri' => 'internal:/entreprise/stages',         'weight' => 2],
    ['title' => 'Site Web Géologie et Mining',   'uri' => 'internal:/entreprise/geologie-mining','weight' => 3],
  ]],
  ['title' => 'Alumni',     'uri' => 'internal:/alumni',                      'weight' => 6],
  ['title' => 'Actualités', 'uri' => 'internal:/actualites',                  'weight' => 7],
  ['title' => 'Contact',    'uri' => 'internal:/contact',                     'weight' => 8],
];

foreach ($menu_structure as $item) {
  $link = MenuLinkContent::create([
    'title'      => $item['title'],
    'link'       => ['uri' => $item['uri']],
    'menu_name'  => 'main',
    'expanded'   => !empty($item['children']),
    'weight'     => $item['weight'],
  ]);
  $link->save();
  echo "  [MENU] " . $item['title'] . "\n";

  if (!empty($item['children'])) {
    $parent_id = 'menu_link_content:' . $link->uuid();
    foreach ($item['children'] as $child) {
      $child_link = MenuLinkContent::create([
        'title'     => $child['title'],
        'link'      => ['uri' => $child['uri']],
        'menu_name' => 'main',
        'parent'    => $parent_id,
        'weight'    => $child['weight'],
      ]);
      $child_link->save();
      echo "    [MENU] └─ " . $child['title'] . "\n";
    }
  }
}

echo "\n==> Import terminé avec succès !\n";
