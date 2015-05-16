/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


  function loadMediaModal($id){        
        var $mediaId = $id;
        if($mediaId.length >0){
            //Lets try to load media data for this modal
            var request = $.ajax({ 
                url: '/likeagram/search/media',        
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
   