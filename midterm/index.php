<!DOCTYPE html>
<html>
    <head>
        <title>Cinder</title>
        
        <link href= "css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
       
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
        <!-- ajax call to get categories api -->
        <script> 
            $(document).ready(function(){
                
                next = 0;
                $("#like, #dislike, #idk").click(function(){
                    next++;
                    
                    $.ajax({
                    type: "GET", 
                    url: "api/getMatch.php",
                    dataType: "json",
                    success: function(data, status)
                    {
                        console.log(data);
                        if(next < data.length)
                        {
                            $('#picture').html( '<img src="'+    data[next]['picture_url']+ '" height="400" width="400">');
                            $('#username').html("About @" + data[next]['username']);
                            $('#desc').html(data[next]['about_me']);
                        }
                    }
                });
                    
                });
                $.ajax({
                    type: "GET", 
                    url: "api/getMatch.php",
                    dataType: "json",
                    success: function(data, status)
                    {
                        console.log(data);
                        $('#picture').append( '<img src="'+    data[next]['picture_url']+ '" height="400" width="400">');
                        $('#username').append("About @" +data[next]['username']);
                        $('#desc').append(data[next]['about_me']);
                        
                    }
                });// end get caregories ajax call
                
                
            ////start of searchfrom call
            /*
            $("#searchForm").on("click", function() {
                $.ajax({
                    type: "GET",
                    url: "api/getSearchResults.php",
                    dataType: "json",
                    data: {
                        "product": $("[name=product]").val(),
                        "category": $("[name=category]").val(),
                        "priceFrom": $("[name=priceFrom]").val(),
                        "priceTo": $("[name=priceTo]").val(),
                        "orderBy": $("[name=orderBy]:checked").val(),

                    },
                    success: function(data, status){
                        $("#results").html("<h3> Products Found: </h3>");
                        data.forEach(function(key) {
                            $("#results").append("<a href='#' class='historyLink' id='" + 
                                                    key['productId'] + "'>History</a> ");
                            $("#results").append(key['productName'] + " " 
                            +  key['productDescription'] + " $" + key['price'] + "<br>");
                            
                        });
                    }
                    
                    
                });
            });
                // end of search form
            
            $(document).on('click', '.historyLink', function(){
                $('#purchaseHistoryModal').modal("show");
                $.ajax({
                    type: "GET",
                    url: "api/getPurchaseHistory.php",
                    dataType: "json",
                    data: {"productId" : $(this).attr("id")},
                    success: function(data, status) {
                        if(data.length != 0){
                            $("#history").html("");
                            $("#history").append(data[0]['productName'] + "<br />");
                            $("#history").append("<img src='" + data[0]['productImage'] + "' width='200' /> <br />");
                            data.forEach(function(key) {
                                $("#history").append("Purchase Date: " + key['purchaseDate'] + "<br>");
                                $("#history").append("Unit Price: " + key['unitPrice'] + "<br>")
                                $("#history").append("Quantity " + key['quantity'] + "<br>")
                            });
                        }
                        else {
                            $("#history").html("No purchase history for this item.");
                        }
                    }
                })
            });// end of history link
                
                */
            });// end of document ready
            
        </script>
        
        
        
    </head>
    <body>
        <!--Start of form div -->
        <div>
            <h1 id = "match">Match</h1>
    
        </div>
        
        
         
         
         
        <div class='about'>
            
                <div id = "picture"></div>
                <div id = "info">
                    <div id = "username"></div>
                    <div id = "desc"></div>
                </div>
        </div>
        
        <br>
        
        
        <div class ='buttons'>
            
            <div id="dislike"><button type="button">NO</button></div>
            <div id = "idk"><button type="button">?</button></div>
            <div id='like'><button type="button">YES</button></div>
        </div>
        
        <!--End of form div -->
        
        <hr> 
        <!--
        <div id="results"></div>
        <!-- Bootstrap modal 
        <div class="modal" tabindex="-1" role="dialog" id="purchaseHistoryModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Purchase History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="history">
                    
                </div>
              </div>
              <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
-->
    </body>
</html>






                
                
              