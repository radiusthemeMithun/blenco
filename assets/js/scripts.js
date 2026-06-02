;(function ($) {

	'use strict';

	$('a[href=\\#]').on('click', function (e) {
		e.preventDefault();
	})

	var Blenco = {

		_init: function () {

			var offCanvas = {
				menuBar: $('.trigger-off-canvas'),
				drawer: $('.blenco-offcanvas-drawer'),
				drawerClass: '.blenco-offcanvas-drawer',
				menuDropdown: $('.dropdown-menu.depth_0'),
			};

			Blenco.menuDrawerOpen(offCanvas);
			Blenco.offcanvasMenuToggle(offCanvas);
			Blenco.headerSearchOpen();
			Blenco.backToTop();
			Blenco.counterUp();
			Blenco.preLoader();
			Blenco.menuOffset();
			Blenco.AjaxSearch();
			Blenco.headRoom();
			Blenco.wow();
			Blenco.rtElementorParallax();
			Blenco.magnificPopup();
			Blenco.imageFunction();
			Blenco.rtIsotope();
			Blenco.rtMasonary();
			Blenco.swiperSlider($);
			Blenco.heroSlider();
			Blenco.ProgressBar();
			Blenco.ImgcolumnList();
			Blenco.rtgsap();
			Blenco.rtScrollTrigger();
			Blenco.rtSlicerEffect();
			Blenco.rtPortfolioSlider();
		},

		rtgsap: function() {
			if (typeof gsap === "undefined") return;
			gsap.registerPlugin(ScrollTrigger, ScrollSmoother, SplitText);
			gsap.config({ nullTargetWarn: false });

			let mm = gsap.matchMedia();

			// ScrollSmoother — must be created BEFORE any ScrollTrigger.
			mm.add("(min-width: 768px)", () => {
				if (!document.querySelector("#rt_smooth")?.classList.contains("rt-smooth")) return;

				const smoother = ScrollSmoother.create({
					wrapper: "#smooth-wrapper",
					content: "#smooth-content",
					smooth: 1.5,
					effects: true,
					smoothTouch: false,
					normalizeScroll: true,
					ignoreMobileResize: true,
				});

				return () => smoother.kill();
			});

			// Background Reveal Animation
			gsap.utils.toArray('.bg-reveal-section').forEach((el) => {
				let tl = gsap.timeline({
					scrollTrigger: {
						trigger: el,
						scrub: 2,
						start: "top 50%",
						end: "top 70%",
						toggleActions: "play none none reverse",
						markers: false,
					}
				});

				tl.set(el, { transformOrigin: "center center" })
					.fromTo(el,
						{ opacity: 1, width: "30%", borderRadius: 20 },
						{ opacity: 1, width: "100%", borderRadius: 20, duration: 2 }
					);
			});

			// RT Text Title Animation (SplitText Fix - Point 1)
			if ($('.rt-text-title').length > 0) {
				gsap.utils.toArray(".rt-text-title").forEach(splitTextLine => {
					const itemSplitted = new SplitText(splitTextLine, { type: "chars, words" });

					gsap.set(splitTextLine, { perspective: 300 });

					gsap.from(itemSplitted.chars, {
						scrollTrigger: {
							trigger: splitTextLine,
							start: 'top 90%',
							end: 'bottom 60%',
							toggleActions: 'play none none none'
						},
						duration: 1,
						delay: 0.5,
						x: 100,
						autoAlpha: 0,
						stagger: 0.05
					});
				});
			}

			// Window Load Animations
			window.addEventListener("load", () => {
				// Text Flip Animation
				if ($(".text-flip-anim").length > 0) {
					gsap.utils.toArray(".text-flip-anim").forEach((splitTextLine) => {
						const itemSplitted = new SplitText(splitTextLine, { type: "lines" });

						gsap.set(splitTextLine, { perspective: 400 });

						gsap.from(itemSplitted.lines, {
							scrollTrigger: {
								trigger: splitTextLine,
								start: "top 90%",
								end: "bottom 60%",
								toggleActions: "play none none reverse",
							},
							duration: 1,
							delay: 0.3,
							opacity: 0,
							rotationX: -80,
							force3D: true,
							transformOrigin: "top center -50",
							stagger: 0.2,
						});
					});
				}

				setTimeout(() => {
					ScrollTrigger.refresh();
				}, 200);
			});

			// Debounced resize refresh: matchMedia handles breakpoint swaps, but
			// in-breakpoint height changes (lazy images, font swap, address bar)
			// desync pins/effects — recompute once the resize settles.
			let rtResizeTimer;
			window.addEventListener("resize", () => {
				clearTimeout(rtResizeTimer);
				rtResizeTimer = setTimeout(() => {
					ScrollTrigger.refresh();
				}, 250);
			});

			// Responsive Animations with matchMedia (Point 3)
			mm.add({
				isDesktop: "(min-width: 1200px)",
				isTablet: "(min-width: 768px)",
				isMobile: "(max-width: 767px)"
			}, (context) => {
				let { isDesktop, isTablet } = context.conditions;

				// Desktop Specific: Panel Pinning
				if (isDesktop) {
					let panels = document.querySelectorAll('.rt-panel-pin');
					let wrap = document.querySelector('.rt-panel-pin-wrap');
					let title = document.querySelector('.rt-sticky-title');

					if (title && wrap) {
						ScrollTrigger.create({
							trigger: wrap,
							start: "top 100px",
							end: "bottom bottom",
							pin: title,
							pinSpacing: false,
							invalidateOnRefresh: true,
							anticipatePin: 1
						});
					}

					panels.forEach((section, index) => {
						ScrollTrigger.create({
							trigger: section,
							pin: true,
							start: "top 100px",
							end: () => `+=${section.offsetHeight * (panels.length - index)}`,
							pinSpacing: false,
							invalidateOnRefresh: true,
						});
					});

					// Horizontal Scroll
					if ($('.rt-project-fun-wrap').length) {
						let sections = gsap.utils.toArray(".rt-funfact-panel");
						gsap.to(sections, {
							xPercent: -100 * (sections.length - 2),
							ease: "none",
							scrollTrigger: {
								trigger: ".rt-project-fun-wrap",
								start: "top 70px",
								pin: true,
								scrub: 1,
								end: () => "+=" + document.querySelector(".rt-project-fun-wrap").offsetWidth
							}
						});
					}
				}

				// Tablet & Above: Project Panel Scale
				if (isTablet) {
					document.querySelectorAll('.rt-project-panel').forEach((section) => {
						gsap.to(section, {
							scale: 0.8,
							scrollTrigger: {
								trigger: section,
								pin: section,
								scrub: 1,
								start: 'top 100px',
								end: "bottom 60%",
								endTrigger: '.rt-project-pin',
								pinSpacing: false,
							},
						});
					});
				}
			});

			// Project Grid Layout 1
			if (document.querySelector('.project-grid-layout-1')) {
				mm.add("(min-width: 991px)", () => {
					document.querySelectorAll('.project-grid-layout-1').forEach(grid => {
						if (grid.getAttribute('data-rt-animate') !== 'yes') return;

						gsap.set(grid.querySelectorAll('.odd .project-thumbs'), { x: 500, rotate: 10 });
						gsap.set(grid.querySelectorAll('.even .project-thumbs'), { x: -500, rotate: -10 });

						let tl = gsap.timeline({
							scrollTrigger: {
								trigger: grid,
								start: 'top 100%',
								end: 'bottom center',
								scrub: 1.1,
							}
						});

						tl.to(grid.querySelectorAll('.odd .project-thumbs'), { x: 0, rotate: 0 }, 0)
							.to(grid.querySelectorAll('.even .project-thumbs'), { x: 0, rotate: 0 }, 0);
					});
				});
			}

			// Rotate Animation
			gsap.utils.toArray(".rt-image-rotate").forEach(element => {
				const animTime = parseFloat(element.getAttribute("ty-anim-time")) || 1;
				gsap.to(element, {
					rotation: 360,
					ease: "none",
					duration: animTime,
					scrollTrigger: {
						trigger: element,
						start: "top 90%",
						end: "bottom top",
						scrub: true,
					},
				});
			});
		},

		rtScrollTrigger: function(){
			window.addEventListener('load', () => {
				ScrollTrigger.refresh();
			});
		},

		// headRoom js
		headRoom: function () {
			if ($('body').hasClass('has-sticky-header')) {
				var myElement = document.querySelector(".headroom");
				var headroom = new Headroom(myElement);
				headroom.init();

				$(window).on('scroll', function () {
					var height = $(window).scrollTop();
					if (height < 86) {
						$('.site-header').removeClass('scrolling');
					} else {
						$('.site-header').addClass('scrolling');
					}
				});

				var intHeight = $('.headroom')[0].getBoundingClientRect().height;
				$('.fixed-header-space').height(intHeight);
			}
		},

		rtSlicerEffect: function () {
			const slicerEl = document.querySelectorAll(".rt-slicer");

			if (slicerEl.length > 0) {
				let portfolio5_activ = new Swiper(".slicer-active", {
					modules: [EffectSlicer],
					effect: "slicer",
					loop: true,
					slicerEffect: {
						split: 5,
					},
					direction: "vertical",
					speed: 600,
					mousewheel: {
						releaseOnEdges: true,
					},
					navigation: {
						prevEl: ".portfolio-5__slider__arrow-prev",
						nextEl: ".portfolio-5__slider__arrow-next",
					},
					pagination: {
						el: ".rt-slicer-pagination",
						clickable: true,
					},
					on: {
						slideChange: function () {
							const bullets = this.pagination.bullets;
							const currentIndex = this.realIndex;

							if (bullets && bullets.length > 0) {
								bullets.forEach((bullet, index) => {
									if (index <= currentIndex) {
										bullet.classList.add("swiper-pagination-bullet-active");
									} else {
										bullet.classList.remove("swiper-pagination-bullet-active");
									}
								});
							}
						},
					},
				});
			}
		},

		rtPortfolioSlider: function() {
			$('.rt-port-slider-title').on("mouseenter", function () {
				$('#rt-port-slider-wrap').removeClass().addClass($(this).attr('rel'));
				$(this).addClass('active').siblings().removeClass('active');
			});
		},

		ImgcolumnList: function(){
			$(document).ready(function(){
				$(".image-column [data-list-img]:first").addClass("active");
				$(".list-item:first .list-title").addClass("active");

				$(".list-item").hover(function () {
					var t = $(this).attr("data-list-hover");
					$(".image-column [data-list-img]").removeClass("active");
					$(".list-item .list-title").removeClass("active");
					$('.image-column [data-list-img="' + t + '"]').addClass("active");
					$(this).find(".list-title").addClass("active");
				});
			});
		},

		rtElementorParallax: function () {
			if ($(".rt-parallax-bg-yes").length) {
				$(".rt-parallax-bg-yes").each(function () {
					var speed = $(this).data('speed');
					$(this).parallaxie({
						speed: speed ? speed : 0.5,
						offset: 0,
					});
				})
			}
		},

		magnificPopup: function (){
			var yPopup = $(".popup-youtube");
			if (yPopup.length) {
				yPopup.magnificPopup({
					disableOn: 700,
					type: 'iframe',
					mainClass: 'mfp-fade',
					removalDelay: 160,
					preloader: false,
					fixedContentPos: false
				});
			}
		},

		imageFunction: function () {

			$("[data-background], [data-bg-color]").each(function () {

				// For background image
				if ($(this).attr("data-background")) {
					$(this).css(
						"background-image",
						"url(" + $(this).attr("data-background") + ")"
					);
				}

				// For background color
				if ($(this).attr("data-bg-color")) {
					$(this).css(
						"background-color",
						$(this).attr("data-bg-color")
					);
				}
			});
		},

		wow: function () {
			var wow = new WOW({
				boxClass: 'wow',
				animateClass: 'animated',
				offset: 0,
				mobile: false,
				live: true,
				scrollContainer: null,
			});
			wow.init();
		},

		// Ajax search 1
		AjaxSearch: function () {
			const $searchInput = $('#searchInput');
			const $results = $('#rt_datafetch');
			let searchTimeout;

			if (!$searchInput.length) return;

			$searchInput.on('keyup', function () {
				const keyword = $(this).val();

				// টাইপিং থামা পর্যন্ত অপেক্ষা করবে (৩০০ মিলিসেকেন্ড)
				clearTimeout(searchTimeout);
				searchTimeout = setTimeout(() => {
					if (keyword.length < 3) {
						$results.html("<span class='letters'>Minimum 3 characters</span>");
						return;
					}

					$.ajax({
						url: blencoObj.ajaxURL,
						type: 'post',
						data: {
							action: 'rt_data_fetch',
							security: blencoObj.blencoNonce,
							keyword: keyword,
						},
						beforeSend: function() {
							$results.html("Searching...");
						},
						success: function (data) {
							$results.html(data);
						}
					});
				}, 300);
			});
		},

		menuOffset: function () {
			$(".dropdown-menu > li").each(function () {
				var $this = $(this),
					$win = $(window);

				if ($this.offset().left + ($this.width() + 30) > $win.width() + $win.scrollLeft() - $this.width()) {
					$this.addClass("dropdown-inverse");
				} else if ($this.offset().left < ($this.width() + 30)) {
					$this.addClass("dropdown-inverse-left");
				} else {
					$this.removeClass("dropdown-inverse");
				}
			});
		},

		rtIsotope: function () {
			if (typeof $.fn.isotope == 'function') {
				var $parent = $('.rt-isotope-wrapper'),
					$isotope;
				var blogGallerIso = $(".rt-isotope-content", $parent).imagesLoaded(function () {
					$isotope = $(".rt-isotope-content", $parent).isotope({
						filter: "*",
						transitionDuration: "1s",
						hiddenStyle: {
							opacity: 0,
							transform: "scale(0.001)"
						},
						visibleStyle: {
							transform: "scale(1)",
							opacity: 1
						}
					});
					$('.rt-isotope-tab a').on('click', function () {
						var $parent = $(this).closest('.rt-isotope-wrapper'),
							selector = $(this).attr('data-filter');
						$parent.find('.rt-isotope-tab .current').removeClass('current');
						$(this).addClass('current');
						$isotope.isotope({
							filter: selector
						});

						return false;
					});

					$(".hide-all .rt-isotope-tab a").first().trigger('click');
				});
			}
		},
		/* Masonary */
		rtMasonary: function () {
			var gridIsoContainer = $(".rt-masonry-grid");
			if (gridIsoContainer.length) {
				var imageGallerIso = gridIsoContainer.imagesLoaded(function () {
					imageGallerIso.isotope({
						itemSelector: ".rt-grid-item",
						percentPosition: true,
						isAnimated: true,
						masonry: {
							columnWidth: ".rt-grid-item",
							horizontalOrder: true
						},
						animationOptions: {
							duration: 700,
							easing: 'linear',
							queue: false
						}
					});
				});
			}
		},




		menuDrawerOpen: function (offCanvas) {
			offCanvas.menuBar.on('click', e => {
				e.preventDefault();
				offCanvas.menuBar.toggleClass('is-open')
				offCanvas.drawer.toggleClass('is-open');
				e.stopPropagation()
			});

			$(document).on('click', e => {
				if (!$(e.target).closest(offCanvas.drawerClass).length) {
					offCanvas.drawer.removeClass('is-open');
					offCanvas.menuBar.removeClass('is-open')
				}
			});
		},

		offcanvasMenuToggle: function (offCanvas) {
			offCanvas.drawer.each(function () {
				const caret = $(this).find('.caret');
				caret.on('click', function (e) {
					e.preventDefault();
					$(this).closest('li').toggleClass('is-open');
					$(this).parent().next().slideToggle(300);
				})
			})
		},

		headerSearchOpen: function () {
			$('a[href="#header-search"]').on("click", function (event) {
				event.preventDefault();
				$("#header-search").addClass("open");
				$('#header-search > form > input[type="search"]').focus();
			});

			$("#header-search, #header-search button.close").on("click keyup", function (event) {
				if (
					event.target === this ||
					event.target.className === "close" ||
					event.keyCode === 27
				) {
					$(this).removeClass("open");
				}
			});
		},

		backToTop: function () {
			/* Scroll to top */
			$('.scrollToTop').on('click', function () {
				$('html, body').animate({scrollTop: 0}, 800);
				return false;
			});
		},

		/* windrow back to top scroll */
		backTopTopScroll: function () {
			if ($(window).scrollTop() > 100) {
				$('.scrollToTop').addClass('show');
			} else {
				$('.scrollToTop').removeClass('show');
			}
		},

		/* Counter */
		counterUp: function () {
			const counterContainer = $('.counter');
			if (counterContainer.length) {
				counterContainer.counterUp({
					delay: counterContainer.data('rtsteps'),
					time: counterContainer.data('rtspeed')
				});
			}
		},


		/* preloader */
		preLoader: function () {
			$('#preloader').fadeOut('slow', function () {
				$(this).remove();
			});
		},


		// with progress bar
		ProgressBar: function () {
			if ( $(".progress-appear").length === 0 ) {
				return false;
			}
			let counter = true;
			$(".progress-appear").appear();
			$(".progress-appear").on("appear", function () {
				if (counter) {
					// with skill bar
					$(".skill-per").each(function () {
						let $this = $(this);
						let per = $this.attr("data-per");
						$this.css("width", per + "%");
						$({ animatedValue: 0 }).animate(
							{
								Hover: per,
								animatedValue: per
							},
							{
								duration: 500,
								step: function () {
									$this.attr("data-per", Math.floor(this.animatedValue) + "%");
								},
								complete: function () {
									$this.attr("data-per", Math.floor(this.animatedValue) + "%");
								},
							},
						);
					});
					counter = false;
				}
			});
		},

		/* Swiper slider */
		swiperSlider: function () {
			$('.rt-swiper-slider').each(function () {
				var $this = $(this);
				var settings = $this.data('xld');
				var autoplayconditon = settings['auto'];
				var $pagination = $this.find('.swiper-pagination')[0];
				var $next = $this.find('.swiper-button-next')[0];
				var $prev = $this.find('.swiper-button-prev')[0];
				var swiper = new Swiper(this, {
					autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
					speed: settings['speed'],
					loop: settings['loop'],
					pauseOnMouseEnter: true,
					effect: typeof settings['effect'] == "undefined" ? 'slide' : settings['effect'],
					slidesPerView: settings['slidesPerView'],
					spaceBetween: settings['spaceBetween'],
					centeredSlides: settings['centeredSlides'],
					slidesPerGroup: settings['slidesPerGroup'],
					pagination: {
						el: $pagination,
						clickable: true,
						type: 'bullets',
					},
					navigation: {
						nextEl: $next,
						prevEl: $prev,
					},
					scrollbar: {
						el: '.swiper-scrollbar',
						draggable: true,
					},
					breakpoints: {
						0: {
							slidesPerView: settings['breakpoints']['0']['slidesPerView'],
						},
						425: {
							slidesPerView: settings['breakpoints']['425']['slidesPerView'],
						},
						576: {
							slidesPerView: settings['breakpoints']['576']['slidesPerView'],
						},
						768: {
							slidesPerView: settings['breakpoints']['768']['slidesPerView'],
						},
						992: {
							slidesPerView: settings['breakpoints']['992']['slidesPerView'],
						},
						1200: {
							slidesPerView: settings['breakpoints']['1200']['slidesPerView'],
						},
						1600: {
							slidesPerView: settings['breakpoints']['1600']['slidesPerView'],
						},
					},
				});
				swiper.init();
			});
		},

		/* Swiper slider */
		heroSlider: function () {
			$('.rt-swiper-hero-slider').each(function () {
				var $this = $(this);
				if ($this.length) {
					$('body').addClass('hero-slider-active');
				}
				var settings = $this.data('xld');
				var autoplayconditon = settings['auto'];
				var $pagination = $this.find('.swiper-pagination')[0];
				var $next = $this.find('.swiper-button-next')[0];
				var $prev = $this.find('.swiper-button-prev')[0];
				var swiper = new Swiper(this, {
					autoplay: autoplayconditon ? { delay:settings['autoplay']['delay'] } : false,
					speed: settings['speed'],
					loop: settings['loop'],
					pauseOnMouseEnter: true,
					effect: typeof settings['effect'] == "undefined" ? 'slide' : settings['effect'],
					slidesPerView: settings['slidesPerView'],
					spaceBetween: settings['spaceBetween'],
					centeredSlides: settings['centeredSlides'],
					slidesPerGroup: settings['slidesPerGroup'],
					pagination: {
						el: $pagination,
						clickable: true,
						renderBullet: function (index, className) {
							return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
						},
					},
					// effect: "creative",
					creativeEffect: {
						prev: {
							shadow: true,
							translate: [0, 0, -400],
						},
						next: {
							translate: ["100%", 0, 0],
						},
					},
					navigation: {
						nextEl: $next,
						prevEl: $prev,
					},
					scrollbar: {
						el: '.swiper-scrollbar',
						draggable: true,
					},

					breakpoints: {
						0: {
							slidesPerView: 1,
						},
						768: {
							slidesPerView: 1,
						},
						1200: {
							slidesPerView: 1,
						},
					},
				});
				swiper.init();
			});
		},
	};

	$(document).ready(function (e) {
		Blenco._init();
	});

	$(document).on('load', () => {
		Blenco.menuOffset();
	})

	$(window).on('scroll', (event) => {
		Blenco.backTopTopScroll(event);
	});

	$(window).on('resize', () => {
		Blenco.menuOffset($);
	});

	$(window).on('elementor/frontend/init', () => {
		if (elementorFrontend.isEditMode()) {
			//For all widgets
			elementorFrontend.hooks.addAction('frontend/element_ready/widget', () => {
				Blenco.AjaxSearch();
				Blenco.rtElementorParallax();
				Blenco.magnificPopup();
				Blenco.rtIsotope();
				Blenco.counterUp();
				Blenco.imageFunction();
				Blenco.swiperSlider($);
				Blenco.heroSlider();
				Blenco.ProgressBar();
				Blenco.ImgcolumnList();
			});

		}
	});

	window.Blenco = Blenco;

})(jQuery);
