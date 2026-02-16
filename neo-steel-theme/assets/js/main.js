/**
 * NEO STEEL Main JavaScript
 * Handles general functionality, mobile menu, sliders, and animations
 */

(function($) {
    'use strict';

    // Document Ready
    $(document).ready(function() {
        // Initialize all functions
        initMobileMenu();
        initSmoothScroll();
        initCounterAnimation();
        initTestimonialSlider();
        initProjectFilters();
        initScrollAnimations();
        initStickyHeader();
        initBackToTop();
    });

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        $('.mobile-menu-toggle').on('click', function() {
            var $nav = $('.main-navigation');
            var isExpanded = $(this).attr('aria-expanded') === 'true';
            
            $nav.toggleClass('active');
            $(this).attr('aria-expanded', !isExpanded);
            
            // Toggle icon
            var $icon = $(this).find('i');
            if ($icon.hasClass('fa-bars')) {
                $icon.removeClass('fa-bars').addClass('fa-times');
            } else {
                $icon.removeClass('fa-times').addClass('fa-bars');
            }
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length) {
                $('.main-navigation').removeClass('active');
                $('.mobile-menu-toggle').attr('aria-expanded', 'false');
                $('.mobile-menu-toggle i').removeClass('fa-times').addClass('fa-bars');
            }
        });

        // Close mobile menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('.main-navigation').removeClass('active');
                $('.mobile-menu-toggle').attr('aria-expanded', 'false');
                $('.mobile-menu-toggle i').removeClass('fa-times').addClass('fa-bars');
            }
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname) {
                
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 800, function() {
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(':focus')) {
                            return false;
                        } else {
                            $target.attr('tabindex', '-1');
                            $target.focus();
                        }
                    });
                }
            }
        });
    }

    /**
     * Counter Animation for Stats
     */
    function initCounterAnimation() {
        var hasAnimated = false;
        
        function animateCounters() {
            if (hasAnimated) return;
            
            $('.stat-number').each(function() {
                var $this = $(this);
                var target = parseInt($this.data('target'));
                
                if (target) {
                    $({ Counter: 0 }).animate({ Counter: target }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.ceil(this.Counter));
                        },
                        complete: function() {
                            $this.text(target);
                        }
                    });
                }
            });
            
            hasAnimated = true;
        }

        // Trigger animation when stats section is in view
        $(window).on('scroll', function() {
            var $stats = $('.stat-number').first();
            if ($stats.length) {
                var statsOffset = $stats.offset().top;
                var windowBottom = $(window).scrollTop() + $(window).height();
                
                if (windowBottom > statsOffset) {
                    animateCounters();
                }
            }
        });
    }

    /**
     * Testimonial Slider
     */
    function initTestimonialSlider() {
        if ($('.testimonials-slider').length === 0) return;

        var currentSlide = 0;
        var $slides = $('.testimonial-item');
        var slideCount = $slides.length;
        var autoplayInterval;

        if (slideCount <= 1) return;

        // Create dots
        var dotsHtml = '';
        for (var i = 0; i < slideCount; i++) {
            dotsHtml += '<span class="dot' + (i === 0 ? ' active' : '') + '"></span>';
        }
        $('.testimonials-dots').html(dotsHtml);

        function showSlide(index) {
            if (index < 0) index = slideCount - 1;
            if (index >= slideCount) index = 0;

            $slides.hide().eq(index).fadeIn(500);
            $('.dot').removeClass('active').eq(index).addClass('active');
            currentSlide = index;
        }

        function nextSlide() {
            showSlide(currentSlide + 1);
        }

        function prevSlide() {
            showSlide(currentSlide - 1);
        }

        function startAutoplay() {
            autoplayInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoplay() {
            clearInterval(autoplayInterval);
        }

        // Event handlers
        $('.testimonial-next').on('click', function() {
            stopAutoplay();
            nextSlide();
            startAutoplay();
        });

        $('.testimonial-prev').on('click', function() {
            stopAutoplay();
            prevSlide();
            startAutoplay();
        });

        $('.testimonials-dots').on('click', '.dot', function() {
            stopAutoplay();
            showSlide($(this).index());
            startAutoplay();
        });

        // Initialize
        showSlide(0);
        startAutoplay();

        // Pause on hover
        $('.testimonials-slider').hover(stopAutoplay, startAutoplay);
    }

    /**
     * Project Filters
     */
    function initProjectFilters() {
        $('.filter-btn').on('click', function() {
            var filterValue = $(this).data('filter');
            
            $('.filter-btn').removeClass('active');
            $(this).addClass('active');

            if (filterValue === '*') {
                $('.project-item').fadeIn(300);
            } else {
                $('.project-item').hide();
                $('.project-item' + filterValue).fadeIn(300);
            }
        });
    }

    /**
     * Scroll Animations
     */
    function initScrollAnimations() {
        function checkScroll() {
            $('.service-item, .project-item, .feature-item, .value-item').each(function() {
                var $this = $(this);
                var elementTop = $this.offset().top;
                var windowBottom = $(window).scrollTop() + $(window).height();
                
                if (windowBottom > elementTop + 100) {
                    $this.addClass('animate-in');
                }
            });
        }

        // Add CSS for animation
        $('<style>')
            .prop('type', 'text/css')
            .html('.animate-in { animation: fadeInUp 0.6s ease-out; }' +
                  '@keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }')
            .appendTo('head');

        $(window).on('scroll', checkScroll);
        checkScroll(); // Initial check
    }

    /**
     * Sticky Header on Scroll
     */
    function initStickyHeader() {
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 100) {
                $('.site-header').addClass('scrolled');
            } else {
                $('.site-header').removeClass('scrolled');
            }
        });
    }

    /**
     * Back to Top Button
     */
    function initBackToTop() {
        // Create back to top button
        $('<div class="back-to-top" title="Back to Top"><i class="fas fa-chevron-up"></i></div>')
            .appendTo('body')
            .hide();

        // Add CSS for back to top button
        $('<style>')
            .prop('type', 'text/css')
            .html('.back-to-top { position: fixed; bottom: 30px; right: 30px; width: 50px; height: 50px; ' +
                  'background: #4a6fa5; color: #fff; border-radius: 50%; display: flex; align-items: center; ' +
                  'justify-content: center; cursor: pointer; z-index: 999; transition: all 0.3s ease; } ' +
                  '.back-to-top:hover { background: #b8860b; transform: translateY(-5px); } ' +
                  '.back-to-top i { font-size: 1.25rem; }')
            .appendTo('head');

        // Show/hide button on scroll
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                $('.back-to-top').fadeIn();
            } else {
                $('.back-to-top').fadeOut();
            }
        });

        // Scroll to top on click
        $('.back-to-top').on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 800);
        });
    }

    /**
     * Lazy Load Images (Simple Implementation)
     */
    function initLazyLoad() {
        $('img[data-src]').each(function() {
            var $img = $(this);
            var src = $img.data('src');
            
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        $img.attr('src', src);
                        $img.removeAttr('data-src');
                        observer.disconnect();
                    }
                });
            });
            
            observer.observe($img[0]);
        });
    }

    // Initialize lazy load if supported
    if ('IntersectionObserver' in window) {
        initLazyLoad();
    }

})(jQuery);
