<?php

namespace Drupal\ensmg_profils\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Render\Markup;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Pages de profil premium pour les enseignants de l'ENSMG.
 */
class ProfilController extends ControllerBase {

  /**
   * Données des enseignants indexées par slug.
   */
  protected function getProfs(): array {
    return [

      'diene-mouhamadane' => [
        'nom'         => 'DIENE Mouhamadane',
        'initiales'   => 'DM',
        'grade'       => 'Professeur — Directeur de l\'ENSMG',
        'directeur'   => TRUE,
        'domaine'     => 'Géosciences',
        'spec'        => 'Géophysique · Géologie structurale · Pétrologie',
        'email'       => '',
        'gradient'    => 'linear-gradient(135deg,#071528 0%,#0d2244 60%,#0a1e3a 100%)',
        'stats'       => ['9' => 'Publications', 'PhD' => 'Géologie struct.', '2012' => 'Doctorat'],
        'formation'   => [
          ['annee' => '2012',      'titre' => 'Thèse de doctorat unique — Géologie structurale', 'lieu' => 'UCAD, Dakar'],
          ['annee' => '2000–2002', 'titre' => 'DEA en Géosciences des zones profondes',           'lieu' => 'UCAD'],
          ['annee' => '1999–2000', 'titre' => 'AEA en Géosciences des zones profondes',           'lieu' => 'UCAD'],
        ],
        'specialites' => ['Pétrologie', 'Minéralogie', 'Géologie structurale'],
        'recherches'  => [
          'Structurale et Géodynamique dans la Boutonnière de Kédougou-Kéniéba (Birimien)',
          'Contrôle tectonique des minéralisations aurifères dans le Birimien',
          'Contrôle tectonique du volcanisme tertiaire et quaternaire du bassin Sénégalo-Mauritanien',
          'Utilisation d\'indicateurs tectoniques dans la recherche et la valorisation des géomatériaux dans la zone du Horst de Ndiass',
          'Étude structurale de la stabilité des pentes dans le bassin Sénégalo-Mauritanien',
          'Pollution minière et pétrolière',
        ],
        'enseignement' => [
          'TP/TD de Minéralogie-Pétrographie et Analyses Structurale',
          'Cours de pétrologie en première année cycle ingénieur',
          'Stage de Terrain : Cartographie des Zones Profondes (Birimien, Sénégal Oriental) et Cartographie Structurale (Mauritanides Bakel)',
          'Excursions Géologiques : Littoral volcanique du Cap-Vert, Zone du Horst de Ndiass',
          'Modélisation 3D des terrains géologiques',
          'Interprétation structurale des données géophysiques',
        ],
        'publications' => [
          ['ref' => 'P7', 'texte' => 'Ndiaye, Diene et al. (2019). Pozzolanic Activity of Old Volcanic Tuffs of Mako Area. <em>International Journal of Geosciences</em>, 10, 225-237.'],
          ['ref' => 'P6', 'texte' => 'Diatta, Ndiaye, Diene et al. (2017). The structural evolution of the Diale-Dalema basin, Kedougou-Kenieba Inlier. <em>Journal of African Earth Sciences</em>, 129, 923-933.'],
          ['ref' => 'P5', 'texte' => 'Gozo, Diallo, Dich, Gueye, Ndiaye (2015). Petrological and Structural Approach to Understanding Paleoproterozoic Calo-Alkaline Volcanic Rocks.'],
          ['ref' => 'P4', 'texte' => 'Diene, Fulligraf, Diatta, Gloaguen, Gueye, Ndiaye (2015). Review of the Sénégalo-Malian shear zone system. <em>J. Afr. Earth Sci.</em>'],
          ['ref' => 'P3', 'texte' => 'Gueye, Van Den Kerkhof, Heiri, Diene, Mücke & Siegesmund (2013). Structural control, fluid inclusions and cathodoluminescence studies. <em>South African Journal of Geology</em>, 116.2, 199-218.'],
          ['ref' => 'P2', 'texte' => 'Diene, Gueye, Diallo, Dia (2012). Structural Evolution of a Precambrian Segment. <em>International Journal of Geosciences</em>, 3, 153-165.'],
          ['ref' => 'P1', 'texte' => 'Gueye, Ngom, Diene, Thiam, Siegesmund et al. (2008). Intrusive rocks and tectono-metamorphic evolution. <em>Journal of African Earth Sciences</em>, 50, 88-110.'],
          ['ref' => 'Livre', 'texte' => 'Diene M., Gueye M. <em>Tectonomagmatic Evolution of Precambrian Segment: Mako Belt Formations.</em> LAP Lambert Academic Publishing, Saarbrücken 2013, 55p.'],
        ],
      ],

      'dione-adama' => [
        'nom'       => 'DIONE Adama',
        'initiales' => 'DA',
        'grade'     => 'Maître de Conférence Titulaire · Chef de Département Géotechnique',
        'directeur' => FALSE,
        'domaine'   => 'Géosciences',
        'spec'      => 'Géotechnique',
        'email'     => '',
        'gradient'  => 'linear-gradient(135deg,#0d1e42 0%,#1c3666 60%,#0f2a56 100%)',
        'stats'     => ['9' => 'Publications', 'Chef Dpt.' => 'Géotechnique', '2019' => 'Recrutement'],
        'formation' => [
          ['annee' => '2022–auj.', 'titre' => 'Maître de Conférence Titulaire',    'lieu' => 'IST Dakar'],
          ['annee' => '2021–2022', 'titre' => 'Maître de Conférence Assimilé',     'lieu' => 'IST'],
          ['annee' => '2019–2021', 'titre' => 'Maître de Conférence Stagiaire',    'lieu' => 'IST'],
          ['annee' => '2017–2019', 'titre' => 'Chef de Département Génie Civil',   'lieu' => 'IPD Thomas Sankara'],
          ['annee' => '2011–2014', 'titre' => 'Doctorat en Géotechnique routière', 'lieu' => 'Université de Thiès'],
          ['annee' => '2010–2011', 'titre' => 'Master 2 Géosciences-Géotechnique', 'lieu' => 'FST / UCAD'],
          ['annee' => '2009–2010', 'titre' => 'Master 1 Géosciences-Géotechnique', 'lieu' => 'FST / UCAD'],
          ['annee' => '2008–2009', 'titre' => 'Maîtrise Sciences Naturelles',      'lieu' => 'FST / UCAD'],
        ],
        'specialites' => ['Géotechnique routière', 'Valorisation des matériaux locaux', 'Rejets miniers', 'Modélisation des sols'],
        'recherches' => [
          'Géotechnique routière et Valorisation des matériaux locaux',
          'Valorisation des rejets miniers et modélisation des sols',
          'Caractérisation des géomatériaux par cartographie numérique',
          'Recherche de matériaux innovants pour la construction durable',
          'Développement d\'une solution de stabilisation des tufs volcaniques de Mako par la géo-polymérisation',
          'Utilisation des matériaux locaux dans l\'habitat social',
          'Valorisation des éco-ciments, éco-bétons et rejets miniers incluant les sous-produits industriels',
        ],
        'enseignement' => [
          'Mécanique des sols',
          'Calcul des ouvrages géotechniques (fondations, ouvrages de soutènement et stabilité des pentes et talus)',
          'Géotechnique routière et minière',
          'Géomatériaux',
        ],
        'publications' => [
          ['ref' => '1', 'texte' => 'Dione, Meissa Fall, Yves Berthaud, Makhaly Ba (2013). Estimation of Resilient Modulus of Unbound Granular Materials from Senegal. <em>Geomaterials</em>, 3, 172-178.'],
          ['ref' => '2', 'texte' => 'Dione, Meissa Fall, Yves Berthaud, Farid Benboudjama, Alexandre Michou (2014). Implementation of Resilient modulus-CBR relationship in mechanistical pavement design. <em>Carmes</em>.'],
          ['ref' => '3', 'texte' => 'Seybatou Diop, Meissa Fall, Adama Dione, Moshood Tijami (2015). Diagnosis study of the Louga-Ouarack-Ndoyene R31 regional road.'],
          ['ref' => '4', 'texte' => 'El Hadj Bala Moussa Nakhaté, Séni Tamba, Makhaly Ba, Adama Dione, Issa Ndoye (2016). Soil Subgrade\'s Characterization and Classification of Thies. <em>Geomaterials</em>.'],
          ['ref' => '5', 'texte' => 'Baye Birane Thiam, Fatou Samb, Adama Dione (2018). Determination of an Equivalent Loading Circle. <em>OJCE</em>.'],
          ['ref' => '6', 'texte' => 'Baye Birane Thiam, Fatou Samb, Adama Dione (2018). Taking into Account the Effect of Dual Wheels on Lateritic Gravelly Pavements. <em>Geomaterials</em>.'],
          ['ref' => '7', 'texte' => 'Adama Dione, Déthié Sarr, Oustasse Abdoulaye Sall (2018). Characterization of eastern Senegal aggregates and gravel lateritic. <em>IJIMES</em>.'],
          ['ref' => '8', 'texte' => 'Abdou Diouf, Adama Dione, Mahamadane Diene, Matar Ndiaye. Contribution to the Study of Palaeoproterozoic Housing in the Kedougou Region: Case of Mako.'],
          ['ref' => '9', 'texte' => 'Abdoulaye Diedhiou, Libasse Sow, Adama Dione (2020). Contribution to Comparative Study of Physical-Chemical Characteristics of Diack Basalt and Bandia Limestone. <em>Geomaterials</em>, 10, 25-34.'],
        ],
      ],

      'thiam-mohamadou' => [
        'nom'       => 'THIAM Mohamadou Moustapha',
        'initiales' => 'TM',
        'grade'     => 'Maître de Conférence Titulaire · Chef de Département Ressources Minérales et Énergétiques',
        'directeur' => FALSE,
        'domaine'   => 'Technologies',
        'spec'      => 'Sédimentologie · Géologie pétrolière',
        'email'     => 'mohamadoumoustapha.thiam@ucad.edu.sn',
        'gradient'  => 'linear-gradient(135deg,#0b2844 0%,#0f3d6e 60%,#0a2f5a 100%)',
        'stats'     => ['10' => 'Publications', 'Chef Dpt.' => 'Ress. Min. & Énerg.', '2017' => 'Recrutement'],
        'formation' => [
          ['annee' => '2012–2016', 'titre' => 'Doctorat Unique Géologie de l\'Ingénieur',                                        'lieu' => 'Université de Thiès'],
          ['annee' => '2008–2010', 'titre' => 'Master Géosciences des environnements sédimentaires — Biostratigraphie et Paléoenvironnements', 'lieu' => 'UCAD'],
          ['annee' => '2007–2008', 'titre' => 'Maîtrise Sciences Naturelles',                                                    'lieu' => 'UCAD'],
        ],
        'specialites' => ['Sédimentologie', 'Géologie de l\'ingénieur', 'Analyse des bassins', 'Géologie pétrolière', 'Drone en cartographie'],
        'recherches' => [
          'Géologie de l\'ingénieur et Analyse des bassins sédimentaires',
          'Géologie pétrolière',
          'Application de la technologie drone en cartographie',
          'Dynamisme et Architecture des corps sédimentaires dans le sous bassin de Dakar durant le crétacé',
        ],
        'enseignement' => [
          'Géodynamique externe, Géographie Physique, Paléogéographie',
          'Stratigraphie du Cénozoïque, Pétrographie exogène',
        ],
        'publications' => [
          ['ref' => '1',  'texte' => 'Thiam M., Dione A., Dieye M. et al. (2023). Lithostratigraphy and Characterisation of Paleocene Limestones for Optimal Exploitation. <em>Geomaterials</em>, 13, 51-60.'],
          ['ref' => '2',  'texte' => 'Thiam M., Dieye M., Dione A., Ndiaye A. et al. (2022). Stratigraphy of the MSGBC Basin in the Western Part of Thies. <em>Open Journal of Geology</em>, 12, 685-705.'],
          ['ref' => '3',  'texte' => 'Lihoreau, Sarr, Chardon et al. (2021). 3D model: A fossil terrestrial fauna from Tobène. <em>MorphoMuseuM</em> 7:e102.'],
          ['ref' => '4',  'texte' => 'Lihoreau, Chardon, Boisserie, Lebrun, Thiam et al. (2021). A fossil terrestrial fauna from Tobène (Senegal) — early Pliocene window in western Africa. <em>Gondwana Research</em>.'],
          ['ref' => '5',  'texte' => 'Sambou, Hautier, Lihoreau, Thiam et al. (2020). Contribution to the reappraisal of the mid Paleogene ichtyofauna of Western Africa. <em>Annales de Paléontologie</em>.'],
          ['ref' => '6',  'texte' => 'Tabuce, Adnet, Lebrun, Lihoreau, Thiam, Hautier (2019). Filling a gap in the proboscidean fossil record: a new genus from the Lutetian of Senegal. <em>Journal of Paleontology</em>.'],
          ['ref' => '7',  'texte' => 'Vautrin, Lihoreau, Sambou, Thiam et al. (2019). 3D model: From limb to fin: an Eocene protocetid forelimb from Senegal. <em>MorphoMuseuM</em>.'],
          ['ref' => '8',  'texte' => 'Vautrin, Lihoreau, Sambou, Thiam et al. (2019). From limb to fin: an Eocene protocetid forelimb from Senegal. <em>Palaeontology</em>.'],
          ['ref' => '9',  'texte' => 'Dieye Moumar, Geneyton Anthony, Thiam Mohamadou Moustapha et al. (2021). Monazite recovery from Senegalese great coast heavy mineral sand deposit. <em>CAMES Journées Scientifiques</em>.'],
          ['ref' => '10', 'texte' => 'Mamadou Fall, Ndiaye, Thiam (2021). Phosphates de chaux : études de caractérisation géologique, géochimique et modélisation des dépots. <em>CAMES Journées Scientifiques</em>.'],
        ],
      ],

      'dieye-moumar' => [
        'nom'       => 'DIEYE Moumar',
        'initiales' => 'DM',
        'grade'     => 'Maître de Conférence Titulaire',
        'directeur' => FALSE,
        'domaine'   => 'Géosciences',
        'spec'      => 'Minéralurgie · Valorisation des minerais',
        'email'     => 'moumar.dieye@ucad.edu.sn',
        'gradient'  => 'linear-gradient(135deg,#0a2035 0%,#0f2e52 60%,#0a2440 100%)',
        'stats'     => ['4' => 'Publications', '2021' => 'Doctorat', '2014' => 'Recrutement'],
        'formation' => [
          ['annee' => '2021',      'titre' => 'Doctorat ès géosciences — spécialité : Géologie appliquée',                'lieu' => 'UCAD, Dakar'],
          ['annee' => '2011',      'titre' => 'Master géoscience — spécialité : Matières premières minérales',            'lieu' => 'IST / UCAD'],
          ['annee' => '2011',      'titre' => 'Expert en exploration et valorisation des ressources minérales',           'lieu' => 'IST / UCAD'],
          ['annee' => '2008',      'titre' => 'Ingénieur géologue — Institut des Sciences de la Terre',                  'lieu' => 'IST / UCAD'],
        ],
        'specialites' => ['Minéralurgie', 'Valorisation des minerais', 'Minéraux rares', 'Cartographie numérique', 'Géologie minière'],
        'recherches' => [
          'Thématique 1 : Géochimie des sables à minéraux lourds — source de dépôts et potentiels en terres rares',
          'Thématique 2 : Valorisation des minéraux rares par optimisation des techniques minéralurgiques',
          'Thématique 3 : Caractérisation de la minéralisation de l\'uranium dans le massif granitique de Saraya (Sénégal oriental)',
          'Récupération des minéraux lourds des sables de la Grande Côte',
          'Cartographie numérique des gisements minéraux',
        ],
        'enseignement' => [
          'Cartographie géologique',
          'Valorisation des ressources minérales',
        ],
        'publications' => [
          ['ref' => '1',    'texte' => 'Dieye et al. (2020). Mineralogical characterization of Heavy Mineral Concentrates from Senegalese Great Coast by Qemscan and SEM. <em>International Journal of Geosciences</em>, 11(12), 800-817.'],
          ['ref' => '2',    'texte' => 'Dieye et al. (2021). Monazite Recovery by Magnetic and Gravity Separation of Medium Grade Zircon Concentrate from Senegalese Heavy Mineral Sands. <em>Journal of Minerals and Materials Characterization and Engineering</em>, 9(6), 590-608.'],
          ['ref' => '3',    'texte' => 'Thiam, Dieye, Dione, Ndiaye et al. (2022). Stratigraphy of the MSGBC Basin in the Western Part of Thies. <em>Open Journal of Geology</em>, 12, 685-705.'],
          ['ref' => '4',    'texte' => 'Thiam, Dione, Dieye et al. (2023). Lithostratigraphy and Characterisation of Paleocene Limestones for Optimal Exploitation. <em>Geomaterials</em>, 13, 51-60.'],
          ['ref' => 'Comm.','texte' => 'Dieye M. et al. (2021). Récupération de la monazite dans les gisements de sables à minéraux lourds de la grande côte du Sénégal. <em>CAMES 5ème journées scientifiques</em>, Dakar, 6-9 décembre 2021.'],
        ],
      ],

      'faye-cheikh-ibrahima' => [
        'nom'       => 'FAYE Cheikh Ibrahima',
        'initiales' => 'FC',
        'grade'     => 'Maître de Conférences Assimilé',
        'directeur' => FALSE,
        'domaine'   => 'Géosciences',
        'spec'      => 'Métallogénie · Géochimie · Pétrographie',
        'email'     => 'cheikhibrahima3.faye@ucad.edu.sn',
        'gradient'  => 'linear-gradient(135deg,#0b2844 0%,#0f3d6e 60%,#0a2f5a 100%)',
        'stats'     => ['5' => 'Publications', 'Métallogénie' => 'Spécialité', '2016' => 'Recrutement'],
        'formation' => [
          ['annee' => '2023',      'titre' => 'Thèse de doctorat en cotutelle — Gisements aurifères associés aux complexes plutoniques du Sénégal oriental', 'lieu' => 'UCAD (Sénégal) / Université de Genève (Suisse)'],
          ['annee' => '2019',      'titre' => 'Cours de renforcement — Gîtologie & Métallogénie avancée, identification des minéraux opaques', 'lieu' => 'Université de Genève'],
          ['annee' => '2011–auj.', 'titre' => 'Géologue d\'exploration — cartographie géologique, or, manganèse, niobium, bauxite', 'lieu' => 'Afrique'],
          ['annee' => '2005–2011', 'titre' => 'Ingénieur géologue de conception', 'lieu' => 'IST / UCAD, Dakar'],
        ],
        'specialites' => ['Métallogénie', 'Géochimie', 'Pétrographie', 'Géologie minière', 'Gisements aurifères'],
        'recherches' => [
          'Géologie, Géochimie, Métallogénie et Pétrographie',
          'Gisements aurifères associés aux complexes plutoniques du Sénégal oriental',
          'Minéralisation de l\'uranium dans les granites paléoprotérozoïques (Saraya)',
          'Guides géologiques, géophysiques et géochimiques pour l\'exploration de l\'or — Falémé Volcanic Belt',
          'Arc magmatique du Kedougou-Kenieba Inlier : pétro-géochimie et implications métallogéniques',
        ],
        'enseignement' => [
          'Cours et TP/TD — Pétro-minéralogie',
          'Géochimie',
          'Métallogénie',
          'École de terrain (cartographie)',
        ],
        'publications' => [
          ['ref' => '1', 'texte' => 'Dieye, Faye, Diene, Cuney, Brouand, Gueye (2025). Uranium mineralization associated with albitization in a Paleoproterozoic granite: Saraya granite, Eastern Senegal. <em>Journal of African Earth Sciences</em>, 226, 105570.'],
          ['ref' => '2', 'texte' => 'Faye, Ndiaye, Dia, Diene, Gueye et al. (2023). Magmatic arc construction within the Kedougou-Kenieba inlier, eastern Senegal. <em>Journal of African Earth Sciences</em>, 208, 105076.'],
          ['ref' => '3', 'texte' => 'Faye, Ndiaye, Dia, Gueye, Moritz (2023). Geological, geophysical and surface geochemical guides for gold exploration in the Falémé Volcanic Belt, West African Craton. <em>Journal of Geochemical Exploration</em>, 245, 107145.'],
          ['ref' => '4', 'texte' => 'Dia, Faye, Keinde, Diagne, Gueye (2017). Effects of Preparation Parameters on Stabilization of Sabodala Gold Mine Tailings. <em>Journal of Geoscience and Environment Protection</em>, 5, 21-35.'],
          ['ref' => '5', 'texte' => 'Faye et al. New U-Pb Geochronology, isotopic Sr-Nd and Lu-Hf of Paleoproterozoic intrusions in the Kedougou-Kenieba Inlier. <em>(In Preparation)</em>'],
          ['ref' => 'Prix', 'texte' => '<strong>2024</strong> : Best Paper Award — African Early Career Geoscientist, <em>Journal of African Earth Sciences</em>. <strong>2022</strong> : Research Grant — Spora\'s Explorers Fund & McKinstry Fund, SEG Foundation. <strong>2019</strong> : Research Grant — Newmont Mining Corporation, SEG Foundation.'],
        ],
      ],

      'gbaguidi-ignace' => [
        'nom'       => 'GBAGUIDI Ignace André',
        'initiales' => 'GI',
        'grade'     => 'Maître de Conférences Assimilé',
        'directeur' => FALSE,
        'domaine'   => 'Géosciences',
        'spec'      => 'Géologie de l\'ingénieur · Géotechnique · Matériaux de construction',
        'email'     => 'gbaguidi.ignace@yahoo.com',
        'gradient'  => 'linear-gradient(135deg,#1e2f52 0%,#2d4a7a 60%,#1a2c4e 100%)',
        'stats'     => ['35+' => 'Ans IST', '1988' => 'Recrutement', 'Paris' => 'Mines / INSA'],
        'formation' => [
          ['annee' => '1985', 'titre' => 'Docteur-Ingénieur en Géologie de l\'Ingénieur',  'lieu' => 'École des Mines de Paris'],
          ['annee' => '1984', 'titre' => 'DEA de Géologie de l\'Ingénieur',                'lieu' => 'École des Mines de Paris'],
          ['annee' => '1984', 'titre' => 'Géologue SEGM',                                  'lieu' => 'École des Mines de Paris'],
          ['annee' => '1983', 'titre' => 'Ingénieur du Génie Civil et Urbaniste',          'lieu' => 'INSA de Rennes'],
          ['annee' => '1979', 'titre' => 'Licence en Sciences Physiques',                  'lieu' => 'Université de Dakar'],
        ],
        'specialites' => ['Mécanique des sols et des fondations', 'Géotechnique routière', 'Matériaux de construction', 'Fondations d\'ouvrages du Génie civil', 'Infrastructures routières'],
        'recherches' => [
          'Fondations d\'ouvrages du Génie civil',
          'Infrastructures routières',
          'Matériaux de construction',
          'Consultant BAD (I/AFR-BEN/047) — Groupe de la Banque Africaine de Développement',
          'Membre de l\'Association des Ingénieurs INSA Rennes (AIIR)',
        ],
        'enseignement' => [
          'Géotechnique (IST 2ème année)',
          'Matériaux de construction (IST 3ème année)',
          'Cartographie (CPEST 2ème année)',
        ],
        'publications' => [
          ['ref' => 'Thèse', 'texte' => 'Gbaguidi I.A. (1985). Thèse de Docteur-Ingénieur en Géologie de l\'Ingénieur. <em>École Nationale Supérieure des Mines de Paris</em>.'],
          ['ref' => 'SAES',  'texte' => 'Membre du Syndicat Autonome de l\'Enseignement Supérieur (SAES) depuis décembre 1988.'],
        ],
      ],

      'ndiaye-abdoul-aziz' => [
        'nom'       => 'NDIAYE Abdoul Aziz',
        'initiales' => 'NA',
        'grade'     => 'Enseignant-Chercheur · ENSMG',
        'directeur' => FALSE,
        'domaine'   => 'Géosciences',
        'spec'      => 'Géostatistique Minière · Évaluation de Projets Miniers',
        'email'     => '',
        'gradient'  => 'linear-gradient(135deg,#14325a 0%,#1e4a82 60%,#112e56 100%)',
        'stats'     => ['Géostatistique' => 'Spécialité', '2007' => 'Recrutement IST', 'UCAD' => 'Dakar'],
        'formation' => [
          ['annee' => 'Doctorat',   'titre' => 'Thèse de Doctorat en GeoRessources — Évaluation de Mines d\'Or à Ciel Ouvert par les Options Réelles', 'lieu' => 'UCAD / CERNA (École des Mines de Paris)'],
          ['annee' => 'Post-Grad.', 'titre' => 'Post Graduate — Géostatistique Minière',        'lieu' => 'Centre de Géostatistique (CFSG-CESMAT) — École des Mines de Paris'],
          ['annee' => 'Ingénieur',  'titre' => 'Ingénieur Géologue',                             'lieu' => 'IST / UCAD, Dakar'],
        ],
        'specialites' => ['Géostatistique minière', 'Modélisation géologique', 'Évaluation des ressources et réserves', 'Options réelles en projets miniers', 'Géologie minière et prospection'],
        'recherches' => [
          'Géostatistique Minière : modélisation géologique et évaluation/classification des ressources',
          'Évaluation économique des projets miniers avec incertitudes techniques et financières (Options réelles)',
          'Modèles de fiscalité minière conditionnelle et partage des revenus (État, Sociétés, Communautés)',
          'Projet PAES/UEMOA : Valorisation des Rejets de Traitement des Mines — Fines de Phosphate de Lamlam (60M FCfa)',
          'Expérience industrielle : Phosphates & Argiles (SSPT), Exploration Or (Ashanti Goldfield Sénégal)',
        ],
        'enseignement' => [
          'Géostatistique Linéaire (5ème année)',
          'Prospection Minière (4ème année)',
          'Modélisation des Corps Géologiques — Simulations (5ème année)',
          'Évaluation Économique de Projets Miniers (5ème année)',
          'TP-TD Pétrographie et Minéralogie en Cours Préparatoire',
          'Stage de Terrain : Cartographie en Zones Profondes au Sénégal Oriental (3ème année)',
        ],
        'publications' => [
          ['ref' => 'Art. 1',  'texte' => 'Ndiaye A.A. & Armstrong M. (2013). Evaluating a small deposit next to an economically viable gold mine in western Africa. <em>Resources Policy</em>, 38, 113-122.'],
          ['ref' => 'Art. 2',  'texte' => 'Armstrong M., Ndiaye A.A., Razanatsimba R. & Galli A. (2013). Scenario Reduction applied to Geostatistical Simulations. <em>Mathematical Geosciences</em>, 45(2), 165-182.'],
          ['ref' => 'Comm. 1', 'texte' => 'Ndiaye A.A., Armstrong M. (2012). Impacts économiques des exploitations de mines d\'or sur les pays ouest-africains. <em>SIM Sénégal</em>, Dakar, 6-8 novembre 2012.'],
          ['ref' => 'Comm. 2', 'texte' => 'Armstrong M., Ndiaye A.A., Galli A. (2010). The need for Scenario Reduction in Mining. <em>IAMG Conference</em>, Budapest, 29 sept – 2 oct 2010.'],
          ['ref' => 'Comm. 3', 'texte' => 'Armstrong M., Galli A., Ndiaye A.A. (2009). A reality check on hedging practices in the mining industry. <em>AusIMM Project Evaluation Conference</em>, Melbourne, 21-22 avril 2009.'],
        ],
      ],

      'ndiaye-codou' => [
        'nom'       => 'NDIAYE Mame Codou',
        'initiales' => 'NC',
        'grade'     => 'Enseignant-Chercheur · ENSMG',
        'directeur' => FALSE,
        'domaine'   => 'Géosciences',
        'spec'      => 'Pétrographie-Minéralogie · Géo-ressources',
        'email'     => '',
        'gradient'  => 'linear-gradient(135deg,#0d1e42 0%,#1c3666 60%,#0f2a56 100%)',
        'stats'     => ['Pétrographie' => 'Spécialité', 'IST' => 'ENSMG', 'UCAD' => 'Dakar'],
        'formation' => [
          ['annee' => '2016', 'titre' => 'Diplôme Universitaire Francophonie — Nouvelle Économie et Développement Durable', 'lieu' => '2IF / Jean Moulin Lyon 3, France'],
          ['annee' => '2009', 'titre' => 'Diplôme d\'Ingénieur Géologue de Conception',             'lieu' => 'IST / UCAD, Dakar'],
          ['annee' => '2001', 'titre' => 'Baccalauréat Série S2',                                    'lieu' => 'Sénégal'],
        ],
        'specialites' => ['Pétrographie-Minéralogie', 'Géo-ressources', 'Environnement et imagerie', 'Aménagement du territoire', 'Géologie minière'],
        'recherches' => [
          'Géo-ressources et environnement dans les industries extractives',
          'Imagerie géologique et aménagement du territoire',
          'Cadre litostructural des gisements d\'or orogéniques dans l\'inlier de Kédougou (Massawa, Sofia, MTZ)',
          'Développement Durable et Économie verte dans les industries extractives',
        ],
        'enseignement' => [
          'Géodynamique interne',
        ],
        'publications' => [
          ['ref' => '1', 'texte' => 'Ndiaye M.C. et al. Lithostrutural framework for orogenic gold deposits in the Kédougou inlier (case of Massawa and Sofia on the MTZ). <em>En préparation</em>.'],
          ['ref' => '2', 'texte' => 'Ndiaye M.C. Recherche sur le Développement Durable et Économie verte dans les industries extractives. <em>ENSMG / IST</em>.'],
        ],
      ],

      // ── NOUVEAUX ENSEIGNANTS ──────────────────────────────────────────────

      'faye-gayane' => [
        'nom'       => 'FAYE Gayane',
        'initiales' => 'FG',
        'grade'     => 'Professeur Assimilé',
        'directeur' => FALSE,
        'domaine'   => 'Technologies',
        'spec'      => 'Géomatique · Télédétection · SIG',
        'email'     => 'gayane.faye@ucad.edu.sn',
        'gradient'  => 'linear-gradient(135deg,#0b2844 0%,#0f3d6e 60%,#0a2f5a 100%)',
        'stats'     => ['24+' => 'Articles', '34' => 'Communications', '2016' => 'Recrutement'],
        'formation' => [
          ['annee' => '2012–2015', 'titre' => 'Post-doctorat — Télédétection Radar/Optique, suivi de végétation, humidité du sol, feux de brousse', 'lieu' => 'Centre de Suivi Écologique (CSE), Dakar'],
          ['annee' => '2015–2016', 'titre' => 'Enseignant-Chercheur — Télédétection et Photogrammétrie', 'lieu' => 'École Polytechnique de Thiès (EPT)'],
          ['annee' => 'Doctorat',  'titre' => 'Doctorat en Physique appliquée — spécialité Télédétection spatiale de la biosphère', 'lieu' => 'UCAD, Dakar'],
        ],
        'specialites' => ['Télédétection (Radar & Optique)', 'Systèmes d\'Information Géographique (SIG)', 'Photogrammétrie', 'Cloud computing & Machine Learning', 'Modélisation de la biosphère'],
        'recherches' => [
          'Télédétection et suivi de la biosphère (végétation, humidité du sol, feux de brousse)',
          'Cartographie de l\'agriculture au Sénégal par séries temporelles Sentinel-1 & Sentinel-2',
          'Photogrammétrie et cartographie numérique',
          'SIG et applications environnementales (pandémies, érosion, mangroves)',
          'Coordinateur du projet spatial SenSAT — premier satellite sénégalais (MESRI)',
          'Gestion des mines orphelines et ressources naturelles par télédétection',
        ],
        'enseignement' => [
          'Télédétection',
          'Physique (optique)',
          'Photogrammétrie',
        ],
        'publications' => [
          ['ref' => '1',     'texte' => 'Faye G. et al. (2011). Étude de la saisonnalité des mesures du diffusiomètre SCAT, suivi de la végétation au Sahel : Ferlo. <em>Télédétection</em>, 10(1), 23-31.'],
          ['ref' => '2',     'texte' => 'Frison P.L., Faye G. et al. (2012). Analysis of L and C-band SAR images time series over a Sahelian area. <em>IEEE Geoscience and Remote Sensing Letters</em>.'],
          ['ref' => '3',     'texte' => 'Fatras C., Frappart F., Mougin E., Faye G. et al. (2015). Spaceborne altimetry and scatterometry at C- and Ku-band over West Africa. <em>Remote Sensing of Environment</em>, 159, 117-133.'],
          ['ref' => '4',     'texte' => 'Sarr M.A., Faye G. et al. (2015). Utilisation de données MODIS et SPOT pour l\'analyse de la dynamique des feux de brousse au Ferlo. <em>Journal de Photo-interprétation</em>.'],
          ['ref' => '5',     'texte' => 'Diouf A.A., Faye G. et al. (2016). Do Agrometeorological Data Improve Satellite-based Estimations of Herbaceous Yield in Sahelian Ecosystems? <em>Remote Sensing</em>.'],
          ['ref' => '6',     'texte' => 'Faye G. et al. (2017). Estimation de l\'humidité du sol au Ferlo à partir des données radar ASAR et Spot-végétation. <em>Egyptian Journal of Remote Sensing and Space Science</em>.'],
          ['ref' => '7',     'texte' => 'Baratoux D., Faye G. et al. (2017). The state of planetary and space sciences in Africa. <em>Earth & Space Science News (EOS)</em>, 98(11).'],
          ['ref' => '8',     'texte' => 'Diédhiou C., Faye G. et al. (2019). Applicability of Landsat-8 for Monitoring the Trophic State of Lake Guiers (Senegal). <em>Journal of Water Resource and Protection</em>, 11, 434-447.'],
          ['ref' => '9',     'texte' => 'Ngom N.M., Mbaye M., Baratoux D., Faye G. et al. (2020). Mapping artisanal and small-scale gold mining in Senegal using Sentinel 2. <em>GeoHealth</em>, 4, e2020GH000310.'],
          ['ref' => '10',    'texte' => 'Faye G. et al. (2020). Capacity of Radar Time Series for Crop Mapping in the Sahel: Groundnut, Millet and Maize. <em>International Journal of Environment, Agriculture and Biotechnology</em>.'],
          ['ref' => '11',    'texte' => 'Faye G. et al. (2020). Mathematical analysis of Sentinel-2 spectral signal for mapping agriculture in Senegal. <em>African Journal of Applied Statistics</em>, 7(2), 1009-1025.'],
          ['ref' => '12',    'texte' => 'Faye G., Mbengue F. et al. (2020). Complementarity of Sentinel-1 and Sentinel-2 for Mapping Agricultural Areas in Senegal. <em>Advances in Remote Sensing</em>, 9, 101-115.'],
          ['ref' => '13',    'texte' => 'Sagne P., Faye G. et al. (2020). Impacts of storm surges on sandy beaches: northern coast of Dakar. <em>EWASH & TI Journal</em>, 4(1), 325-335.'],
          ['ref' => '14',    'texte' => 'Biaye L., Faye G. et al. (2020). Physical and Chemical Properties of Soil in the Sahelian Region: Nioro du Rip. <em>Journal of Geography, Environment and Earth Science International</em>, 24(5), 73-82.'],
          ['ref' => '15',    'texte' => 'Tine D., Faye G. et al. (2020). Contribution of water erosion to coastal morphodynamics: RUSLE in the Kafountine watershed. <em>International Journal of Agriculture, Environment and Bioresearch</em>, 5(6), 184-199.'],
          ['ref' => '16',    'texte' => 'Niang C.A.B., Baratoux D., Faye G. et al. (2021). K, Th, U signatures in airborne radiometric data from Australian meteorite impact structures. <em>GSA Special Paper</em>, 550.'],
          ['ref' => '17',    'texte' => 'Tine D., Faye G. et al. (2021). Sentinel-2/Landsat-8 for Vegetation Cover and Wetlands in Urban Zones: Dakar Region. <em>Journal of Geographic Information System</em>, 13, 523-537.'],
          ['ref' => '18',    'texte' => 'Faye G. et al. (2021). Cloud Computing and Machine Learning for Mangrove Ecosystems in the Grand Saloum. <em>American Journal of Environmental Protection</em>, 9(1), 29-42.'],
          ['ref' => '19',    'texte' => 'Tine D., Faye G. et al. (2021). Land use changes by CA-Markov in the Southern rivers: Lower Casamance to Gêba river. <em>Journal of Ecology and The Natural Environment</em>, 14(1), 1-14.'],
          ['ref' => '20',    'texte' => 'Mbengue F., Faye G. et al. (2022). Machine Learning Classification for Rice Detection using Earth Observation Data: Senegal. <em>European Scientific Journal</em>, 18(17), 214.'],
          ['ref' => '21',    'texte' => 'Marigo O., Faye G. et al. (2022). Spatio-temporal Analysis of Soil Moisture from SMAP and SMOS in Senegal. <em>American Journal of Environmental Protection</em>, 10(1), 8-21.'],
          ['ref' => '22',    'texte' => 'Niang C.A.B., Baratoux D., Faye G. et al. (2022). Origin of potassium-rich annular zones at the Bosumtwi impact structure, Ghana. <em>Meteoritics & Planetary Science</em>.'],
          ['ref' => '23',    'texte' => 'Baratoux D., Niang C.A.B., Faye G. et al. Bosumtwi impact structure, Ghana: fluidized emplacement of the ejecta. <em>Meteoritics and Planetary Science</em>.'],
          ['ref' => '24',    'texte' => 'Buie A-W., Porter S.B., Faye G. et al. Size and shape constraints of (486958) 2014 MU69 from stellar occultations. (Multi-author international study)'],
          ['ref' => 'Projet', 'texte' => 'Coordinateur du projet spatial <strong>SenSAT</strong> — construction du premier satellite sénégalais. Sous tutelle du Ministère de l\'Enseignement Supérieur, de la Recherche et de l\'Innovation (MESRI). + 34 communications scientifiques internationales.'],
        ],
      ],

      'ndiaye-matar' => [
        'nom'       => 'NDIAYE Matar',
        'initiales' => 'NM',
        'grade'     => 'Maître de Conférences Assimilé',
        'directeur' => FALSE,
        'domaine'   => 'Géosciences',
        'spec'      => 'Sédimentologie · Géologie du pétrole · Sismostratigraphie',
        'email'     => 'matar.ndiaye@ucad.edu.sn',
        'gradient'  => 'linear-gradient(135deg,#0d2035 0%,#1a3a60 60%,#0f2a50 100%)',
        'stats'     => ['5' => 'Publications', 'Séismique' => 'Spécialité', '2011' => 'Recrutement'],
        'formation' => [
          ['annee' => '2008–2011', 'titre' => 'PhD — Sismostratigraphie du bassin Sénégalo-Mauritanien dans les régions de Thiès et Diourbel', 'lieu' => 'Université de Genève'],
          ['annee' => '2008–2010', 'titre' => 'Assistant en Géologie',                                     'lieu' => 'Université de Genève'],
          ['annee' => '2006–2008', 'titre' => 'Certificat de Géomatique',                                  'lieu' => 'Université de Genève'],
          ['annee' => '2003–2006', 'titre' => 'Diplôme d\'ingénieur géologue en bassin sédimentaire',      'lieu' => 'Université de Genève'],
          ['annee' => '1999–2001', 'titre' => 'DEA de Géosciences appliquées',                             'lieu' => 'UCAD, Dakar'],
        ],
        'specialites' => ['Sédimentologie', 'Géologie du pétrole', 'Sismostratigraphie', 'Interprétation géophysique', 'Bassins sédimentaires'],
        'recherches' => [
          'Sismostratigraphie et interprétation des bassins sédimentaires',
          'Étude du bassin pétrolier sénégalo-mauritanien',
          'Interprétations géophysiques (sismique, magnétisme, gravimétrie, forages)',
          'Paléontologie et sédimentologie des bassins côtiers',
        ],
        'enseignement' => [
          'Paléontologie',
          'Sédimentologie',
          'Interprétation sismique',
        ],
        'publications' => [
          ['ref' => '1',    'texte' => 'Ndiaye M., Ngom P.M., Gorin G., Villeneuve M., Sartori M., Medou J. (2016). A new interpretation of the deep-part of Senegal-Mauritanian Basin in the Diourbel-Thies area. <em>Journal of African Earth Sciences</em>, pp. 330-341.'],
          ['ref' => '2',    'texte' => 'Ndiaye M., Clerc N., Gorin G., Girardclos S., Fiore J. (2013). Lake Neuchâtel seismic stratigraphic record: simultaneous Würmian deglaciation of the Rhône Glacier and Jura Ice Cap. <em>Quaternary Science Reviews</em>, pp. 1-19.'],
          ['ref' => '3',    'texte' => 'Ndiaye M. (2013). Onshore seismostratigraphic interpretation in the Senegalo-Mauritanian basin (Diourbel-Thies). <em>Colloquium of African Geology N°24</em>, Addis Ababa, p. 106.'],
          ['ref' => '4',    'texte' => 'Gorin G., Ndiaye M., Clerc N. (2009). Late Quaternary infill of Lake Neuchâtel: fault activity and deglaciation from reflection seismics. <em>Monte Veritá Symposium</em>, Ascona, juillet 2009.'],
          ['ref' => '5',    'texte' => 'Ndiaye M., Diop M.B., Ngom P.M., Besson J.C. (2003). Pouzolanic activity of volcanic tuffs of Mako areas (Senegal). <em>IAEG International Symposium</em>, Tunis, pp. 517-523.'],
        ],
      ],

      'niang-magatte' => [
        'nom'       => 'NIANG Magatte F.K.',
        'initiales' => 'NMF',
        'grade'     => 'Maître de Conférences Titulaire',
        'directeur' => FALSE,
        'domaine'   => 'Géosciences',
        'spec'      => 'Géologie · Géophysique · Exploration',
        'email'     => 'magatte.niang@ucad.edu.sn',
        'gradient'  => 'linear-gradient(135deg,#1a2a4a 0%,#2a4070 60%,#182440 100%)',
        'stats'     => ['MCT' => 'Grade', '1996' => 'Recrutement', 'Géophysique' => 'Spécialité'],
        'formation' => [
          ['annee' => '2014',      'titre' => 'Certificat OpendTect',                              'lieu' => 'DGBES, Enschede, Pays-Bas'],
          ['annee' => '2011',      'titre' => 'Certificat Global Seismology',                      'lieu' => 'IISEE, Tsukuba, Japon'],
          ['annee' => '1995',      'titre' => 'Thèse Géologie/Géophysique',                        'lieu' => 'UCAD, Dakar'],
          ['annee' => '1991',      'titre' => 'DEA Géologie Appliquée à l\'Hydrogéologie',         'lieu' => 'UCAD, Dakar'],
          ['annee' => '1990',      'titre' => 'Ingénieur Géologue',                                'lieu' => 'IST / UCAD, Dakar'],
        ],
        'specialites' => ['Géophysique d\'exploration', 'Géologie structurale', 'Hydrogéologie', 'Prospection des hydrocarbures', 'Géo-radar et diagraphies'],
        'recherches' => [
          'Exploration Géophysique : géologie structurale, eau, hydrocarbures, environnement, mines et carrières',
          'Recherche de massifs basaltiques au Sénégal (Eiffage Industries / Harmony SARL / ENSMG)',
          'Hydrogéologie et ressources en eau souterraines',
          'Interprétation des données géophysiques pour la prospection minière',
        ],
        'enseignement' => [
          'Méthodes de Prospection Géophysiques (Gravimétrie, Magnétisme, Électrique, Électromagnétisme, Sismique, Géo-radar, Diagraphies)',
          'Géodynamique Interne',
        ],
        'publications' => [
          ['ref' => 'Assoc.', 'texte' => 'Membre : <strong>SEG</strong> (Society of Exploration Geophysicists) · <strong>SGA</strong> (Société Géologique d\'Afrique) · <strong>SPE</strong> (Society of Petroleum Engineering) · <strong>SIM</strong> (Société de l\'Industrie Minérale).'],
          ['ref' => 'Projet', 'texte' => 'Projet actif : Recherche de massifs basaltiques au Sénégal — partenariat Eiffage Industries / Harmony SARL / ENSMG.'],
        ],
      ],

    ];
  }

  /**
   * Page de profil d'un enseignant.
   */
  public function profil(string $slug): array|RedirectResponse {
    $profs = $this->getProfs();

    if (!isset($profs[$slug])) {
      return new RedirectResponse('/ecole/enseignants');
    }

    $p = $profs[$slug];

    // Stats bar
    $statsBarHtml = '';
    foreach ($p['stats'] as $val => $lbl) {
      $statsBarHtml .= '<div class="prf-stat"><div class="prf-stat-val">' . htmlspecialchars((string) $val) . '</div><div class="prf-stat-lbl">' . htmlspecialchars($lbl) . '</div></div>';
    }

    // Hero panel rows (grade + stats)
    $panelRowsHtml = '<div class="prf-panel-row"><span class="prf-panel-lbl">Grade</span><span class="prf-panel-val">' . htmlspecialchars($p['grade']) . '</span></div>';
    foreach ($p['stats'] as $val => $lbl) {
      $panelRowsHtml .= '<div class="prf-panel-row"><span class="prf-panel-lbl">' . htmlspecialchars($lbl) . '</span><span class="prf-panel-val prf-panel-val-gold">' . htmlspecialchars((string) $val) . '</span></div>';
    }
    if (!empty($p['email'])) {
      $panelRowsHtml .= '<div class="prf-panel-row"><span class="prf-panel-lbl">Email</span><span class="prf-panel-val" style="font-size:.68rem">' . htmlspecialchars($p['email']) . '</span></div>';
    }

    // Formation timeline
    $formHtml = '';
    foreach ($p['formation'] as $f) {
      $formHtml .= '<div class="tl-item">
        <div class="tl-yr">' . htmlspecialchars($f['annee']) . '</div>
        <div class="tl-dot"></div>
        <div class="tl-body">
          <div class="tl-title">' . htmlspecialchars($f['titre']) . '</div>
          <div class="tl-lieu"><i class="bi bi-geo-alt"></i> ' . htmlspecialchars($f['lieu']) . '</div>
        </div>
      </div>';
    }

    // Recherches
    $rechHtml = '';
    foreach ($p['recherches'] as $r) {
      $rechHtml .= '<li>' . htmlspecialchars($r) . '</li>';
    }

    // Aside: Informations
    $infoHtml  = '<div class="info-row"><div class="info-lbl">Grade</div><div class="info-val">' . htmlspecialchars($p['grade']) . '</div></div>';
    $infoHtml .= '<div class="info-row"><div class="info-lbl">Domaine</div><div class="info-val">' . htmlspecialchars($p['domaine']) . '</div></div>';
    $infoHtml .= '<div class="info-row"><div class="info-lbl">Spécialité</div><div class="info-val">' . htmlspecialchars($p['spec']) . '</div></div>';
    $infoHtml .= '<div class="info-row"><div class="info-lbl">Institution</div><div class="info-val">IST / ENSMG · UCAD Dakar</div></div>';

    // Spécialités
    $specsHtml = '';
    foreach ($p['specialites'] as $s) {
      $specsHtml .= '<span class="spec-tag">' . htmlspecialchars($s) . '</span>';
    }

    // Enseignement
    $ensHtml = '';
    foreach ($p['enseignement'] as $e) {
      $ensHtml .= '<li>' . htmlspecialchars($e) . '</li>';
    }

    // Publications — accordéon
    $pubHtml = '';
    $first = TRUE;
    foreach ($p['publications'] as $pub) {
      $openClass = $first ? ' open' : '';
      $first = FALSE;
      // Extrait court pour le preview (150 chars max)
      $preview = strip_tags($pub['texte']);
      if (mb_strlen($preview) > 120) {
        $preview = mb_substr($preview, 0, 120) . '…';
      }
      $pubHtml .= '<div class="pub-item' . $openClass . '">
        <div class="pub-toggle" onclick="togglePub(this)">
          <span class="pub-num">' . htmlspecialchars($pub['ref']) . '</span>
          <span class="pub-preview">' . htmlspecialchars($preview) . '</span>
          <i class="bi bi-chevron-down pub-arrow"></i>
        </div>
        <div class="pub-body">' . $pub['texte'] . '</div>
      </div>';
    }

    $pubCount = count($p['publications']);
    $dirBadge = $p['directeur'] ? '<span class="prf-badge prf-badge-gold"><i class="bi bi-star-fill"></i> Directeur de l\'ENSMG</span>' : '';

    $html = <<<HTML
<style>
/* Masquer le bandeau titre du thème — remplacé par notre hero */
.page-title-banner{display:none!important}
/* Supprimer complètement la bande blanche */
.pre-content-region{display:none!important}
.page-wrapper{padding:0!important;margin:0!important;max-width:100%!important;gap:0!important}
.page-content{padding:0!important;margin:0!important}
*{box-sizing:border-box}
.prf-wrap{width:100vw;position:relative;left:50%;margin-left:-50vw}
/* ── HERO ── */
.prf-hero{background:{$p['gradient']};position:relative;overflow:hidden;padding:0}
.prf-hero::after{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 60% 80% at 0% 100%,rgba(201,168,76,.08) 0%,transparent 60%),radial-gradient(ellipse 40% 60% at 100% 0%,rgba(28,54,102,.6) 0%,transparent 70%)}
.prf-hero-grid{position:relative;z-index:2;display:grid;grid-template-columns:1fr 340px;padding:3rem 4.5rem 0;gap:2rem;align-items:end}
.prf-hero-lines{position:absolute;right:0;top:0;bottom:0;width:340px;background:repeating-linear-gradient(0deg,transparent,transparent 39px,rgba(255,255,255,.025) 40px);pointer-events:none;z-index:1}
.prf-hero-tag{display:inline-flex;align-items:center;gap:.5rem;background:rgba(201,168,76,.12);border:1px solid rgba(201,168,76,.25);color:#c9a84c;font-size:.65rem;font-weight:800;letter-spacing:.15em;text-transform:uppercase;padding:.3rem .85rem;border-radius:20px;margin-bottom:1.2rem}
.prf-hero-name{font-family:Georgia,serif;font-size:3.2rem;font-weight:700;color:#fff!important;line-height:1;margin-bottom:.5rem;text-shadow:0 2px 40px rgba(0,0,0,.3)}
.prf-hero-grade{color:rgba(255,255,255,.5);font-size:.88rem;line-height:1.5;border-left:2px solid rgba(201,168,76,.4);padding-left:.85rem;margin-bottom:1.2rem}
.prf-hero-badges{display:flex;gap:.5rem;flex-wrap:wrap;margin-bottom:1.5rem}
.prf-badge{display:inline-flex;align-items:center;gap:.35rem;padding:.32rem .85rem;border-radius:8px;font-size:.68rem;font-weight:700}
.prf-badge-gold{background:rgba(201,168,76,.15);color:#e2c97e;border:1px solid rgba(201,168,76,.3)}
.prf-badge-blue{background:rgba(28,54,102,.5);color:rgba(255,255,255,.7);border:1px solid rgba(255,255,255,.1)}
.prf-hero-panel{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-bottom:none;border-radius:16px 16px 0 0;padding:1.75rem;display:flex;flex-direction:column;gap:1rem;backdrop-filter:blur(8px)}
.prf-avatar-wrap{display:flex;align-items:center;gap:1rem}
.prf-avatar{width:72px;height:72px;border-radius:16px;background:linear-gradient(135deg,rgba(201,168,76,.2),rgba(201,168,76,.05));border:1.5px solid rgba(201,168,76,.35);display:flex;align-items:center;justify-content:center;font-family:Georgia,serif;font-size:1.7rem;font-weight:700;color:#c9a84c;flex-shrink:0}
.prf-avatar-name{font-size:.9rem;font-weight:700;color:#fff;line-height:1.2}
.prf-avatar-role{font-size:.7rem;color:rgba(255,255,255,.4);margin-top:.15rem}
.prf-panel-divider{height:1px;background:rgba(255,255,255,.07)}
.prf-panel-row{display:flex;justify-content:space-between;align-items:flex-start;gap:.5rem}
.prf-panel-lbl{font-size:.62rem;color:rgba(255,255,255,.35);text-transform:uppercase;letter-spacing:.1em;font-weight:700;white-space:nowrap;padding-top:.1rem}
.prf-panel-val{font-size:.75rem;color:rgba(255,255,255,.75);font-weight:600;text-align:right;line-height:1.3}
.prf-panel-val-gold{color:#c9a84c}
/* Stats bar */
.prf-stats-bar{position:relative;z-index:2;display:grid;grid-template-columns:repeat(auto-fit,minmax(100px,1fr));background:rgba(15,28,55,.6);border-top:1px solid rgba(255,255,255,.07);backdrop-filter:blur(4px)}
.prf-stat{padding:1.1rem 1.5rem;border-right:1px solid rgba(255,255,255,.07);display:flex;flex-direction:column;gap:.3rem}
.prf-stat:last-child{border-right:none}
.prf-stat-val{font-family:Georgia,serif;font-size:1.4rem;font-weight:700;color:#c9a84c;line-height:1}
.prf-stat-lbl{font-size:.6rem;color:rgba(255,255,255,.35);text-transform:uppercase;letter-spacing:.1em}
.prf-wave{line-height:0;background:rgba(15,28,55,.6)}
.prf-wave svg{display:block;width:100%}
/* ── BODY ── */
.prf-body{padding:.75rem 4.5rem 2rem;display:grid;grid-template-columns:1fr 300px;gap:1.25rem;align-items:start}
.prf-body-full{padding:0 4.5rem 4rem}
.prf-main{display:flex;flex-direction:column;gap:1rem}
.prf-aside{display:flex;flex-direction:column;gap:1rem}
/* ── CARDS ── */
.card{background:#fff;border-radius:14px;box-shadow:0 2px 16px rgba(15,28,55,.07);overflow:hidden;border:1px solid rgba(15,28,55,.07);transition:transform .2s,box-shadow .2s}
.card:hover{transform:translateY(-2px);box-shadow:0 6px 28px rgba(15,28,55,.12)}
.card-hd{background:linear-gradient(90deg,#0f1c37 0%,#1a3060 100%);padding:.85rem 1.35rem;display:flex;align-items:center;gap:.75rem}
.card-ico{width:30px;height:30px;border-radius:8px;background:rgba(201,168,76,.15);display:flex;align-items:center;justify-content:center;font-size:.9rem;color:#c9a84c;flex-shrink:0}
.card-ttl{font-size:.76rem;font-weight:800;color:#fff;text-transform:uppercase;letter-spacing:.06em}
.card-cnt{font-size:.7rem;color:rgba(255,255,255,.35);margin-left:auto;background:rgba(255,255,255,.08);padding:.15rem .55rem;border-radius:10px}
.card-bd{padding:1.25rem 1.35rem}
/* ── INFO ASIDE ── */
.info-row{display:flex;flex-direction:column;gap:.06rem;padding:.65rem 0;border-bottom:1px solid #f0f2f8}
.info-row:first-child{padding-top:0}
.info-row:last-child{border:none;padding-bottom:0}
.info-lbl{font-size:.6rem;font-weight:800;color:#9ca3af;text-transform:uppercase;letter-spacing:.1em}
.info-val{font-size:.82rem;color:#111827;font-weight:600;margin-top:.12rem}
.spec-cloud{display:flex;flex-wrap:wrap;gap:.35rem}
.spec-tag{background:#f0f4ff;border:1px solid #dde5f8;color:#0f1c37;border-radius:7px;padding:.22rem .75rem;font-size:.72rem;font-weight:600;transition:all .15s;cursor:default}
.spec-tag:hover{background:#0f1c37;color:#c9a84c;border-color:#0f1c37}
/* ── TIMELINE ── */
.tl{display:flex;flex-direction:column;gap:0}
.tl-item{display:grid;grid-template-columns:70px 1fr;gap:.85rem;padding-bottom:1.1rem;position:relative}
.tl-item:not(:last-child)::after{content:'';position:absolute;left:69px;top:18px;bottom:0;width:1px;background:linear-gradient(180deg,#dde2ee,transparent)}
.tl-yr{font-size:.63rem;font-weight:800;color:#c9a84c;text-align:right;padding-top:.18rem;line-height:1.3;white-space:nowrap}
.tl-dot{width:10px;height:10px;border-radius:50%;background:#c9a84c;border:2.5px solid #fff;box-shadow:0 0 0 2px rgba(201,168,76,.25);position:absolute;left:64px;top:3px}
.tl-body{padding-left:1rem}
.tl-title{font-weight:700;color:#111827;font-size:.84rem;line-height:1.35}
.tl-lieu{font-size:.72rem;color:#9ca3af;margin-top:.1rem;display:flex;align-items:center;gap:.3rem}
/* ── LISTE ── */
.lst{list-style:none;display:flex;flex-direction:column;gap:.55rem;padding:0}
.lst li{display:flex;align-items:baseline;gap:.65rem;font-size:.85rem;color:#374151;line-height:1.5}
.lst li::before{content:'';width:6px;height:6px;min-width:6px;border-radius:50%;background:linear-gradient(135deg,#c9a84c,#e2c97e);margin-top:.4rem}
/* ── PUBLICATIONS ACCORDÉON ── */
.pub-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:.65rem}
.pub-item{background:#f8f9fd;border:1px solid #eef0f8;border-radius:10px;overflow:hidden;transition:border-color .2s}
.pub-item.open{border-color:rgba(201,168,76,.35);background:#fffcf4}
.pub-toggle{display:flex;align-items:center;gap:.75rem;padding:.75rem .9rem;cursor:pointer;user-select:none}
.pub-toggle:hover{background:rgba(201,168,76,.05)}
.pub-num{background:linear-gradient(135deg,#0f1c37,#1a3060);color:#c9a84c;padding:.22rem .52rem;border-radius:6px;font-size:.62rem;font-weight:800;white-space:nowrap;flex-shrink:0;letter-spacing:.04em}
.pub-preview{flex:1;font-size:.78rem;color:#374151;font-weight:600;line-height:1.3;overflow:hidden;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical}
.pub-arrow{color:#c9a84c;font-size:.75rem;flex-shrink:0;transition:transform .25s}
.pub-item.open .pub-arrow{transform:rotate(180deg)}
.pub-body{max-height:0;overflow:hidden;transition:max-height .35s ease,padding .3s ease;font-size:.8rem;line-height:1.7;color:#374151;padding:0 .9rem}
.pub-item.open .pub-body{max-height:220px;padding:.1rem .9rem .85rem}
/* ── BACK ── */
.prf-back-btn{display:inline-flex;align-items:center;gap:.55rem;background:linear-gradient(135deg,#0f1c37,#1c3666);color:#fff;text-decoration:none;padding:.85rem 2.5rem;border-radius:50px;font-weight:700;font-size:.88rem;box-shadow:0 4px 20px rgba(15,28,55,.25);transition:all .2s}
.prf-back-btn:hover{background:linear-gradient(135deg,#c9a84c,#e2c97e);color:#0f1c37;box-shadow:0 6px 24px rgba(201,168,76,.35)}
@media(max-width:720px){
  .prf-hero-grid{grid-template-columns:1fr;padding:1.5rem 1rem 0}
  .prf-hero-panel{display:none}
  .prf-hero-name{font-size:2.2rem}
  .prf-body{grid-template-columns:1fr;padding:.75rem 1.5rem 1.5rem}
  .prf-body-full{padding:0 1.5rem 3rem}
  .pub-grid{grid-template-columns:1fr}
}
</style>

<div class="prf-wrap">

  <!-- HERO -->
  <div class="prf-hero">
    <div class="prf-hero-lines"></div>
    <div class="prf-hero-grid">
      <div>
        <div class="prf-hero-tag"><i class="bi bi-mortarboard-fill"></i> {$p['domaine']} · ENSMG · UCAD Dakar</div>
        <h1 class="prf-hero-name">{$p['nom']}</h1>
        <div class="prf-hero-grade">{$p['grade']}</div>
        <div class="prf-hero-badges">{$dirBadge}<span class="prf-badge prf-badge-blue"><i class="bi bi-geo-alt-fill"></i> IST / ENSMG</span></div>
      </div>
      <div class="prf-hero-panel">
        <div class="prf-avatar-wrap">
          <div class="prf-avatar">{$p['initiales']}</div>
          <div><div class="prf-avatar-name">{$p['nom']}</div><div class="prf-avatar-role">Enseignant-Chercheur</div></div>
        </div>
        <div class="prf-panel-divider"></div>
        {$panelRowsHtml}
      </div>
    </div>
    <div class="prf-stats-bar">{$statsBarHtml}</div>
    <div class="prf-wave"><svg viewBox="0 0 1440 52" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"><path d="M0,32 C480,58 960,8 1440,30 L1440,52 L0,52 Z" fill="#f0f2f8"/></svg></div>
  </div>

  <!-- BODY — 2 colonnes -->
  <div class="prf-body">

    <!-- MAIN -->
    <div class="prf-main">
      <div class="card">
        <div class="card-hd"><div class="card-ico"><i class="bi bi-mortarboard-fill"></i></div><div class="card-ttl">Parcours &amp; Formation</div></div>
        <div class="card-bd"><div class="tl">{$formHtml}</div></div>
      </div>
      <div class="card">
        <div class="card-hd"><div class="card-ico"><i class="bi bi-search"></i></div><div class="card-ttl">Activités de recherche</div></div>
        <div class="card-bd"><ul class="lst">{$rechHtml}</ul></div>
      </div>
    </div>

    <!-- ASIDE -->
    <div class="prf-aside">
      <div class="card">
        <div class="card-hd"><div class="card-ico"><i class="bi bi-person-vcard-fill"></i></div><div class="card-ttl">Informations</div></div>
        <div class="card-bd">{$infoHtml}</div>
      </div>
      <div class="card">
        <div class="card-hd"><div class="card-ico"><i class="bi bi-layers-fill"></i></div><div class="card-ttl">Spécialités</div></div>
        <div class="card-bd"><div class="spec-cloud">{$specsHtml}</div></div>
      </div>
    </div>

  </div><!-- /prf-body -->

  <!-- ENSEIGNEMENT + PUBLICATIONS — pleine largeur -->
  <div class="prf-body-full">
    <div class="card" style="margin-bottom:.65rem">
      <div class="card-hd"><div class="card-ico"><i class="bi bi-book-fill"></i></div><div class="card-ttl">Enseignement</div></div>
      <div class="card-bd"><ul class="lst" style="display:grid;grid-template-columns:repeat(3,1fr);gap:.4rem .65rem">{$ensHtml}</ul></div>
    </div>
    <div class="card">
      <div class="card-hd"><div class="card-ico"><i class="bi bi-file-earmark-text-fill"></i></div><div class="card-ttl">Publications &amp; communications</div><span class="card-cnt">{$pubCount} travaux</span></div>
      <div class="card-bd">
        <div class="pub-grid">{$pubHtml}</div>
      </div>
    </div>
    <div style="text-align:center;padding-top:1.5rem;padding-bottom:2.5rem">
      <a href="/ecole/enseignants" class="prf-back-btn"><i class="bi bi-arrow-left"></i> Retour au Corps Enseignant</a>
    </div>
  </div>

</div><!-- /prf-wrap -->

<script>
function togglePub(toggle){var item=toggle.parentElement;item.classList.toggle('open')}
</script>
HTML;

    return [
      '#markup' => Markup::create($html),
    ];
  }

  /**
   * Titre de la page.
   */
  public function title(string $slug): string {
    $profs = $this->getProfs();
    return isset($profs[$slug]) ? $profs[$slug]['nom'] . ' — ENSMG' : 'Profil Enseignant';
  }

}
