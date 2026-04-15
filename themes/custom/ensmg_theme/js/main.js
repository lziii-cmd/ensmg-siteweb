/**
 * ENSMG Theme — Main JavaScript
 * Bleu Marine & Or — UCAD Dakar
 */
(function ($, Drupal, once) {
  'use strict';

  /**
   * Mobile navigation toggle
   */
  Drupal.behaviors.ensmgMobileNav = {
    attach: function (context) {
      once('ensmg-nav', '.nav-toggle', context).forEach(function (toggle) {
        toggle.addEventListener('click', function () {
          var nav = document.querySelector('.site-nav');
          var isOpen = nav.classList.toggle('is-open');
          toggle.setAttribute('aria-expanded', isOpen);
          document.body.style.overflow = isOpen ? 'hidden' : '';
        });
      });

      // Close nav when clicking outside
      document.addEventListener('click', function (e) {
        var nav = document.querySelector('.site-nav');
        var toggle = document.querySelector('.nav-toggle');
        if (nav && nav.classList.contains('is-open')) {
          if (!nav.contains(e.target) && !toggle.contains(e.target)) {
            nav.classList.remove('is-open');
            document.body.style.overflow = '';
            if (toggle) toggle.setAttribute('aria-expanded', 'false');
          }
        }
      });

      // Close nav on resize
      window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
          var nav = document.querySelector('.site-nav');
          if (nav) nav.classList.remove('is-open');
          document.body.style.overflow = '';
        }
      });
    }
  };

  /**
   * Smooth scroll for anchor links
   */
  Drupal.behaviors.ensmgSmoothScroll = {
    attach: function (context) {
      once('ensmg-scroll', 'a[href^="#"]:not([href="#"])', context).forEach(function (link) {
        link.addEventListener('click', function (e) {
          var target = document.querySelector(this.getAttribute('href'));
          if (target) {
            e.preventDefault();
            var offset = 80;
            var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
            window.scrollTo({ top: top, behavior: 'smooth' });
          }
        });
      });
    }
  };

  /**
   * Add has-children class to nav items with dropdowns
   */
  Drupal.behaviors.ensmgNavDropdown = {
    attach: function (context) {
      once('ensmg-dropdown', '.site-nav > ul > li', context).forEach(function (li) {
        if (li.querySelector('ul')) {
          li.classList.add('has-children');
        }
      });
    }
  };

  /**
   * Fade-in on scroll (Intersection Observer)
   */
  Drupal.behaviors.ensmgFadeIn = {
    attach: function (context) {
      if (!('IntersectionObserver' in window)) return;

      var options = { threshold: 0.1, rootMargin: '0px 0px -50px 0px' };
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('fade-in-up');
            observer.unobserve(entry.target);
          }
        });
      }, options);

      once('ensmg-fadein', '.card-ensmg, .feature-box, .person-card, .program-card, .lab-card, .news-item', context).forEach(function (el) {
        el.style.opacity = '0';
        observer.observe(el);
      });
    }
  };

  /**
   * Counter animation for stats
   */
  Drupal.behaviors.ensmgCounters = {
    attach: function (context) {
      if (!('IntersectionObserver' in window)) return;

      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            var el = entry.target;
            var target = parseInt(el.dataset.count || el.textContent, 10);
            if (isNaN(target)) return;
            var start = 0;
            var duration = 1800;
            var step = target / (duration / 16);
            var timer = setInterval(function () {
              start += step;
              if (start >= target) {
                el.textContent = target + (el.dataset.suffix || '');
                clearInterval(timer);
              } else {
                el.textContent = Math.floor(start) + (el.dataset.suffix || '');
              }
            }, 16);
            observer.unobserve(el);
          }
        });
      }, { threshold: 0.3 });

      once('ensmg-counter', '.stat-number[data-count]', context).forEach(function (el) {
        observer.observe(el);
      });
    }
  };

  /**
   * Reveal on scroll — progressive enhancement
   * Adds .will-animate first (makes invisible), then .visible on intersection
   */
  Drupal.behaviors.ensmgReveal = {
    attach: function (context) {
      if (!('IntersectionObserver' in window)) return; // leave visible

      var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });

      once('ensmg-reveal', '.reveal, .reveal-left, .reveal-right, .reveal-stagger', context).forEach(function (el) {
        // Only animate if element is BELOW the fold on page load
        var rect = el.getBoundingClientRect();
        if (rect.top > window.innerHeight * 0.95) {
          el.classList.add('will-animate');
        }
        obs.observe(el);
      });
    }
  };

  /**
   * Accordéon pages — transforme H2 + contenu suivant en panels numérotés
   * S'active uniquement si .inner-article-body--accordion est présent
   */
  Drupal.behaviors.ensmgAccordion = {
    attach: function (context) {
      once('ensmg-accordion', '.inner-article-body--accordion .node__content', context).forEach(function (container) {

        // Trouver le vrai parent des H2 (peut être un <div> imbriqué dans .node__content)
        var h2s = container.querySelectorAll('h2');
        if (h2s.length === 0) return;

        // Le parent direct des H2 (souvent <div class="field__item"> ou <div>)
        var contentParent = h2s[0].parentNode;

        // Récupérer TOUS les enfants directs du parent sous forme de tableau
        var children = Array.from(contentParent.childNodes);

        // Grouper les enfants par section (chaque H2 démarre un groupe)
        var groups = [];
        var current = null;

        children.forEach(function (node) {
          if (node.nodeType === 1 && node.tagName === 'H2') {
            current = { title: node.textContent.trim(), nodes: [] };
            groups.push(current);
          } else if (current) {
            // Ignorer les nœuds texte purement vides
            if (node.nodeType === 3 && !node.textContent.trim()) return;
            current.nodes.push(node.cloneNode(true));
          }
        });

        if (groups.length === 0) return;

        // Construire l'accordéon
        var accordion = document.createElement('div');
        accordion.className = 'page-accordion';

        groups.forEach(function (group, index) {
          var num = String(index + 1).padStart(2, '0');
          var isFirst = index === 0;

          var panel = document.createElement('div');
          panel.className = 'accordion-panel' + (isFirst ? ' is-open' : '');

          var header = document.createElement('button');
          header.type = 'button';
          header.className = 'accordion-header';
          header.innerHTML =
            '<span class="acc-num">' + num + '</span>' +
            '<span class="acc-title">' + group.title + '</span>' +
            '<span class="acc-toggle"><i class="bi bi-' + (isFirst ? 'dash' : 'plus') + '-lg"></i></span>';

          var body = document.createElement('div');
          body.className = 'accordion-body';
          group.nodes.forEach(function (n) { body.appendChild(n); });

          panel.appendChild(header);
          panel.appendChild(body);
          accordion.appendChild(panel);
        });

        // Remplacer le contenu du parent (pas de container pour éviter les wrappers Drupal)
        contentParent.innerHTML = '';
        contentParent.appendChild(accordion);

        // Toggle click
        accordion.addEventListener('click', function (e) {
          var btn = e.target.closest('.accordion-header');
          if (!btn) return;
          var panel = btn.closest('.accordion-panel');
          var isOpen = panel.classList.contains('is-open');

          accordion.querySelectorAll('.accordion-panel').forEach(function (p) {
            p.classList.remove('is-open');
            var ic = p.querySelector('.acc-toggle i');
            if (ic) ic.className = 'bi bi-plus-lg';
          });

          if (!isOpen) {
            panel.classList.add('is-open');
            var ic = panel.querySelector('.acc-toggle i');
            if (ic) ic.className = 'bi bi-dash-lg';
          }
        });
      });
    }
  };

  /**
   * Reading progress bar for inner pages
   */
  Drupal.behaviors.ensmgReadingProgress = {
    attach: function (context) {
      var bar = document.getElementById('readingProgress');
      if (!bar) return;
      once('ensmg-progress', bar, context).forEach(function () {
        window.addEventListener('scroll', function () {
          var docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
          var scrolled  = (window.scrollY / docHeight) * 100;
          bar.style.width = Math.min(scrolled, 100) + '%';
        }, { passive: true });
      });
    }
  };

  /**
   * Compteurs animés page Vocation & Ambition (.va-stat-number)
   */
  Drupal.behaviors.ensmgVaCounters = {
    attach: function (context) {
      if (!('IntersectionObserver' in window)) return;
      var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          var el = entry.target;
          var target = parseInt(el.dataset.count, 10);
          var suffix = el.dataset.suffix || '';
          if (isNaN(target)) return;
          var start = 0;
          var duration = 1600;
          var step = target / (duration / 16);
          var timer = setInterval(function () {
            start += step;
            if (start >= target) {
              el.textContent = target + suffix;
              clearInterval(timer);
            } else {
              el.textContent = Math.floor(start) + suffix;
            }
          }, 16);
          obs.unobserve(el);
        });
      }, { threshold: 0.5 });
      once('va-counters', '.va-stat-number[data-count]', context).forEach(function (el) {
        obs.observe(el);
      });
    }
  };

  /**
   * Sidebar stat counters (inner page)
   */
  Drupal.behaviors.ensmgSidebarCounters = {
    attach: function (context) {
      if (!('IntersectionObserver' in window)) return;
      var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          var el = entry.target;
          var target = parseInt(el.dataset.target, 10);
          if (isNaN(target)) return;
          var start = 0;
          var duration = 1400;
          var step = target / (duration / 16);
          var timer = setInterval(function () {
            start += step;
            if (start >= target) { el.textContent = target; clearInterval(timer); }
            else { el.textContent = Math.floor(start); }
          }, 16);
          obs.unobserve(el);
        });
      }, { threshold: 0.4 });
      once('sidebar-counters', '.sidebar-stat-number[data-target]', context).forEach(function (el) {
        el.textContent = '0';
        obs.observe(el);
      });
    }
  };

  /**
   * Active nav item highlight
   */
  Drupal.behaviors.ensmgActiveNav = {
    attach: function (context) {
      var path = window.location.pathname;
      once('ensmg-active', '.site-nav a', context).forEach(function (link) {
        var href = link.getAttribute('href');
        if (href && href !== '/' && path.indexOf(href) === 0) {
          link.closest('li').classList.add('is-active');
          var parent = link.closest('li').parentNode.closest('li');
          if (parent) parent.classList.add('active-trail');
        }
      });
    }
  };

})(jQuery, Drupal, once);
