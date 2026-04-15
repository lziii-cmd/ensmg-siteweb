/**
 * ENSMG — Gouvernance — Layout fix + scroll reveal robuste
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    var page = document.querySelector('.gov-page');
    if (!page) return;

    /* ── 1. Supprimer la page-title-banner standard ── */
    var banner = document.querySelector('.page-title-banner');
    if (banner) banner.style.display = 'none';

    /* ── 2. Libérer le page-wrapper de ses contraintes ── */
    var wrapper = document.querySelector('.page-wrapper');
    if (wrapper) {
      wrapper.style.padding = '0';
      wrapper.style.maxWidth = '100%';
      wrapper.style.margin = '0';
    }
    var content = document.querySelector('.page-content');
    if (content) content.style.overflow = 'hidden';

    /* ── 3. Hero : animations CSS pures, pas besoin de JS ── */

    /* ── 4. Scroll reveal — fonction de vérification ── */
    function checkReveal() {
      var threshold = window.innerHeight * 0.88;
      page.querySelectorAll(
        '.gov-reveal:not(.gov-visible), .gov-org-card:not(.gov-visible), .gov-tutelle-card:not(.gov-visible)'
      ).forEach(function (el) {
        var rect = el.getBoundingClientRect();
        if (rect.top < threshold) {
          el.classList.add('gov-visible');
        }
      });
    }

    /* Vérification initiale (éléments déjà visibles au chargement) */
    setTimeout(checkReveal, 200);

    /* Vérification au scroll */
    window.addEventListener('scroll', checkReveal, { passive: true });
    /* Vérification au resize */
    window.addEventListener('resize', checkReveal, { passive: true });
  });

})();
