<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
        <script
            src="https://code.jquery.com/jquery-3.4.0.js"
            integrity="sha256-DYZMCC8HTC+QDr5QNaIcfR7VSPtcISykd+6eSmBW5qo="
            crossorigin="anonymous">
            
        </script>
         <link href="styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
        <!--<button id='button' type="button">GO</button>-->
        <div class="results"></div>
        <!--EXAMPLE -->
        
        <div class='main-content-container'>
            
            <div class='container' id="result0"> </div>
            <div class='container' id="result1"></div>
            <div class='container' id="result2"></div>
            <div class='container' id="result3"> </div>
            <div class='container' id="result4"></div>
            <div class='container' id="result5"> </div>
            <div class='container' id="result6"> </div>
            <div class='container' id="result7"></div>
            <div class='container' id="result8"></div>
        </div>
        
        
        
          Search: <input type="text" name="search" id="searchField"><br>
          
          <button id="search" type="button">Click Me!</button>

      
        
        
        
       
        

    </body>
</html>







<script>
    
    // store the pictures in array
    var pictureResults = [];
    var searchQuery 
    
    // on click function
    $( "#search" ).click(function() {
      searchQuery = $( "#searchField" ).val();
    
    
        $.ajax({  
        type: "GET",
        url: "pictures.php",
        dataType: "json",
        data:{query: searchQuery},
    
        success: function(data){
            
            pictureResults.push(data);
            //pictureResults=data;
            //console.log(data.hits[0]['largeImageURL']);
            //console.log(pictureResults[0].hits[0].largeImageURL);
            
            //$( ".results" ).append(pictureResults[0].hits[0].largeImageURL); 
            $( ".container" ).each(function( index ) {
                $(this).html("<img src="+ pictureResults[0].hits[index].largeImageURL +  'alt="Smiley face" height="150" width="150">');
            });
            //<img src="smiley.gif" alt="Smiley face" height="42" width="42">

            //$( ".results" ).append(pictureResults[0].hits[0].largeImageURL);
        }
        });
  
});

// on press of button the pictures are displayed.
/*
$( "#button" ).click(function() {
  $( ".results" ).append(pictureResults[0].hits[0].largeImageURL);
});
*/
//$( ".results" ).append(pictureResults[0].hits[0].largeImageURL);
       



    
    
    
</script>




