$(document).ready(function() {
    $('#fullpage').fullpage({
        //Navigation
        anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
        menu: '#menu',

        // Scrolling
        css3: true,

        //Design
        controlArrows: true,
        verticalCentered: true,
        sectionsColor: ['#93F9FF', '#FFAF79', '#67D2D9', '#DE874E'],
        paddingTop: '3em',
        paddingBottom: '10px',
        responsiveWidth: 0,
        responsiveHeight: 0,
        responsiveSlides: true,

        //Custom selectors
        lazyLoading: true
    });
});
