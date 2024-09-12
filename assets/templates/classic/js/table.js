(function ($) {
     "use strict";

     $('.add-table').on('click', function (e) {
          e.preventDefault();
  console.log("Test");
          $('#add-table-form').trigger('reset');
  
          $.magnificPopup.open({
              items: {
                  src: '#add-table-dialog',
                  type: 'inline',
                  fixedContentPos: false,
                  fixedBgPos: true,
                  overflowY: 'auto',
                  closeBtnInside: true,
                  preloader: false,
                  midClick: true,
                  removalDelay: 300,
                  mainClass: 'my-mfp-zoom-in'
              }
          });
      });

})(jQuery);; 