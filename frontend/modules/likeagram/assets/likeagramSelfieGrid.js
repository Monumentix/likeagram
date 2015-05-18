/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


/*
    var iso = new Isotope('#selfieGrid',{
        itemSelector: '.selfieItem',
        (layoutMode: 'fitRows'
          masonry: {
            columnWidth: 185
            }
    }) ;

    iso.bindResize();
*/


    var timeout = setInterval(selfieGrid,6500);
    var selfiePage = 1;

    selfieGrid();

    function selfieGrid(){
        //Build our ISO OBJ
        $.get('selfie/next',{}, function(data){
        //add data to placeholder div to turn to dom object
        //and assign the correct page numbers
        $('#nextPagePlaceholder').append(data);
            if(selfiePage === 1){
                $('#nextPagePlaceholder').children().addClass(' first hidden');
            }
            if(selfiePage === 2){
                $('#nextPagePlaceholder').children().addClass(' second hidden');
            }
            if(selfiePage === 3){
                $('#nextPagePlaceholder').children().addClass(' third hidden');
            }
                //Create our grid oject
                var selfieGrid = $('#selfieGrid');

                var nextPageGrid = $('#nextPagePlaceholder');
                var newElements = nextPageGrid.children().slice(0);

                 selfieGrid.prepend(newElements);

                 /*
                $.each(newElements, function(i, val){
                    selfieGrid.append(val);
                      //iso.append(val);


                    if(selfiePage === 1){
                        $('#selfieGrid .second').remove();
                        selfiePage = 2;
                    }else if(selfiePage === 2){
                        $('#selfieGrid .third').remove();
                        selfiePage = 3;
                    }else if(selfiePage === 3){
                        $('#selfieGrid .first').remove();
                        selfiePage = 1;
                    }


                    $('#selfieGrid .tagWall').addClass('reveal');


                      //selfieGrid.prepend(val);

                        var imgLoad = imagesLoaded(selfieGrid);
                        imgLoad.on('done', function(instance){
                        //selfieGrid.height(window.innerHeight);
                        //iso.prepended(val);

                            //Get our old items of the dom
                            if(selfiePage === 1){
                                $('#selfieGrid .second').remove();
                                selfiePage = 2;
                            }else if(selfiePage === 2){
                                $('#selfieGrid .third').remove();
                                selfiePage = 3;
                            }else if(selfiePage === 3){
                                $('#selfieGrid .first').remove();
                                selfiePage = 1;
                            }

                    });

                  //  iso.layout();
                });
                */

                
                var imgLoad = imagesLoaded(selfieGrid);
                imgLoad.on('done', function(instance){
                    //Get our old items of the dom
                    if(selfiePage === 1){
                        $('#selfieGrid .second').remove();
                        selfiePage = 2;
                    }else if(selfiePage === 2){
                        $('#selfieGrid .third').remove();
                        selfiePage = 3;
                    }else if(selfiePage === 3){
                        $('#selfieGrid .first').remove();
                        selfiePage = 1;
                    }
                    $('#selfieGrid').children().removeClass('hidden');
                  //  iso.layout();
                });

                /*
                var imgLoad = imagesLoaded(selfieGrid);
                    imgLoad.on('done', function(instance){
                    //selfieGrid.height(window.innerHeight);
                    iso.prepended(newElements);
                        //Get our old items of the dom
                        if(selfiePage === 1){
                            $('#selfieGrid .second').remove();
                            selfiePage = 2;
                        }else if(selfiePage === 2){
                            $('#selfieGrid .third').remove();
                            selfiePage = 3;
                        }else if(selfiePage === 3){
                            $('#selfieGrid .first').remove();
                            selfiePage = 1;
                        }
                    iso.layout();
                });
                */




                //$('#nextPagePlaceholder .selfieItem').remove();
                //console.log(newElements);
                //var oldElements = selfieGrid.children();
                //console.log(oldElements);


                //$('#nextPagePlaceholder').remove().children();

               // $('#selfieGrid').remove(oldElements);
                //document.getElementById('#selfieGrid').append('TEST');

                //iso.prepended(newElements);

                /*
                var imgLoad = imagesLoaded($('#selfieGrid').children());
                    imgLoad.on('done', function(instance){
                    iso.layout();
                });   */
                //$('#selfieGrid .selfieItem').addClass('old');

                //isLoading = false;
            }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                alert(thrownError); //alert with HTTP error
                //isLoading = false;
            }).done(function(){
                    //alert('Hey there im done OK');
            });
        }//end selfieGrid



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
