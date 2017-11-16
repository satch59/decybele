(function($) {
    "use strict";

    var albums = {};
    qodef.modules.albums = albums;

	albums.qodefInitAlbumReviews = qodefInitAlbumReviews;

	albums.qodefOnDocumentReady = qodefOnDocumentReady;
	albums.qodefOnWindowLoad = qodefOnWindowLoad;
	albums.qodefOnWindowResize = qodefOnWindowResize;
	albums.qodefOnWindowScroll = qodefOnWindowScroll;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    $(window).scroll(qodefOnWindowScroll);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
	    qodefInitAlbumReviews();
        qodefInitArtists();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {

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


	function qodefInitAlbumReviews(){

		var reviews = $('.qodef-single-album-reviews');
		if(reviews.length){
			reviews.each(function(){

				var review = $(this);

				var auto = true;
				var controlNav = false;
				var directionNav = true;
				var slidesToShow = 1;

				review.slick({
					infinite: true,
					autoplay: auto,
					slidesToShow : slidesToShow,
					arrows: directionNav,
					dots: controlNav,
					dotsClass: 'qodef-slick-dots',
                    easing: 'easeInOutQuint',
					adaptiveHeight: true,
					prevArrow: '<span class="qodef-slick-prev qodef-prev-icon"><span class="arrow_carrot-left"></span></span>',
					nextArrow: '<span class="qodef-slick-next qodef-next-icon"><span class="arrow_carrot-right"></span></span>',
					customPaging: function(slider, i) {
						return '<span class="qodef-slick-dot-inner"></span>';
					}
				});

			});
			$('.qodef-single-album-reviews-holder').css('opacity', 1);
		}

	}

    function qodefInitArtists(){
        if($('.qodef-artists-list-holder').length) {

            var container = $('.qodef-artists-list-holder');

            container.waitForImages({
                finished: function(){
                    container.isotope({
                        itemSelector: '.qodef-artist',
                        resizable: false,
                        masonry: {
                            columnWidth: '.qodef-artists-grid-sizer',
                            gutter: '.qodef-artists-grid-gutter'
                        }
                    });
                },
                waitForAll: true
            });
        }
	}



})(jQuery);
