<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    </head>
    <body>
        
        
        
        <ul class="menu">
          <li><a href="#" class="active">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">Contact</a></li>
          
        </ul>

<!--       table to display information   -->
    <table class="table1 tbl-header">
      
            <tr class="w3">
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Duration</th>
                <th>Booked By</th>
                <th></th>
                <th></th>

            </tr>
        
        
        
    </table>
        <table class="table1">
        <tbody id="mydata" class="tbl-content">
        </tbody>
    </table>
<!--     END OF TABLE     -->




<div class="bg-modal">
    <div class = "modal-content" >
        <div class="modal-title"><div class='title'>Add Time Slot</div></div>
        <form class="modal-form">
            
            
            <input type="text" placeholder="dd/mm/yyyy" class="modal-input" id="new-slot-date">
            <input type="text" placeholder="Start Time" class="modal-input" id="new-slot-start">
            <input type="text" placeholder="End Time" class="modal-input" id="new-slot-end">
            
            

        </form>
        
        <div class="modal-buttons">
            <button type="button" class="cancel-btn">Cancel</button>
            <button type="button" class="add-btn">Add</button>
        </div>
        
    </div>
</div>


<!--Confirmation button-->
 <div class="bg-delete">
    <div class="delete-modal">
        <div id="s_time"></div>
        <div id="e_time"></div>
        <div>Are You Sure You Want To Delete?</div>
        <div class="confirm-buttons">
            <button type="button" class="Yes-btn">Yes</button>
            <button type="button" class="No-btn">No</button>
        </div>
    </div>
    
</div>  


<!--<button type="button" id="test_button">Click ME!</button>-->
<button type="button" id="initial-add-button">Add a Timeslot</button>










 <script> 
$(document).ready(function(){
    $('.bg-modal').hide();
    $('.bg-delete').hide();
 
            //$('#test_button').on('click',function(){
                
            
                $.ajax({
                    type: "GET",
                    url: "api/getUserApp.php",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        $("#mydata").empty();
                        for(i=0; i<data.length; i++) {
                            
                            $("#mydata").append(`<tr>   
                                                        <th>`+data[i]['date']+ `</th>
                                                        <th>`+data[i]['start_time']+ `</th>
                                                        <th>`+data[i]['end_time']+ `</th>
                                                        <th>`+data[i]['duration']+ `</th>
                                                        <th>`+data[i]['booked_by']+ `</th>
                                                        <th><button class="details-btn">Details</button></th>
                                                        <th><button class="delete-btn" id="`+data[i]['id']+`">Delete</button></th>
                                                </tr>` )
                        }
                       
                        
                    }
                       
                    
                })
            //});// end of get Appointments for user. 

            
        //add time slot
        $('.add-btn').on('click',function(){
                
                var date = $('#new-slot-date').val();
                var start = $('#new-slot-start').val().replace(/am|pm/gi, "");
                var end = $('#new-slot-end').val().replace(/am|pm/gi, "");
                var start_am_pm = $('#new-slot-start').val().replace(/[0-9]/gi, "").toUpperCase();
                var end_am_pm = $('#new-slot-end').val().replace(/[0-9]/gi, "").toUpperCase();
                /*
                console.log($('#new-slot-date').val());
                console.log($('#new-slot-start').val());
                console.log($('#new-slot-end').val());
                */
                //console.log(start_am_pm);
                $.ajax({
                    type: "POST",
                    url: "api/addSlot.php",
                    dataType: "json",
                    data:{
                        "date":date,
                        "new_start_t":start,
                        "new_end_t":end,
                        "start_am_pm":start_am_pm,
                        "end_am_pm":end_am_pm
                        
                    },
                    success: function(data) {
                        
                    }
                })
                $('.bg-modal').hide();
                location.reload();
            }); 





          
        
       





        /// ask for delete confirmation
$('body').on('click', '.delete-btn', function() {
    
    $('.bg-delete').show();
     var id = $(this).attr('id')
    console.log(id)
    
        $.ajax({
                    type: "POST",
                    url: "api/getRecord.php",
                    dataType: "json",
                    data:{
                        "id_to_delete":id
                        
                    },
                    success: function(data) 
                    {
                        console.log(data);
                        $("#s_time").html("Start Time: "+data[0]["date"]+"     "+ data[0]["start_time"]);
                        $("#e_time").html("End Time: "+ data[0]["date"]+"     "+data[0]["end_time"])
                        
                    }
                })
                
        $('.Yes-btn').on('click', function(){ 
            $.ajax({
                    type: "POST",
                    url: "api/deleteRecord.php",
                    dataType: "json",
                    data:{
                        "id_to_delete":id
                        
                    },
                    success: function(data) {
                        
                    }
                })
                $('.bg-delete').hide();
                location.reload();
        })     
                
        
});
        
        
        
        
        
        
        
        
        
        
        
        // add button
        $('#initial-add-button').on('click', function(){ 
            $('.bg-modal').show();
        })
        
        $('.cancel-btn').on('click', function(){ 
            $('.bg-modal').hide();
        })
        $('.No-btn').on('click', function(){ 
            $('.bg-delete').hide();
        })
        
        
        
        
        
            
});

 </script> 

    </body>
</html>