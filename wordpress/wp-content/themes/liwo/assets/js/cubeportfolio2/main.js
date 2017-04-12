(function ($, window, document, undefined) {

    var gridContainer = $('#grid-container'),
        filtersContainer = $('#filters-container');

	// init cubeportfolio
    gridContainer.cubeportfolio({

        animationType: 'slideDelay',

        gapHorizontal: 20,

        gapVertical: 20,

        gridAdjustment: 'responsive',

        caption: 'overlayBottomAlong',

        displayType: 'bottomToTop',

        displayTypeSpeed: 100,

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxShowCounter: true,

        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageShowCounter: true,
        singlePageCallback: function (url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
        },

        // singlePageInline
        singlePageInlineDelegate: '.cbp-singlePageInline',
        singlePageInlinePosition: 'above',
        singlePageInlineShowCounter: true,
        singlePageInlineCallback: function(url, element) {
            // to update singlePageInline content use the following method: this.updateSinglePageInline(yourContent)
        }
    });

    // add listener for inline filters click
    filtersContainer.on('click', '.cbp-filter-item', function (e) {

        var me = $(this);

        // get cubeportfolio data and check if is still animating (reposition) the items
        if ( !$.data(gridContainer[0], 'cubeportfolio').isAnimating ) {
            me.addClass('cbp-filter-item-active').siblings().removeClass('cbp-filter-item-active');
        }

        // filter the items
        gridContainer.cubeportfolio('filter', me.data('filter'), function () {});

    });

    // activate counter for filters
    gridContainer.cubeportfolio('showCounter', filtersContainer.find('.cbp-filter-item'));

})(jQuery, window, document);
