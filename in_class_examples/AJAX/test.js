	function getForecast() {        
      $.ajax({
          
          type: "get",
          url:"api.openweathermap.org/data/2.5/weather?zip=93933,us&appid=a631529353cb009ce12f9d9a2b1ec92c",
          //dataType: "json",
    
          success: function(data) {
              console.log(data);
          }
          
         });
    }