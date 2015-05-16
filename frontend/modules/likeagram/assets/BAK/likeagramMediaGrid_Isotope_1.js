 $(window).load(function() {
 var $mediaGrid = $('#media-grid');
     
     $mediaGrid.isotope({
               // options               
               itemSelector: '.item',                
           });
     
        
    var loading  = false; //to prevents multipal ajax loads    
    
    $(window).scroll(function() { //detect page scroll
        if($(window).scrollTop() + $(window).height() === $(document).height())  //user scrolled to bottom of the page?
        {
            //see if we have a link
            
            if($("#media-pager").data('link') !== '' && loading === false)
            {
                loading = true; //prevent further ajax loading
                $('.animation_image').show(); //show loading image
                
                //load data from the server using a HTTP POST request                
                //var urlLink = $("#media-pager").data("data-link");
                
                $.get('next', {max_id: $("#media-pager").data('link')}, function(data){
                    //since we got the page, remove the old link
                    $('#media-pager').remove();
                    //add our post data to the grid-sizer div, so that it will be converted to dom objects
                    $('.grid-sizer').append(data);                    

                    //Get each item, NOW that is a dom object, and add to isotope containers
                    var newData = $('.grid-sizer .item');
                        $mediaGrid.append(newData);
                        $mediaGrid.isotope('appended', newData);                        
                        $mediaGrid.isotope('arrange');                        
                    //hide loading image                   
                    $('.animation_image').hide(); //hide loading image once data is received
                    
                    console.log($('#media-grid > .item').width());
                    
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
