//ON LOAD OF MEDIA GRID PAGE
$(window).load(function(){
    //Build our ISO OBJ
    var iso = new Isotope('#media-grid',{
            itemSelector: '.item',
            layoutMode: 'fitRows'
        });
    
    //Setup the ISO filters
    $('#filters').on( 'click', 'a', function() {
        var filterValue = $( this ).attr('data-filter');
        // use filterFn if matches value        
        iso.arrange({ filter: filterValue });
        if(filterValue === '*'){
            $('.filter-name').text( ' All ' );
            displayRecordsCount('ALL');
        }else{
            $('.filter-name').text(filterValue.substring(1));   
            displayRecordsCount(filterValue);
        }        
    });
    
    //call our default record count on load
    var $recordCountFilter = 'ALL';
    displayRecordsCount($recordCountFilter);    
    
    function displayRecordsCount(filterVar){   
        //Store that incoming value to our main var for use in pagination updates             
        $recordCountFilter = filterVar;
        if(filterVar == 'ALL'){
            $('.filter-count').text($('#media-grid .item').length);                
            $('.filter-total').text($('#media-grid .item').length);
        }else{
            $('.filter-count').text($('#media-grid ' +filterVar).length);
            $('.filter-total').text($('#media-grid .item').length);
        }        
    }
    
    
    
    
    

    
    

    //Var to prevent multiply ajax calls
    var isLoading  = false; 

        //Handles scroll for infinite scroll feature, which doesnt work well with the filters
        //when a filter is selected it cant be scrolled, we need to build a single functoin to get/set the data
        //and two functions to haandle 1)InfiniteScroll / 2) Click for More Scroll
        $(window).scroll(function() { //detect page scroll
            if($(window).scrollTop() + $(window).height() === $(document).height())  //user scrolled to bottom of the page?
            {            
                //see if we have a link            
                if($("#media-pager").data('link') !== '' && isLoading === false)
                {
                    getNextPage();
                }           
            }
        });//end window scroll
    
    
    
    
    /*
     *  Handles the Click or Scroll For More     
     */
    $('#clickForMore').on('click', function(){
        //see if we have a link            
        if($("#media-pager").data('link') !== '' && isLoading === false)
        {
            getNextPage();
        }              
    });
        

    /*
     * 
     * @returns {undefined}
     * 
     * 
     * 
     */
    function getNextPage(){
        isLoading = true; //prevent further ajax loading
        
        $('.more-text').hide(); //show loading image
        $('.animation_image').show(); //show loading image
         
        if( typeof $("#media-pager").data('link') !== 'undefined'){                                    
            $.get('next', {max_id: $("#media-pager").data('link')}, function(data){                    
                //remove our old pager item
                $('#media-pager').remove();
                //add our new data which is a string format string to the html
                $('#media-grid').append(data);                    
                //select the new incoming items as DOM elements
                var newElements = $('#media-grid').children('.newpage');                                                            
                    //add those dom elements to isotop, and refresh
                    iso.appended(newElements);
                    //remove the newpage identifier class so the next batch of incoming will be ready
                    newElements.removeClass('newpage');      

                var imgLoad = imagesLoaded($('#media-grid'));
                    imgLoad.on('done', function(instance){
                    iso.layout();        
                });

                isLoading = false;                             
            }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                alert(thrownError); //alert with HTTP error
                    $('.animation_image').hide(); //hide loading image
                    $('.more-text').show(); //show loading image
                isLoading = false;
            }).done(function(){
                //call our recordCountUpdate using your storedFilterValue
                displayRecordsCount($recordCountFilter);   
                
                $('.animation_image').hide(); //hide loading image
                $('.more-text').show(); //show loading image
            });                    
        }else{
            //end of data feed            
           $('#clickForMore').text('End of Results');                          
        };        
    }//end nextPage

    


});//end window load
   
   
   
    function loadMediaModal($id){        
        var $mediaId = $id;
        if($mediaId.length >0){
            //Lets try to load media data for this modal
            var request = $.ajax({ 
                url: '/likeagram/explore/media',        
                type: "POST",
                cache: false,
                data: {"ajax":true,"mediaid":$mediaId}, 
                dataType: "html" 
              });	
              
              $("body").toggleClass("wait");
              request.done(function(request) { 
                try{   
                    //SANITIZE OR CHECK THIS RETURN BEFORE INSERTING
                    $('#mediaDetailModalWrapper').replaceWith(request);
                    
                    //document.getElementById("mediaDetailModalWrapper").innerHTML = request;
                    }//end try       
                catch(ex){
                        if(varDEBUG === true){
                            console.log(ex);
                        };
                        alert(ex.message);
                    }      //end catch
                finally{
                     $("body").toggleClass("wait");
                     $('#mediaDetailModal').modal('show');
                    }//end finally
              });//end request
        }//end if $mediaId > 0 
        
        return false; 
        
    }//end loadMediaModal   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    
   /****
   * 
   *    OLD CODE HERE, REMOVE AT SOME PIOINT
   * 
   *    LEFT FOR REFERENCE UNTIL COMPLETE
    */
   
     
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   /*
    $('#media-grid a').click(function(){ 
        var $mediaId = $(this).data("mediaid");
        if($mediaId.length >0){
            //Lets try to load media data for this modal
            var request = $.ajax({ 
                url: '/likeagram/explore/media',        
                type: "POST",
                cache: false,
                data: {"ajax":true,"mediaid":$(this).data("mediaid")}, 
                dataType: "html" 
              });	
              
              $("body").toggleClass("wait");
              request.done(function(request) { 
                try{   
                    //SANITIZE OR CHECK THIS RETURN BEFORE INSERTING
                    $('#mediaDetailModalWrapper').replaceWith(request);
                    
                    //document.getElementById("mediaDetailModalWrapper").innerHTML = request;
                    }//end try       
                catch(ex){
                        if(varDEBUG === true){
                            console.log(ex);
                        };
                        alert(ex.message);
                    }      //end catch
                finally{
                     $("body").toggleClass("wait");
                     $('#mediaDetailModal').modal('show');
                    }//end finally
              });//end request
        }//end if $mediaId > 0 
        
        return false; 
    });
*/


   
   
   
   
   
   
   
   

   
   
   /*can loop through all filter elements as needed */
   /*
    $('#filters').children('a').each(function(index){                
        //console.log(index + " : " + $(this).text() + " : " + $(this).data('tagcount') );        
    });
   */
  
  
  
    /*
     $('#media-grid').children('.item').each(function(index){                
       $(this).height( $("first-item").height() );        
    });
    */

  
   /*
   var filters = $('#media-grid .item').children('a');
   for(var i =0, len = filters.length; i < len; i++){
        console.log(filters);
    };
   */
   

//Keeps the Feed details Panel in view while the user scrolls
/*  When scrolling past it though, it breaks other things, and if the post is long, you cant scroll the post, so its kinda a fail maybe???
 *  i think the divs need to scroll only, maybe?
$().ready(function() {
        var $scrollingDiv = $("#feedDetails");

        $(window).scroll(function(){			
                $scrollingDiv
                        .stop()
                        .animate({"marginTop": ($(window).scrollTop() + 0) + "px"}, "slow" );			
        });
});
*/