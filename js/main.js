
// Adds 0 left margin to the first thumbnail on each row that don't get it via CSS rules
function fixThumbnailMargins() {
    $('.row-fluid .thumbnails').each(function () {
        var $thumbnails = $(this).children(),
            previousOffsetLeft = $thumbnails.first().offset().left;
        $thumbnails.removeClass('first-in-row');
        $thumbnails.first().addClass('first-in-row');
        $thumbnails.each(function () {
            var $thumbnail = $(this),
                offsetLeft = $thumbnail.offset().left;
            if (offsetLeft < previousOffsetLeft) {
                $thumbnail.addClass('first-in-row');
            }
            previousOffsetLeft = offsetLeft;
        });
    });
}

// Fix the margins when potentally the floating changed
$(window).resize(fixThumbnailMargins);

// equalizes the heights of thumbnail boxes
function equalHeight(group) {    
    tallest = 0;    
    group.each(function() {       
        thisHeight = $(this).height();       
        if(thisHeight > tallest) {          
            tallest = thisHeight;       
        }    
    });    
    group.each(function() { $(this).height(tallest); });
}


$(document).ready(function() {
	
  // equalheight
  equalHeight($(".equalize"));

  // tooltips
  $("[rel='tooltip']").tooltip();

  // nicescroll
  $("html").niceScroll({cursorborder:"",cursorcolor:"#666",boxzoom:true});

  // fix thumbnails
  fixThumbnailMargins();

});