(function($) {
    "use strict";


    var blog = {};
    qodef.modules.blog = blog;

    blog.qodefInitAudioPlayer = qodefInitAudioPlayer;

    blog.qodefOnDocumentReady = qodefOnDocumentReady;
    blog.qodefOnWindowLoad = qodefOnWindowLoad;
    blog.qodefOnWindowResize = qodefOnWindowResize;
    blog.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
        qodefInitAudioPlayer();
        qodefInitBlogMasonry();
        qodefInitBlogMasonryGallery();
        qodefInitBlogMasonryLoadMore();
        qodefInitBlogLoadMore();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefInitBlogMasonryAnimation();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function qodefOnWindowResize() {

    }

    /* 
        All functions to be called on $(window).scroll() should be in this function
    */
    function qodefOnWindowScroll() {

    }



    function qodefInitAudioPlayer() {

        var players = $('audio.qodef-blog-audio');

        players.mediaelementplayer({
            audioWidth: '100%'
        });
    }


    function qodefInitBlogMasonry() {

        if($('.qodef-blog-holder.qodef-blog-type-masonry').length) {

            var container = $('.qodef-blog-holder.qodef-blog-type-masonry');

			container.waitForImages({
				finished: function(){
					container.isotope({
						itemSelector: 'article',
						resizable: false,
						masonry: {
							columnWidth: '.qodef-blog-masonry-grid-sizer',
							gutter: '.qodef-blog-masonry-grid-gutter'
						}
					});

					setTimeout(function() {
						container.addClass('qodef-appeared');
						container.isotope('layout');
					}, 400);
				},
				waitForAll: true
			});

            var filters = $('.qodef-filter-blog-holder');
            $('.qodef-filter').click(function() {
                var filter = $(this);
                var selector = filter.attr('data-filter');
                filters.find('.qodef-active').removeClass('qodef-active');
                filter.addClass('qodef-active');
                container.isotope({filter: selector});
                return false;
            });
        }
    }

    /*
    * Template animation for blog masonry
    */
    function qodefInitBlogMasonryAnimation() {
        if (!qodef.body.hasClass('touch')) {
            if (qodef.body.hasClass('page-template-blog-masonry-full-width') || qodef.body.hasClass('page-template-blog-masonry')) {
                var blogList = $('.qodef-blog-type-masonry');

                if (blogList.length) {
                    var article = blogList.find('article'),
                        articleCounter = 0,
                        animateCycle, // rewind delay initial
                        animateCycleCounter = 0;

                    article.each(function(){
                        var thisArticle = $(this);

                        if(thisArticle.offset().top == article.first().offset().top) {
                            articleCounter ++;
                        }

                        animateCycle = articleCounter + 1;

                        setTimeout(function(){
                            thisArticle.appear(function(){
                                animateCycleCounter ++;
                                if(animateCycleCounter == animateCycle) {
                                    animateCycleCounter = 0;
                                }
                                setTimeout(function(){
                                    thisArticle.addClass('qodef-appeared');
                                },animateCycleCounter * 200);

                            },{accX: 0, accY: 0});
                        },30);
                    });
                }
            }
        }
    }

    function qodefInitBlogMasonryGallery() {

        if($('.qodef-blog-holder.qodef-blog-type-masonry-gallery').length) {

            qodefResizeBlogMasonryGallery($('.qodef-blog-masonry-gallery-grid-sizer').width());
            var container = $('.qodef-blog-holder.qodef-blog-type-masonry-gallery');
            container.width(Math.round(container.parent().width()));
            container.isotope({
                itemSelector: 'article',
                resizable: false,
                masonry: {
                    columnWidth: '.qodef-blog-masonry-gallery-grid-sizer',
                    gutter: '.qodef-blog-masonry-gallery-grid-gutter'
                }
            });

            var filters = $('.qodef-filter-blog-holder');
            $('.qodef-filter').click(function() {
                var filter = $(this);
                var selector = filter.attr('data-filter');
                filters.find('.qodef-active').removeClass('qodef-active');
                filter.addClass('qodef-active');
                container.isotope({filter: selector});
                return false;
            });

            container.waitForImages(function(){
                container.animate({opacity: "1"}, 300, function() {
                    container.isotope().isotope('layout');
                });
            });

            $(window).resize(function() {
                qodefResizeBlogMasonryGallery($('.qodef-blog-masonry-gallery-grid-sizer').width());
                container.isotope().isotope('layout');
                container.width(Math.round(container.parent().width()));
            });
        }
    }

    function qodefResizeBlogMasonryGallery(size) {

        var rectangle_portrait = $('.qodef-blog-holder.qodef-blog-type-masonry-gallery .qodef-post-size-large-height');
        var rectangle_landscape = $('.qodef-blog-holder.qodef-blog-type-masonry-gallery .qodef-post-size-large-width');
        var square_big = $('.qodef-blog-holder.qodef-blog-type-masonry-gallery .qodef-post-size-large-width-height');
        var square_small = $('.qodef-blog-holder.qodef-blog-type-masonry-gallery .qodef-post-size-square');

        rectangle_portrait.css('height',2*size);
        rectangle_landscape.css('height',size);
        square_big.css('height',2*size);
        if(square_big.width() < 600) {
            square_big.css('height', square_big.width());
        }
        square_small.css('height', size);

    }
    
    function qodefInitBlogMasonryLoadMore() {

        if($('.qodef-blog-holder.qodef-blog-type-masonry').length) {

            var container = $('.qodef-blog-holder.qodef-blog-type-masonry');

            if(container.hasClass('qodef-masonry-pagination-infinite-scroll')) {
	            var i = 1;

	            $('.qodef-blog-infinite-scroll-button a').appear(function(e) {
		            e.preventDefault();
		            var button = $('.qodef-blog-infinite-scroll-button a');

		            var link = button.attr('href');
		            var content = '.qodef-masonry-pagination-infinite-scroll';
		            var anchor = '.qodef-blog-infinite-scroll-button a';
		            var nextHref = $(anchor).attr('href');
					button.css('visibility', 'visible');
		            button.text(qodefGlobalVars.vars.qodefMessage);
		            $.get(link + '', function(data) {
			            var newContent = $(content, data).wrapInner('').html();
			            nextHref = $(anchor, data).attr('href');
			            container.append(newContent).waitForImages(function() {
				            qodef.modules.blog.qodefInitAudioPlayer();
				            qodef.modules.common.qodefSlickSlider();
				            qodef.modules.common.qodefFluidVideo();
				            container.isotope('reloadItems').isotope({sortBy: 'original-order'});
				            $('.qodef-masonry-pagination-load-more').isotope('layout');
                            setTimeout(function(){
                                qodefInitBlogMasonryAnimation();
                            },400);
			            });

			            if(button.parent().data('rel') > i) {
				            button.attr('href', nextHref); // Change the next URL
				            button.css('visibility', 'hidden');
			            } else {
				            button.text(qodefGlobalVars.vars.qodefFinishedMessage);
				            setTimeout(function() {
					            button.parent().fadeOut(600, function(){ button.parent().remove();});
				            }, 600);

			            }
		            });
		            i++;
	            },{ one: false, accX: 0, accY: qodefGlobalVars.vars.qodefElementAppearAmount});
            } else if(container.hasClass('qodef-masonry-pagination-load-more')) {
                var i = 1;
                $('.qodef-blog-load-more-button a').on('click', function(e) {
                    e.preventDefault();

                    var button = $(this);

                    var link = button.attr('href');
                    var content = '.qodef-masonry-pagination-load-more';
                    var anchor = '.qodef-blog-load-more-button a';
                    var nextHref = $(anchor).attr('href');
                    $.get(link + '', function(data) {
                        var newContent = $(content, data).wrapInner('').html();
                        nextHref = $(anchor, data).attr('href');
                        container.append(newContent).isotope('reloadItems').isotope({sortBy: 'original-order'});
                        qodef.modules.blog.qodefInitAudioPlayer();
                        qodef.modules.common.qodefSlickSlider();
                        qodef.modules.common.qodefFluidVideo();
                        qodefInitBlogMasonryAnimation();
                        setTimeout(function() {
                            $('.qodef-masonry-pagination-load-more').isotope('layout');
                        }, 400);
                        if(button.parent().data('rel') > i) {
                            button.attr('href', nextHref); // Change the next URL
                        } else {
                            button.parent().remove();
                        }
                    });
                    i++;
                });
            }
        }
    }
    
    function qodefInitBlogLoadMore(){
        var blogHolder = $('.qodef-blog-holder.qodef-blog-load-more:not(.qodef-blog-type-masonry)');
        
        if(blogHolder.length){
            blogHolder.each(function(){
                var thisBlogHolder = $(this);
                var nextPage;
                var maxNumPages;
                
                var loadMoreButton = thisBlogHolder.find('.qodef-load-more-ajax-pagination .qodef-btn');
                maxNumPages =  thisBlogHolder.data('max-pages');                
                
                loadMoreButton.on('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    var loadMoreDatta = getBlogLoadMoreData(thisBlogHolder);
                    nextPage = loadMoreDatta.nextPage;
                    
                    if(nextPage <= maxNumPages){
                        var ajaxData = setBlogLoadMoreAjaxData(loadMoreDatta);
                        $.ajax({
                            type: 'POST',
                            data: ajaxData,
                            url: QodefAjaxUrl,
                            success: function (data) {
                                nextPage++;
                                thisBlogHolder.data('next-page', nextPage);
                                var response = $.parseJSON(data);
                                var responseHtml =  response.html;
                                thisBlogHolder.waitForImages(function(){    
                                    thisBlogHolder.find('article:last').after(responseHtml); // Append the new content 
                                    setTimeout(function() {               
                                        qodef.modules.blog.qodefInitAudioPlayer();
                                        qodef.modules.common.qodefOwlSlider();
                                        qodef.modules.common.qodefFluidVideo();
                                    },400);
                                });
                            }
                        });
                    }
                    
                    if(nextPage === maxNumPages){
                        loadMoreButton.hide();
                    }
                    
                });
            });
        }
    }
    function getBlogLoadMoreData(container){
        
        var returnValue = {};
        
        returnValue.nextPage = '';
        returnValue.number = '';
        returnValue.category = '';
        returnValue.blogType = '';
        returnValue.archiveCategory = '';
        returnValue.archiveAuthor = '';
        returnValue.archiveTag = '';
        returnValue.archiveDay = '';
        returnValue.archiveMonth = '';
        returnValue.archiveYear = '';
        
        if (typeof container.data('next-page') !== 'undefined' && container.data('next-page') !== false) {
            returnValue.nextPage = container.data('next-page');
        }
        if (typeof container.data('post-number') !== 'undefined' && container.data('post-number') !== false) {                    
            returnValue.number = container.data('post-number');
        }
        if (typeof container.data('category') !== 'undefined' && container.data('category') !== false) {                    
            returnValue.category = container.data('category');
        }
        if (typeof container.data('blog-type') !== 'undefined' && container.data('blog-type') !== false) {                    
            returnValue.blogType = container.data('blog-type');
        }
        if (typeof container.data('archive-category') !== 'undefined' && container.data('archive-category') !== false) {                    
            returnValue.archiveCategory = container.data('archive-category');
        }
        if (typeof container.data('archive-author') !== 'undefined' && container.data('archive-author') !== false) {                    
            returnValue.archiveAuthor = container.data('archive-author');
        }
        if (typeof container.data('archive-tag') !== 'undefined' && container.data('archive-tag') !== false) {                    
            returnValue.archiveTag = container.data('archive-tag');
        }
        if (typeof container.data('archive-day') !== 'undefined' && container.data('archive-day') !== false) {                    
            returnValue.archiveDay = container.data('archive-day');
        }
        if (typeof container.data('archive-month') !== 'undefined' && container.data('archive-month') !== false) {                    
            returnValue.archiveMonth = container.data('archive-month');
        }
        if (typeof container.data('archive-year') !== 'undefined' && container.data('archive-year') !== false) {                    
            returnValue.archiveYear = container.data('archive-year');
        }
        
        return returnValue;
        
    }
    
    function setBlogLoadMoreAjaxData(container){
        
        var returnValue = {
            action: 'mixtape_qodef_blog_load_more',
            nextPage: container.nextPage,
            number: container.number,
            category: container.category,
            blogType: container.blogType,
            archiveCategory: container.archiveCategory,
            archiveAuthor: container.archiveAuthor,
            archiveTag: container.archiveTag,
            archiveDay: container.archiveDay,
            archiveMonth: container.archiveMonth,
            archiveYear: container.archiveYear
        };
        
        return returnValue;
    }



})(jQuery);