/**
 * ENSMG — Corps Enseignant — Design A + Modal profil + Filtres
 */
(function () {
  'use strict';

  /* ── Données enseignants ── */
  var enseignants = {
    'DIONE Adama': {
      initiales: 'DA', domain: 'Géosciences', domainColor: 'blue',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '🌍 Géologie structurale',
      specIcon: 'bi-geo-alt-fill',
      bio: 'Spécialiste de l\'analyse structurale des bassins sédimentaires d\'Afrique de l\'Ouest. Ses travaux portent sur la tectonique des plaques, la déformation des roches et la cartographie géologique au Sénégal et dans la sous-région.',
      tags: ['Tectonique', 'Cartographie', 'Bassins sédimentaires', 'Terrain'],
      gradient: 'linear-gradient(135deg, #0d1e42, #1c3666)'
    },
    'NDIAYE Abdoul Aziz': {
      initiales: 'NA', domain: 'Géosciences', domainColor: 'blue',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '💧 Géochimie',
      specIcon: 'bi-droplet-fill',
      bio: 'Expert en géochimie des roches ignées et sédimentaires. Ses recherches se concentrent sur la géochimie des gisements minéraux du Sénégal et sur les mécanismes de formation des minéralisations métalliques en Afrique subsaharienne.',
      tags: ['Géochimie isotopique', 'Gisements minéraux', 'Métaux', 'Analyse'],
      gradient: 'linear-gradient(135deg, #14325a, #1e4a82)'
    },
    'FAYE Gayane': {
      initiales: 'FG', domain: 'Géosciences', domainColor: 'blue',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '💎 Pétrologie',
      specIcon: 'bi-gem',
      bio: 'Pétrologue spécialisée dans l\'étude des roches magmatiques et métamorphiques. Ses travaux couvrent la pétrogenèse des complexes basaltiques ouest-africains et l\'histoire thermique des roches de la dorsale du craton ouest-africain.',
      tags: ['Roches magmatiques', 'Métamorphisme', 'Pétrogenèse', 'Craton'],
      gradient: 'linear-gradient(135deg, #1e2f52, #2d4a7a)'
    },
    'FAYE Cheikh Ibrahima': {
      initiales: 'FC', domain: 'Technologies', domainColor: 'gold',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '🛰 Télédétection',
      specIcon: 'bi-satellite-fill',
      bio: 'Spécialiste des systèmes d\'information géographique (SIG) et de la télédétection satellitaire. Ses recherches portent sur l\'utilisation des images satellites multi-spectrales pour la cartographie géologique et le suivi des ressources naturelles.',
      tags: ['SIG', 'Satellites', 'Cartographie numérique', 'Remote Sensing'],
      gradient: 'linear-gradient(135deg, #0b2844, #0f3d6e)'
    },
    'NDIAYE Matar': {
      initiales: 'NM', domain: 'Hydro/Géotechnique', domainColor: 'teal',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '💧 Hydrogéologie',
      specIcon: 'bi-water',
      bio: 'Expert reconnu en hydrogéologie et gestion des ressources en eaux souterraines. Ses travaux portent sur les aquifères côtiers du Sénégal, la vulnérabilité aux intrusions salines et la gestion durable des eaux souterraines en zones semi-arides.',
      tags: ['Eaux souterraines', 'Aquifères', 'Ressources hydriques', 'Modélisation'],
      gradient: 'linear-gradient(135deg, #0a2035, #0f2e52)'
    },
    'DIEYE Moumar': {
      initiales: 'DM', domain: 'Hydro/Géotechnique', domainColor: 'teal',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '🏗 Géotechnique',
      specIcon: 'bi-building-fill',
      bio: 'Géotechnicien spécialisé dans l\'étude des sols et des fondations en zone tropicale. Ses recherches portent sur les risques géotechniques, la stabilité des pentes et les techniques de renforcement des sols latéritiques en Afrique de l\'Ouest.',
      tags: ['Mécanique des sols', 'Fondations', 'Risques géotechniques', 'Sols tropicaux'],
      gradient: 'linear-gradient(135deg, #162440, #1f3868)'
    },
    'NIANG Magatte F.K': {
      initiales: 'NM', domain: 'Géosciences', domainColor: 'blue',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '💎 Minéralogie',
      specIcon: 'bi-gem',
      bio: 'Minéralogiste spécialisé dans la caractérisation des minéraux industriels et des ressources minières du Sénégal. Ses travaux portent sur les argiles, les phosphates et les minéraux lourds des placers côtiers de l\'Afrique de l\'Ouest.',
      tags: ['Minéraux industriels', 'Phosphates', 'Argiles', 'Minéraux lourds'],
      gradient: 'linear-gradient(135deg, #0d1e42, #1c3666)'
    },
    'NDIAYE Codou': {
      initiales: 'NC', domain: 'Géosciences', domainColor: 'blue',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '🪨 Sédimentologie',
      specIcon: 'bi-layers-fill',
      bio: 'Sédimentologue travaillant sur les environnements de dépôt et la stratigraphie séquentielle des bassins côtiers ouest-africains. Ses recherches contribuent à la compréhension de l\'évolution des deltas et des systèmes turbiditiques au large du Sénégal.',
      tags: ['Stratigraphie', 'Bassins côtiers', 'Sédimentologie marine', 'Deltas'],
      gradient: 'linear-gradient(135deg, #14325a, #1e4a82)'
    },
    'DIENE Mouhamadane': {
      initiales: 'DM', domain: 'Géosciences', domainColor: 'blue',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '📡 Géophysique',
      specIcon: 'bi-broadcast-pin',
      bio: 'Géophysicien expert en méthodes sismiques, électriques et magnétiques appliquées à l\'exploration minière et pétrolière. Ses recherches portent sur l\'imagerie du sous-sol par méthodes non-invasives et la caractérisation des réservoirs pétroliers.',
      tags: ['Sismique', 'Méthodes électriques', 'Exploration pétrolière', 'Imagerie'],
      gradient: 'linear-gradient(135deg, #1e2f52, #2d4a7a)'
    },
    'THIAM Mohamadou M.': {
      initiales: 'TM', domain: 'Technologies', domainColor: 'gold',
      role: 'Enseignant-Chercheur · ENSMG',
      spec: '⚙️ Géomatériaux',
      specIcon: 'bi-cpu-fill',
      bio: 'Spécialiste des matériaux géologiques utilisés dans la construction et l\'ingénierie civile. Ses travaux portent sur la valorisation des matériaux locaux (latérites, basaltes, argiles) pour des applications durables en génie civil en Afrique subsaharienne.',
      tags: ['Matériaux locaux', 'Génie civil', 'Latérites', 'Construction durable'],
      gradient: 'linear-gradient(135deg, #0b2844, #0f3d6e)'
    }
  };

  document.addEventListener('DOMContentLoaded', function () {
    var page = document.querySelector('.ens-page');
    if (!page) return;

    /* ── 1. Libérer le page-wrapper ── */
    var wrapper = document.querySelector('.page-wrapper');
    if (wrapper) { wrapper.style.padding = '0'; wrapper.style.maxWidth = '100%'; wrapper.style.margin = '0'; }

    /* ── 2. Scroll reveal ── */
    function checkReveal() {
      var threshold = window.innerHeight * 0.9;
      page.querySelectorAll('.ens-reveal:not(.ens-visible)').forEach(function (el) {
        if (el.getBoundingClientRect().top < threshold) {
          el.classList.add('ens-visible');
        }
      });
    }
    setTimeout(checkReveal, 150);
    window.addEventListener('scroll', checkReveal, { passive: true });
    window.addEventListener('resize', checkReveal, { passive: true });

    /* ── 3. Filtres domaine ── */
    var filterBtns = page.querySelectorAll('.ens-filter-btn');
    var cards = page.querySelectorAll('.ens-card');

    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var filter = btn.getAttribute('data-filter');
        filterBtns.forEach(function (b) { b.classList.remove('ens-filter-btn--active'); });
        btn.classList.add('ens-filter-btn--active');
        cards.forEach(function (card) {
          var domain = card.getAttribute('data-domain');
          if (filter === 'all' || domain === filter) {
            card.classList.remove('ens-hidden');
            card.classList.remove('ens-visible');
            setTimeout(function () { card.classList.add('ens-visible'); }, 50);
          } else {
            card.classList.add('ens-hidden');
          }
        });
      });
    });

    /* ── 4. Modal profil ── */
    var modal = document.getElementById('ens-modal');
    var modalClose = document.getElementById('ens-modal-close');

    function openModal(nom) {
      var data = enseignants[nom];
      if (!data) return;

      /* Remplir le modal */
      document.getElementById('ens-modal-avatar').textContent = data.initiales;
      document.getElementById('ens-modal-avatar').style.background = data.gradient;
      document.getElementById('ens-modal-domain').textContent = data.domain;
      document.getElementById('ens-modal-name').textContent = nom;
      document.getElementById('ens-modal-role').textContent = data.role;
      document.getElementById('ens-modal-bio').textContent = data.bio;

      /* Spécialité */
      var specEl = document.getElementById('ens-modal-spec');
      specEl.innerHTML = '<i class="bi ' + data.specIcon + '"></i> ' + data.spec;

      /* Tags */
      var tagsEl = document.getElementById('ens-modal-tags');
      tagsEl.innerHTML = data.tags.map(function (t) {
        return '<span class="ens-modal-tag"><i class="bi bi-tag-fill"></i>' + t + '</span>';
      }).join('');

      modal.classList.add('ens-modal--open');
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      modal.classList.remove('ens-modal--open');
      document.body.style.overflow = '';
    }

    /* Mapping nom → URL profil Drupal */
    var profilUrls = {
      'DIENE Mouhamadane':    '/ecole/enseignants/diene-mouhamadane',
      'DIONE Adama':          '/ecole/enseignants/dione-adama',
      'THIAM Mohamadou M.':   '/ecole/enseignants/thiam-mohamadou',
      'NDIAYE Abdoul Aziz':   '/ecole/enseignants/ndiaye-abdoul-aziz',
      'FAYE Cheikh Ibrahima': '/ecole/enseignants/faye-cheikh-ibrahima',
      'DIEYE Moumar':         '/ecole/enseignants/dieye-moumar',
      'NDIAYE Codou':         '/ecole/enseignants/ndiaye-codou',
      'GBAGUIDI Ignace André':'/ecole/enseignants/gbaguidi-ignace',
      'FAYE Gayane':          '/ecole/enseignants/faye-gayane',
      'NDIAYE Matar':         '/ecole/enseignants/ndiaye-matar',
      'NIANG Magatte F.K':    '/ecole/enseignants/niang-magatte',
      'NIANG Magatte F.K.':   '/ecole/enseignants/niang-magatte',
    };

    /* Clic sur bouton Profil → navigation vers page dédiée */
    page.querySelectorAll('.ens-btn-profil').forEach(function (btn) {
      btn.addEventListener('click', function (e) {
        e.stopPropagation();
        var card = btn.closest('.ens-card, .ens-director-card');
        var nomEl = card.querySelector('.ens-card-name, .ens-director-name');
        var nom = nomEl ? nomEl.textContent.trim() : '';
        var url = profilUrls[nom];
        if (url) { window.location.href = url; }
        else { openModal(nom); } // fallback modal si pas de page
      });
    });

    /* Fermeture */
    modalClose.addEventListener('click', closeModal);
    modal.addEventListener('click', function (e) {
      if (e.target === modal) closeModal();
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeModal();
    });

  });
})();
