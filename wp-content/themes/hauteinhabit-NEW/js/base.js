/* CUSTOM JQUERY DTS@DAGEY.COM 15-JUL-2014 */

/* END CUSTOM JQUERY DTS@DAGEY.COM 15-JUL-2014 */

/*global jQuery */
(function (haute, $, undefined) {

    "use strict";

    /** GLOBALS */
    var $doc = $(document),
        $win = $(window);
		
	$('div.images').slick({
		slidesToShow: 3,
    slidesToScroll: 3,
		prevArrow: '#divSlickSlider .prev',
		nextArrow: '#divSlickSlider .next'
	});
	/** HELPERS */
	(function (helpers) {
	
		//open a new window centered
		helpers.openWindow = function (url, name, width, height) {
			name = name || window.location.href;
			width = width || 800;
			height = height || 600;
			var leftPosition = (window.screen.width / 2) - ((width / 2) + 10),
				topPosition = (window.screen.height / 2) - ((height / 2) + 50);
			
			window.open(url, name, 'left=' + leftPosition  + ', top=' + topPosition + ', screenX=' + leftPosition + ', screenY=' + topPosition + ', width=' + width + ', height=' + height + ', toolbar=no, menubar=no, scrollbars=no, location=no, directories=no, status=no, resizable=no');
		};
		
		//scroller
		helpers.scrollTo = function ($el, opts) {
			opts = opts || {};
			opts.offset = opts.offset || 0;
			
			$('html, body').delay(1).animate(
				{ scrollTop: $el.offset().top + opts.offset },
				{
					duration: opts.duration || 600,
					easing: opts.easing || 'easeOutSine'
				}
			);
		};
		
        //social sharing
        helpers.getSocialSharingURLS = function (opts) {
            var facebook, twitter, google, tumblr, pinterest,
            shareURL = opts.url;
            shareURL = encodeURIComponent(shareURL);
            opts = opts || {};

            facebook = 'http://www.facebook.com/sharer.php?s=100&p[url]=' + shareURL + '&p[title]=' + opts.title + '&p[images][0]=' + opts.mediaURL + '&p[summary]=' + opts.description;
            twitter = 'http://twitter.com/share?url=' + shareURL;
            google = 'https://plus.google.com/share?url=' + shareURL;
            tumblr = 'http://www.tumblr.com/share?v=3&u=' + shareURL + '&t=' + opts.title;
			pinterest = 'http://pinterest.com/pin/create/button/?url=' + shareURL + '&media=' + opts.mediaURL + '&description=' + opts.description;		

            return {
                facebook: facebook,
                twitter: twitter,
                google: google,
                tumblr: tumblr,
                pinterest: pinterest
            };
        };
		
        //instagram stream
        helpers.getInstagramFeed = function (userID, accessToken, callback) {
            $.ajax({
                url: 'https://api.instagram.com/v1/users/' + userID + '/media/recent/?access_token=' + accessToken,
                type: 'get',
                dataType: 'jsonp',
                cache: false,
                success: function (data) {
                    callback(data);
                }
            });
        };
		
		helpers.calculateAspectRatioFit = function ($ele, reqWidth, reqHeight) {
			var width = $ele.width(),
				height = $ele.height();
				
			if (width > height && height < reqHeight) {
				$ele.css('min-height', reqHeight); // Set new height
			} else {
				if (width > height && width < reqWidth) {
					$ele.css('min-width', reqWidth); // Set new width
				}
				else {
					if (width > height && width > reqWidth) {
						$ele.css('max-width', reqWidth); // Set new width
					} else {
						if (height > width && width < reqWidth) {
							$ele.css('min-width', reqWidth); // Set new width
						}
					}
				}
			}
		};
	
	}(haute.helpers = haute.helpers || {}));
	
	/** UI */ 
	(function (ui) {
	
		//carousel
        ui.Carousel = function ($container, $contents, $slides, opts) {
            if ($container === undefined || !$container.length) { return;  }
            if ($contents === undefined || !$contents.length) { return; }
            if ($slides === undefined || !$slides.length) { return; }
            if (!this instanceof ui.Carousel) { return new ui.Carousel($container, $contents, $slides, opts); }
            var _this = this;
            opts = opts || {};
            _this.cfg = opts = {
                initial: (typeof opts.initial === 'number') ? opts.initial : 0,
                duration: (typeof opts.duration === 'number') ? opts.duration : 400,
                easing: (typeof opts.easing === 'string') ? opts.easing : 'easeOutSine',
                fixedWidth: (typeof opts.fixedWidth === 'boolean') ? opts.fixedWidth : true,
                sizeImages: (typeof opts.sizeImages === 'boolean') ? opts.sizeImages : false
            };
            _this.$container = $($container);
            _this.$contents = $($contents);
            _this.$overflow = _this.$container.find('.overflow');
            _this.$slides = $($slides);
			
			var contentWidth = 0;
			_this.$slides.each(function () { 
				contentWidth += $(this).outerWidth(true);
			});
			_this.$contents.width(contentWidth);
			_this.amountToSlide = _this.getAmountToSlide();
			_this.slideLength = Math.ceil(_this.$contents.width() / _this.amountToSlide);
            _this.current = _this.cfg.initial;
            _this.animating = false;
            _this.init();
        };
        ui.Carousel.prototype = {
            init: function () {
                var _this = this;
                _this.addBtns();
				
				if (_this.cfg.sizeImages) { _this.sizeImages(); }
			
				if (_this.$contents.width() < _this.amountToSlide) {
					_this.$container.addClass('narrow');
				}
				
                _this.goTo(_this.current);
                $win.on('load resize', function () {
                    _this.update();
                });
				
				if (window.Touch) {
					new ui.Touch(_this.$contents, {
						onSwipeLeft: function () {
							if (!_this.animating) {
								if (_this.current === _this.slideLength - 1) { return; }
								_this.goTo(_this.current + 1);
							}
						},
						onSwipeRight: function () {
							if (!_this.animating) {
								if (_this.current === 0) { return; }
								_this.goTo(_this.current - 1);
							}
						}
					});
				}
            },
			sizeImages: function () {
				var _this = this;
				_this.$slides.each(function () {
					var $this = $(this),
						$img = $this.find('img');
					
					haute.helpers.calculateAspectRatioFit($img, $this.width(), $this.height());
				});
			},
			getAmountToSlide: function () {
				var _this = this,
					amount;
				if (!_this.cfg.fixedWidth) {
					amount = _this.$overflow.width();
				} else {
					var slideWidth = _this.$slides.outerWidth(true),
						interval = Math.floor(_this.$overflow.width() / slideWidth);
					amount = slideWidth * interval;
				}
				return amount;
			},
            update: function () {
                var _this = this;
				_this.amountToSlide = _this.getAmountToSlide();
                _this.goTo(_this.current);
            },
            goTo: function (idx) {
                var _this = this;
                _this.$prevBtn.removeClass('disabled');
                _this.$nextBtn.removeClass('disabled');
                if (idx === 0) {
                    _this.$prevBtn.addClass('disabled');
                }
                if (idx === _this.slideLength - 1) {
                    _this.$nextBtn.addClass('disabled');
                }

                _this.animating = true;
                _this.$contents.animate({
                    'left': -(idx * _this.amountToSlide)
                }, {
                    duration: _this.cfg.duration,
                    easing: _this.cfg.easing,
                    complete: function () {
                        _this.animating = false;
                    }
                });
                _this.current = idx;
            },
            addBtns: function () {
                var _this = this;
                _this.$prevBtn = $('<div>').addClass('toggle prev').appendTo(_this.$container).on('click', function (ev) {
                    ev.stopPropagation();
                    if (!_this.animating) {
                        if (_this.current === 0) { return; }
                        _this.goTo(_this.current - 1);
                    }
                });
                _this.$nextBtn = $('<div>').addClass('toggle next').appendTo(_this.$container).on('click', function (ev) {
                    ev.stopPropagation();
                    if (!_this.animating) {
                        if (_this.current === _this.slideLength - 1) { return; }
                        _this.goTo(_this.current + 1);
                    }
                });
            }
        };
		
		//tabs
        ui.Tabs = function ($tabs, $togglers, opts) {
            if ($tabs === undefined || !$tabs.length) { return;  }
            if ($togglers === undefined || !$togglers.length) { return; }
            if (!this instanceof ui.Tabs) { return new ui.Tabs($tabs, $togglers, opts); }
            var _this = this;
            opts = opts || {};
            _this.cfg = opts = {
                initial: (typeof opts.initial === 'number') ? opts.initial : 0,
                duration: (typeof opts.duration === 'number') ? opts.duration : 400,
				sizeImages: (typeof opts.sizeImages === 'boolean') ? opts.sizeImages : false,
				scrollOnChange: (typeof opts.scrollOnChange === 'boolean') ? opts.scrollOnChange : false,
				resizeOnChange: (typeof opts.resizeOnChange === 'boolean') ? opts.resizeOnChange : false
            };
            _this.$tabs = $($tabs);
            _this.$togglers = $($togglers);
			_this.current = _this.cfg.initial;
			_this.loaded = false;
            _this.init();
        };
		ui.Tabs.prototype = {
			init: function () {
				var _this = this;
				if (_this.cfg.sizeImages) { _this.sizeImages(); }
				_this.$togglers.each(function (idx) {
					$(this).on('click', function (ev) {
						ev.preventDefault();
						if (idx !== _this.current) {
							_this.goTo(idx);
						}
					});
				});
				_this.$tabs.each(function (idx) {
					$(this).on('click', function (ev) {
						if (idx === _this.$tabs.length - 1) { _this.goTo(0); }
						else { _this.goTo(idx + 1); }
					});
				});
				_this.goTo(_this.current);
			},
			goTo: function (idx) {
				var _this = this;
				$(_this.$togglers[_this.current]).removeClass('active');
				$(_this.$togglers[idx]).addClass('active');
				$(_this.$tabs[_this.current]).fadeOut(_this.cfg.duration);
				
				if (_this.cfg.resizeOnChange) {
					_this.$tabs.parent().animate(
						{ 'height': $(_this.$tabs[idx]).find('img').height() },
						{
							duration: _this.cfg.duration,
							complete: function () {
								_this.show($(_this.$tabs[idx]));
							}
						}
					);
				} else {
					_this.show($(_this.$tabs[idx]));
				}				
				
				_this.current = idx;
			},
			show: function ($el) {
				var _this = this;
				$el.fadeIn(_this.cfg.duration, function () {
					if (_this.cfg.scrollOnChange && _this.loaded) {
						haute.helpers.scrollTo($el, {
							duration: 50
						});
					}
					if (!_this.loaded) { _this.loaded = true; }
				});
			},
			sizeImages: function () {
				var _this = this;
				_this.$togglers.each(function () {
					var $this = $(this),
						$img = $this.find('img');
					haute.helpers.calculateAspectRatioFit($img, $this.width(), $this.height());
				});
			}
		};
		
        //touch event helper
        ui.Touch = function ($ele, opts) {
            if ($ele === undefined || !$($ele.length)) { return; }
            if (!this instanceof ui.Touch) { return new ui.Touch($ele, opts); }
            opts = opts || {};
            var _this = this;
            _this.cfg = opts = {
                onSwipeLeft: (typeof opts.onSwipeLeft === 'function') ? opts.onSwipeLeft : function() {},
                onSwipeRight: (typeof opts.onSwipeRight === 'function') ? opts.onSwipeRight : function() {},
                onSwipeUp: (typeof opts.onSwipeUp === 'function') ? opts.onSwipeUp : function() {},
                onSwipeDown: (typeof opts.onSwipeDown === 'function') ? opts.onSwipeDown : function() {},
                minMoveX: (typeof opts.minMoveX === 'number') ? opts.minMoveX : 10,
                minMoveY: (typeof opts.minMoveX === 'number') ? opts.minMoveY : 10,
                preventDefaultEvents: (typeof(opts.preventDefaultEvents) === 'boolean') ? opts.preventDefaultEvents : false
            };
            _this.$ele = $($ele);
            _this.startX = 0;
            _this.startY = 0;
            _this.moving = false;
            _this.init();
        };
        ui.Touch.prototype = {
            init: function () {
                var _this = this;
                _this.$ele.bind('touchstart', function (ev) {
                    _this.onTouchStart(ev);
                });
                _this.$ele.bind('touchmove', function (ev) {
                    _this.onTouchMove(ev);
                });
            },
            onTouchStart: function (ev) {
                var _this = this;
                if (_this.cfg.preventDefaultEvents) {
                    ev.preventDefault();
                }

                if (ev.originalEvent.touches.length) {
                    _this.startX = ev.originalEvent.touches[0].pageX;
                    _this.startY = ev.originalEvent.touches[0].pageY;
                    _this.moving = true;
                }
            },
            onTouchMove: function (ev) {
                var _this = this;
                if (_this.cfg.preventDefaultEvents) {
                    ev.preventDefault();
                }

                if (_this.moving) {
                    var x = ev.originalEvent.touches[0].pageX,
                        y = ev.originalEvent.touches[0].pageY,
                        deltaX = _this.startX - x,
                        deltaY = _this.startY - y;

                    if (Math.abs(deltaX) >= this.cfg.minMoveX) {
                        _this.cancel();
                        if (deltaX > 0) {
                            _this.cfg.onSwipeLeft(ev, x, y);
                        } else {
                            _this.cfg.onSwipeRight(ev, x, y);
                        }
                    } else if (Math.abs(deltaY) >= _this.cfg.minMoveY) {
                        _this.cancel();
                        if (deltaY > 0) {
                            _this.cfg.onSwipeUp(ev, x, y);
                        } else {
                            _this.cfg.onSwipeDown(ev, x, y);
                        }
                    }
                }
            },
            cancel: function() {
                var _this = this;
                _this.$ele.unbind('touchmove', _this.onTouchMove);
                _this.startX = null;
                _this.startY = null;
                _this.moving = false;
            }
        };
		
	}(haute.ui = haute.ui || {}));
	
	
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
		
		controllers.Social = {
			cfg: {
				sel: '.social',
				instagram: {
					clientiD: '93d187160d844724aa17ec245caceee9',
					clientSecret: 'a6102c9322ac4f72aee807a9c5195278',
					accessToken: '537172.93d1871.a5dbb7233b774c2cbfa99fba12572158',
					userID: '9610861',
					max: 12,
					header: 'On Instagram @HauteInhabit',
					viewAll: 'View all on Instagram',
					url: 'http://instagram.com/hauteinhabit'
				}
			},
			init: function () {
				var _this = this,
					cfg = _this.cfg,
					$postUtility = $('.post-utility');
					
				$postUtility.each(function () {
					var $this = $(this);
					$this.find('.share').on('click', function (ev) {
						ev.stopPropagation();
						ev.preventDefault();
						$this.addClass('active');
					});
				});
				
				$('body').on('click', function () {
					$postUtility.removeClass('active');
				});
					
				//posts
				var isPost = $('.single-post').length > 0;
				$('.post').each(function () {
					var $this = $(this),
						$share = $this.find(cfg.sel),
						urls = haute.helpers.getSocialSharingURLS({
                            url: isPost ? $this.find('.post-utility').data('url') : $this.find('.post-title a').attr('href'),
                            mediaURL: isPost ? $this.find('img:first').attr('src') : $this.find('.post-image img').attr('src'),
                            title: $this.find('.post-title').text(),
                            description: $this.find('.post-lead').text()
                        });
					_this.bindSocial($share, urls);
				});
				
				//instagram feed
				if (!$('body.search').length) {
					var $igContainer = $('<div>').addClass('instagram_feed');
					$('<h4>').text(cfg.instagram.header).addClass('hdr').appendTo($igContainer);
					var $igCarousel = $('<div>').addClass('carousel').appendTo($igContainer),
						$igOverflow = $('<div>').addClass('overflow').appendTo($igCarousel),
						$igSlides = $('<ul>').addClass('slides clear').appendTo($igOverflow),
						$view = $('<a>').attr({
							'href': cfg.instagram.url,
							'rel': 'external'
						}).addClass('view').appendTo($igContainer);
					$('<span>').text(cfg.instagram.viewAll).appendTo($view);
						
					haute.helpers.getInstagramFeed(cfg.instagram.userID, cfg.instagram.accessToken, function (data) {
						for (var i = 0; i < cfg.instagram.max; i++) {
							var img = data.data[i],
								caption = img.caption ? img.caption.text : '',
								$li = $('<li class="slide"><a href="' + img.link + '" rel="external"><img src="' + img.images.low_resolution.url + '" alt="' + caption + '"><div class="mask"><span>' + caption + '</span></div></a>').appendTo($igSlides),
								$mask = $li.find('.mask');
							$mask.find('span').css({
								'top': ($li.height() - $mask.find('span').height()) / 2
							});
						}
						
						new haute.ui.Carousel($igCarousel, $igSlides, $igSlides.find('.slide'));
						controllers.ExternalLinks.init($igCarousel.find('a'));
					});
					
					var $posts = $('.post'),
						$placement, postIdx;
					if ($('body.home').length > 0) {
						postIdx = Math.floor($posts.length / 2);
						$placement = $($posts[postIdx]);
					} /* else {
						var $para = $posts.find('p').eq(2);
						postIdx = Math.floor($para.length / 2);
						$placement = $($para[postIdx]);
					} */
					//$igContainer.insertAfter($placement);
				}
			},
            bindSocial: function ($eles, urls) {
                var _this = this;

                $eles.find('.facebook a').attr('href', urls.facebook);
                $eles.find('.twitter a').attr('href', urls.twitter);
                $eles.find('.google a').attr('href', urls.google);
                $eles.find('.tumblr a').attr('href', urls.tumblr);
                $eles.find('.pinterest a').attr('href', urls.pinterest);
                $eles.find('.instagram a').attr('href', _this.cfg.instagram.url);

                $eles.find('a:not(.email)').on('click', function(ev) {
                    ev.preventDefault();
					ev.stopPropagation();
                    var $this = $(this);
                    haute.helpers.openWindow($this.attr('href'), $this.data('service'), $this.data('width'), $this.data('height'));
                });
            }
		};
		
		controllers.CleanupContent = {
			cfg: {
				selectors: 'h1, h2, h3, h4, h5, h6, p, a, span, em, strong',
				ignore: 'img'
			},
			init: function ($ele) {
				var _this = this,
					cfg = _this.cfg;
				$ele.find(cfg.selectors).filter(function () { 
					var $this = $(this);
					if (!$this.find(cfg.ignore).length) {
						return $.trim($this.html()).length > 0;
					}
				});
			}
		};
		
		controllers.Article = {
			cfg: {
				fadeDuration: 200
			},
			init: function () {
				var _this = this;
				_this.$container = $('.post-body');
				_this.$imgs = _this.$container.find('img');
				
				if (_this.$imgs.length > 0) { 
					_this.buildCarousel(); 
					_this.buildTabs(); 
				}
			},
			buildTabs: function () {
				var _this = this;
				_this.$imgs.each(function () {
					var $this = $(this);
					$('<span>').addClass('tab').appendTo(_this.$parent).append($this);
					var imageCaption = $this.attr('title');
	
					if (imageCaption != '' && imageCaption!=null) {
						var imgWidth = $this.width();
						var imgHeight = $this.height();
						var position = $this.position();
						var positionTop = (position.top + imgHeight - 26)
						$("<span class='img-caption'><em>"+imageCaption+"</em></span>")
						.css({/*"position":"absolute", "top":positionTop+"px", "left":"0", "width":imgWidth +"px"*/})
						.insertAfter($this);
					}
				});
				
				new haute.ui.Tabs(_this.$parent.find('.tab'), _this.$slides, {
					sizeImages: true,
					resizeOnChange: true,
					scrollOnChange: false
				});
			},
			buildCarousel: function () {
				var _this = this;
				if(_this.$imgs.length>1) {
					_this.$parent = _this.$imgs.first().parents('p');
					_this.$carousel = $('<div>').addClass('carousel').insertAfter(_this.$parent);
					_this.$overflow = $('<div>').addClass('overflow').appendTo(_this.$carousel);
					_this.$slidesContainer = $('<ul>').addClass('slides clear').appendTo(_this.$overflow);
					_this.$imgs.each(function () {
						var $this = $(this);
						
						if ($this.attr('src').indexOf('smilies') === -1) {
							var $img = $('<img>').attr('src', $this.attr('src')).attr('title', $this.attr('title'));
							$('<li>').addClass('slide').append($img).appendTo(_this.$slidesContainer);
						}
					});
					
					_this.$slides = _this.$slidesContainer.find('.slide');
					
					_this.size(_this.$parent, _this.$imgs.first());
					
					new haute.ui.Carousel(_this.$carousel, _this.$slidesContainer, _this.$slides, {
						sizeImages: true
					});
				}
			},
			size: function ($ele, $img) {
				$ele.css({
					'width': $img.width(),
					'position': 'relative',
					'margin': '0 auto'
					//'height': $img.height()
					//'overflow': 'hidden'
				});
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