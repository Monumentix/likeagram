    

$(document).ready(function() {
        
    var $container = $('#media-grid');
    // init
    $container.packery({
      columnWidth: '.grid-sizer',  
      itemSelector: '.item',
      gutter: 10,
      rowHeight: 145,
      transitionDuration: "1.0s",
    });
    
    var loading  = false; //to prevents multipal ajax loads    
    
    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
        {
            //see if we have a link
            if($("#media-pager").data('link') != '' && loading == false)
            {
                loading = true; //prevent further ajax loading
                $('.animation_image').show(); //show loading image
                
                //load data from the server using a HTTP POST request                
                //var urlLink = $("#media-pager").data("data-link");
                
                $.get('next', {max_id: $("#media-pager").data('link')}, function(data){
                    //since we got the page, remove the old link
                    $('#media-pager').remove();
                   //add new data, to dom, and packery, and then reload/refresh
                    $container.append(data);
                    $container.packery('appended', data);
                    $container.packery('reloadItems');
                    $container.packery();
                    //hide loading image
                   
                    $('.animation_image').hide(); //hide loading image once data is received
                    
                    //track_load++; //loaded group increment
                   loading = false; 
                
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                    
                    alert(thrownError); //alert with HTTP error
                    $('.animation_image').hide(); //hide loading image
                    loading = false;
                
                });
                
            }
        }
    });
});
