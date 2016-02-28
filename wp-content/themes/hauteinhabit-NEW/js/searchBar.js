/* CUSTOM JQUERY DTS@DAGEY.COM 15-JUL-2014 */

/* END CUSTOM JQUERY DTS@DAGEY.COM 15-JUL-2014 */

/*global jQuery */
(function (haute, $, undefined) {

    "use strict";

    /** GLOBALS */
    var $doc = $(document),
        $win = $(window);
	
	/** CONTROLLERS */ 
	(function (controllers) {
	
		//external links
		controllers.ExternalLinks = {
			init: function ($eles) {
				var _this = this;
				if (!document.getElementsByTagName) { return; }
				$eles.each(function () {
					var $this = $(this),
						valid = ($this.attr('href') && $this.attr('href') !== '#');
					if (valid) {
						$this.on('click', function (ev) {
							ev.preventDefault();
							_this.open($this.attr('href'));
						});
					}
				});
			},
			open: function (url) { window.open(url); }
		};	
	
		//main nav
		controllers.MainNav = {
			cfg: {
				fadeDuration: 300
			},
			init: function () {
				var _this = this;
				_this.$header = $('.main-menu');
				_this.$btns = _this.$header.find('.btn');
				_this.$menus = _this.$header.find('.search-menu').on('click', function (ev) {
					ev.stopPropagation();
				});
				$('body').on('click', function () {
					if (_this.$current && _this.$current.length > 0) {
						_this.close(_this.$current);
					}
				});
				_this.$btns.on('click', function (ev) {
					ev.preventDefault();
					ev.stopPropagation();
					_this.toggle($(this));
				});
			},
			toggle: function ($ele) {
				var _this = this,
					$menu = $('#menu_' + $ele.data('menu'));
					
				if ($ele.hasClass('opened')) {
					_this.close($menu);
				} else {
					_this.open($ele, $menu);
				}
			},
			open: function ($ele, $menu) {
				var _this = this,
					$others = _this.$menus.filter(function () { return $(this).attr('id') !== $menu.attr('id'); });
					
				$ele.addClass('opened');
				$others.each(function () { _this.close($(this)); });
				$menu.fadeIn(_this.cfg.fadeDuration, function () {
					if (!$menu.hasClass('loaded')) {
						/*var $carousel = $menu.find('.carousel');
						new haute.ui.Carousel($carousel, $carousel.find('.slides'), $carousel.find('li'), {
							fixedWidth: false
						});*/
						$menu.addClass('loaded');
					}
				});
				_this.$current = $menu;
				$menu.find('input:first').focus();
			},
			close: function ($menu) {
				var _this = this;
				_this.$btns.filter(function () { return $(this).data('menu') === $menu.attr('id').split('menu_')[1]; }).removeClass('opened');
				$menu.fadeOut(_this.cfg.fadeDuration);
				$menu.find('input:first').blur();
			}
		};
		
		controllers.Site = {
			init: function () {
				controllers.MainNav.init();
				controllers.Social.init();
				$('#mc_mv_EMAIL').attr('placeholder', 'Email Address...');
				//controllers.CleanupContent.init($('.entry-content'));
				
				var $pushDown = $('body.search-results, body.archive, body.single-post, body.paged');
				if ($pushDown.length > 0) {
					haute.helpers.scrollTo($('#content'), {
						duration: 0,
						offset: -$('#header').outerHeight(true)
					});
				}
				
				if ($('body.single').length > 0) { controllers.Article.init(); }
				
				//external links
				var $externalLinks = $('a[rel="external"]');				
				controllers.ExternalLinks.init($externalLinks);
				
				$('.rss').on('click', function (ev) {
					ev.preventDefault();
					var $this = $(this);
					haute.helpers.openWindow($this.attr('href'), 'Subscribe to Haute Inhabit RSS Feed');
				});
				
				$('.related .carousel').each(function () {
					var $this = $(this);
					new haute.ui.Carousel($this, $this.find('.slides'), $this.find('.slide'), {
						sizeImages: true
					});
				});
			}
		};
	
	}(haute.controllers = haute.controllers || {}));
	
    //doc ready
    $doc.on('ready', function () {
       haute.controllers.Site.init();
    });
		
	$win.on('ready', function () {
		$('body').addClass('ready');
		var $post = $('.single-post');
		if ($post.length > 0) {
			$('#main .post-utility').insertBefore('#disqus_thread');
		}
	});
	
}(window.haute = window.haute || {}, jQuery));