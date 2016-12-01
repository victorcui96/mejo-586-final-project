$(document).ready(function() {
    "use strict";
    $('#fullpage').fullpage({
        afterRender: function() {},
        //Navigation
        anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
        menu: '#menu',
        // slidesNavigation: true,
        // slidesNavPosition: bottom,

        // Scrolling
        css3: true,
        easing: 'easeInOutCubic',
        easingcss3: 'ease',

        //Design
        controlArrows: true,
        verticalCentered: true,
        sectionsColor: ['#93F9FF', '#FFAF79', 'white', 'whitesmoke'],
        paddingTop: '3em',
        paddingBottom: '10px',
        responsiveWidth: 0,
        responsiveHeight: 0,
        // responsiveSlides: true,
        slidesNavigation: true,

        //Custom selectors
        lazyLoading: true
    });
    var wow = new WOW({
        mobile: false // default
    });
    wow.init();

    

    





});
