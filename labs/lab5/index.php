<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <title>AJAX: Sign Up Page</title>
  
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<body id="dummybodyid">
  

  
  
  <!-----------------BOOTSTRAP HTML----------------------------------->
  
  
  <div class="container">
    <h1 class="well">Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
	  
	  
				<form id = "signUp" action = "index.php" method = "POST">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>First Name</label>
								<input type="text" placeholder="Enter First Name Here.." class="form-control">
							</div>
							<div class="col-sm-6 form-group">
								<label>Last Name</label>
								<input type="text" placeholder="Enter Last Name Here.." class="form-control">
							</div>
						</div>					
						<div class="form-group">
							<label>Email</label>
							<div><input type="text" placeholder="Enter Email Here.."  class="form-control"></div>
						
						</div>	
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" placeholder="Enter City Name Here.." class="form-control" id = "city">
							</div>	
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text" placeholder="Enter State Abrviation Here.." class="form-control" id ="state" onchange = "getCounty()">
							  <label id = "stateErr"></label>
							</div>	
							<div class="col-sm-4 form-group">
								<label>Zip</label>
								<input type="text" placeholder="Enter Zip Code Here.." class="form-control" id ="zip" onchange = "getZip()">
							  <label id = "zipErr"></label>
							</div>		
						</div>
					
			
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>Latitude</label>
								<input type="text" placeholder="Latitude" class="form-control" id ="lat">
							</div>
							<div class="col-sm-4 form-group">
								<label>Longitude</label>
								<input type="text" placeholder="Longitude" class="form-control" id = "long">
							</div>
							<div class="col-sm-4 form-group">
                <label>Select a County:</label>
                <select class="form-control" id = "countyList" >
                </select>
            </div>
						</div>
						
						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" placeholder="Enter Phone Number Here.." class="form-control">
					</div>		
					<div class="form-group">
						<label>Desired UserName</label>
						<input type="text" placeholder="Enter User Name Here.." class="form-control"id = "userName"  name = "user_name"> 
						<label id = "userNameErr"></label>
					</div>	
					
					
					
					
					
					
					<div class="row">
							<div class="col-sm-6 form-group">
								<label>Password</label>
								<input type="password" placeholder="Enter Password Here.." class="form-control" id = "password1">
							</div>		
							<div class="col-sm-6 form-group">
								<label>Retype Password</label>
								<input type="password" placeholder="Retype Password Here.." class="form-control" id = "password2">
							</div>	
					</div>						
					
					
					
					
					<button type="submit" class="btn btn-lg btn-info">Submit</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
<!--------------------javascript/ jquery / ajax --------------------------------->
  
  
  <script type="text/javascript" >
    
    var zip;
    var state;
    var userName;
    
    function getZip()
    {
      var data = $('#zip').val().toString()
      if(data.length== 5)
      {
       zip = data;
      }
    
    
    $.ajax({
      
      type: "GET",
      url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php?zip="+ zip,
      dataType: "json",
      
      success: function(data){
        $('#zipErr').html("")
        $('#city').val(data['city'])
        $('#lat').val((data['latitude']))
        $('#long').val((data['longitude']))
      },
      error: function (xhr,status,error) {
             
            $('#zipErr').html("Zip code Not Found")
             
          },
     
    })
    
    
    }
    
    
    function getCounty()
    {
       state = $('#state').val().toString()
       
       
       $.ajax({
      
          type: "GET",
          url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php?state="+ state,
          dataType: "json",
          
          success: function(data){
            if(data.length == 0)
            {
              $('#stateErr').html("Wrong Abreviation")
            }
            else
            {
              $('#stateErr').html("")
              $("#countyList").empty()
               $.each(data, function (index)
               {
                 //console.log(data[1]["county"])
                 
                  $("#countyList").append($('<option value = '+ data[index]["county"] + '>' + data[index]["county"] + ' </option>'))
               });
            }
          },
          error: function (xhr,status,error) {
                 
                $('#stateErr').html("Wrong Abreviation")
                 
              }
     
      })
   
    }
    
/*
    function getUserName()
    {
       userName = $('#userName').val().toString()
       //produce a number from 0 to 1
       
       var validName = Math.round(Math.random()) ;
       // "check" if username is available
       if(validName == 1)
       {
          $("#userNameErr").html("UserName is Available").css("color", "green")
       }
       else 
       {
         $("#userNameErr").html("UserName is Taken").css("color", "red")
       }
      
    }
*/


    $( "#signUp" ).submit(function( event ) {
      if( $("#password1").val() == $("#password2").val() )
      {
        console.log("pswrd match")
        return;
      }
      if( $("#password1").val() != $("#password2").val() )
      {
        alert("Passwords do not match")
        event.preventDefault();
      }
  
});
    
    
    
    
    
    
    
    
    
    /////// validate username

var formData = $('#signUp').serialize();

    $(document).on( 'change', '#userName', function(e) {
        $.ajax({
            type: "POST",
            url: "validate.php",
            dataType: "json",
            data: formData,
            success: function(data) {
               //console.log(JSON.parse(data));
                console.log(data);
            },
            error: function(err) {
                console.log(arguments);  
            },
            complete: function(data, status) {
              // Called whether success or error
              //console.log(status);
            }
        });
    });
    
    
    
    
    
    
    
    
    
    
    
  </script>
  
  
  
  <!-------------------- --------------------------------->

  
  <!--------------------PHP --------------------------------->

  
  
  
  
  
  
  
  
  
  
  
  
</body>

</html>


