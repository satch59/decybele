(function($) {

    'use strict';

    $(document).ready(function(){
        initSingleArtists();
    });

    // Helper vars and functions.
    function extend( a, b ) {
        for( var key in b ) {
            if( b.hasOwnProperty( key ) ) {
                a[key] = b[key];
            }
        }
        return a;
    }

    /**
     * Record obj.
     */
    function Record(el) {
        this.wrapper = el;
        this.cover = this.wrapper.querySelector('.qodef-atrist-image-holder');
        this.position = this.wrapper.querySelector('.qodef-number');
        this.title = this.wrapper.querySelector('.qodef-name');
        this.stage = this.wrapper.querySelector('.qodef-stage');

        this.info = {
            coverImg : this.cover.querySelector('img').src,
            artist : this.title.innerHTML,
            title : this.stage.innerHTML
        };
    }

    /**
     * Position the record.
     */
    Record.prototype.layout = function(place) {
        switch(place) {
            case 'down' :
                dynamics.css(this.cover, { opacity: 1, translateY : qodef.windowHeight });
                dynamics.css(this.position, { opacity: 1, translateY : qodef.windowHeight - 200 });
                dynamics.css(this.title, { opacity: 1, translateY : qodef.windowHeight - 200 });
                dynamics.css(this.stage, { opacity: 1, translateY : qodef.windowHeight - 180 });
                break;
            case 'right' :
                dynamics.css(this.cover, { opacity: 1, translateX : qodef.windowWidth + 600 });
                dynamics.css(this.position, { opacity: 1, translateX : qodef.windowWidth + 150 });
                dynamics.css(this.title, { opacity: 1, translateX : qodef.windowWidth });
                dynamics.css(this.stage, { opacity: 1, translateX : qodef.windowWidth + 150 });
                break;
            case 'left' :
                dynamics.css(this.cover, { opacity: 1, translateX : -qodef.windowWidth - 600 });
                dynamics.css(this.position, { opacity: 1, translateX : -qodef.windowWidth - 150 });
                dynamics.css(this.title, { opacity: 1, translateX : -qodef.windowWidth });
                dynamics.css(this.stage, { opacity: 1, translateX : -qodef.windowWidth - 150 });
                break;
            case 'hidden' :
                dynamics.css(this.cover, { opacity: 0 });
                dynamics.css(this.position, { opacity: 0 });
                dynamics.css(this.title, { opacity: 0 });
                dynamics.css(this.stage, { opacity: 0 });
                break;
        };
    };

    /**
     * Animate the record.
     */
    Record.prototype.animate = function(direction, callback) {
        var duration = 600,
            type = dynamics.bezier,
            points = [{"x":0,"y":0,"cp":[{"x":0.2,"y":1}]},{"x":1,"y":1,"cp":[{"x":0.3,"y":1}]}],
            transform = {
                'left' : { translateX : -qodef.windowWidth, translateY : 0, opacity : 1 },
                'right' : { translateX : qodef.windowWidth, translateY : 0, opacity : 1 },
                'center' : { translateX : 0, translateY : 0, opacity : 1 }
            };

        dynamics.animate(this.cover, transform[direction], { duration : duration, type : type, points : points, complete : function() {
            if( typeof callback === 'function' ) {
                callback();
            }
        } });
        dynamics.animate(this.position, transform[direction], { duration : duration, type : type, points : points });
        dynamics.animate(this.title, transform[direction], { duration : duration, type : type, points : points });
        dynamics.animate(this.stage, transform[direction], { duration : duration, type : type, points : points });
    };

    /**
     * Slideshow obj.
     */
    function RecordSlideshow(el, options) {
        this.el = el;

        // Options/Settings.
        this.options = extend( {}, this.options );
        extend( this.options, options );

        // Slideshow items.
        this.records = [];
        var self = this;
        [].slice.call(this.el.querySelectorAll('.qodef-atrist-single')).forEach(function(el) {
            var record = new Record(el);
            self.records.push(record);
        });
        // Total items.
        this.recordsTotal = this.records.length;
        // Current record idx.
        this.current = 0;
        // Slideshow controls.
        this.ctrls = {
            next : this.el.querySelector('.qodef-controls-navigate > span.qodef-control-button-next'),
            prev : this.el.querySelector('.qodef-controls-navigate > span.qodef-control-button-prev'),
            back : this.el.querySelector('span.qodef-control-button-back')
        };

        this._initEvents();
    }

    /**
     * RecordSlideshow options/settings.
     */
    RecordSlideshow.prototype.options = {
        // On stop callback.
        onStop : function() { return false; }
    };

    /**
     * Shows the first record.
     */
    RecordSlideshow.prototype.start = function(pos) {
        this.current = pos;
        var currentRecord = this.records[this.current];
        $(currentRecord.wrapper).addClass('qodef-single-current');
        currentRecord.layout('down');
        currentRecord.animate('center');
    };

    /**
     * Init/Bind events.
     */
    RecordSlideshow.prototype._initEvents = function() {
        var self = this;
        this.ctrls.next.addEventListener('click', function() {
            self._navigate('right');
        });
        this.ctrls.prev.addEventListener('click', function() {
            self._navigate('left');
        });
        this.ctrls.back.addEventListener('click', function() {
            self._stop();
        });

    };

    /**
     * Navigate.
     */
    RecordSlideshow.prototype._navigate = function(direction) {

        var currentRecord = this.records[this.current];

        if( direction === 'right' ) {
            this.current = this.current < this.recordsTotal - 1 ? this.current + 1 : 0;
        }
        else {
            this.current = this.current > 0 ? this.current - 1 : this.recordsTotal - 1;
        }

        var nextRecord = this.records[this.current];
        $(nextRecord.wrapper).addClass('qodef-single-current');

        currentRecord.animate(direction === 'right' ? 'left' : 'right', function() {
            $(currentRecord.wrapper).removeClass('qodef-single-current');
        });

        nextRecord.layout(direction);
        nextRecord.animate('center');
    };

    /**
     * Stop the slideshow.
     */
    RecordSlideshow.prototype._stop = function() {
        qodef.modules.common.qodefEnableScroll();
        var currentRecord = this.records[this.current];
        currentRecord.layout('hidden');
        $(currentRecord.wrapper).removeClass('qodef-single-current');

        // Callback.
        this.options.onStop();
    };

    /* UI */

    // Single/Slideshow views.
    if(document.querySelector('.qodef-artists-list-holder-outer ') !== null) {
        var views = {
                list: document.querySelector('.qodef-artists-list-holder'),
                single: document.querySelector('.qodef-artist-view-single')
            },
            // The initial list items.
            lps = [].slice.call(views.list.querySelectorAll('.qodef-artist')),
            expanderEl = document.querySelector('.qodef-artist-single-expander'),
            slideshow;
    }

    /**
     * Initialize events.
     */
    function initSingleArtists() {
        if(document.querySelector('.qodef-artists-list-holder-outer ') !== null) {
            initEvents();
            // Initialize slideshow.
            slideshow = new RecordSlideshow(document.querySelector('.qodef-artist-view-single'), {
                // Stopping/Closing the slideshow: return to the initial list.
                onStop: function () {
                    changeView('single', 'list');
                    hideExpander();
                }
            });
        }
    }

    function changeView(old, current) {
        $(views[old]).removeClass('qodef-view-current');
        $(views[current]).addClass('qodef-view-current');
    }

    function initEvents() {
        lps.forEach(function(lp, pos) {
            $(lp).on('click', function(e) {
                e.preventDefault();
                qodef.modules.common.qodefDisableScroll();

                showExpander({x: e.clientX, y: e.clientY}, function() {
                    changeView('list', 'single');
                });
                // Start the slideshow.
                setTimeout(function() { slideshow.start(pos);}, 80);
            });
        });
    }

    function showExpander(position, callback) {
        $(expanderEl).addClass('active');
        qodef.body.addClass('qodef-records-slideshow-active');

        dynamics.css(expanderEl, { opacity: 1, left : position.x, top : position.y, backgroundColor : '#f4f4f4', scale : 0 });
        dynamics.animate(expanderEl, {
            scale : 1.5,
            backgroundColor : '#f4f4f4'
        }, {
            duration : 500,
            type : dynamics.easeOut,
            complete : function() {
                if( typeof callback === 'function' ) {
                    callback();
                }
            }
        });
    }

    function hideExpander() {
        dynamics.css(expanderEl, { left : window.innerWidth/2, top : window.innerHeight/2 });
        dynamics.animate(expanderEl, {
            opacity : 0
        }, {
            duration : 500,
            type : dynamics.easeOut,
            complete: function(){
                $(expanderEl).removeClass('active');
                qodef.body.removeClass('qodef-records-slideshow-active');
            }
        });
    }


})(jQuery);