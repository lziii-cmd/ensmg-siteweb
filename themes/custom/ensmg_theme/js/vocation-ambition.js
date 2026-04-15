/**
 * ENSMG — Vocation & Ambition — JS premium
 * Counter animation + scroll reveal + reading progress
 */
(function () {
  'use strict';

  /* ── Supprimer la page-title-banner et libérer le wrapper ── */
  function initLayoutFix() {
    if (!document.querySelector('.va-page')) return;
    var banner = document.querySelector('.page-title-banner');
    if (banner) banner.style.display = 'none';
    var wrapper = document.querySelector('.page-wrapper');
    if (wrapper) { wrapper.style.padding = '0'; wrapper.style.maxWidth = '100%'; }
    /* Reveal héro immédiat */
    document.querySelectorAll('.va-hero .va-reveal').forEach(function (el, i) {
      setTimeout(function () { el.classList.add('va-visible'); }, 80 + i * 110);
    });
  }

  /* ── Reading progress bar ── */
  function initReadingProgress() {
    var bar = document.getElementById('readingProgress');
    if (!bar) return;
    window.addEventListener('scroll', function () {
      var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
      var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      bar.style.width = (height > 0 ? (scrollTop / height) * 100 : 0) + '%';
    }, { passive: true });
  }

  /* ── Counter animation ── */
  function animateCounter(el) {
    var target  = parseInt(el.getAttribute('data-count'), 10);
    var suffix  = el.getAttribute('data-suffix') || '';
    var duration = 1800;
    var start = null;
    function easeOut(t) { return 1 - Math.pow(1 - t, 3); }
    function step(ts) {
      if (!start) start = ts;
      var progress = Math.min((ts - start) / duration, 1);
      el.textContent = Math.floor(easeOut(progress) * target) + suffix;
      if (progress < 1) requestAnimationFrame(step);
    }
    requestAnimationFrame(step);
  }

  /* ── Scroll reveal ── */
  function initScrollReveal() {
    var selector = '.va-reveal:not(.va-visible), .va-stat-card:not(.va-visible), ' +
      '.va-ambition-card:not(.va-visible), .va-tl-item:not(.va-visible), .va-vision-obj:not(.va-visible)';

    /* Délais initiaux */
    document.querySelectorAll(
      '.va-reveal, .va-stat-card, .va-ambition-card, .va-tl-item, .va-vision-obj'
    ).forEach(function (el, i) {
      el.style.transitionDelay = (i % 4) * 0.09 + 's';
    });

    function checkReveal() {
      var threshold = window.innerHeight * 0.9;
      document.querySelectorAll(selector).forEach(function (el) {
        if (el.getBoundingClientRect().top < threshold) {
          el.classList.add('va-visible');
        }
      });
    }

    setTimeout(checkReveal, 150);
    window.addEventListener('scroll', checkReveal, { passive: true });
    window.addEventListener('resize', checkReveal, { passive: true });
  }

  /* ── Animated counters (triggered once visible) ── */
  function initCounters() {
    var counters = document.querySelectorAll('.va-stat-number[data-count]');
    if (!counters.length) return;

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    counters.forEach(function (el) { io.observe(el); });
  }

  /* ── Floating shapes parallax (hero) ── */
  function initParallax() {
    var shapes = document.querySelectorAll('.va-hero-shape');
    if (!shapes.length) return;
    window.addEventListener('scroll', function () {
      var sy = window.scrollY;
      shapes.forEach(function (s, i) {
        var speed = (i % 2 === 0) ? 0.12 : 0.07;
        s.style.transform = 'translateY(' + (sy * speed) + 'px)';
      });
    }, { passive: true });
  }

  /* ── Init ── */
  document.addEventListener('DOMContentLoaded', function () {
    initLayoutFix();
    initReadingProgress();
    initScrollReveal();
    initCounters();
    initParallax();
  });

})();
