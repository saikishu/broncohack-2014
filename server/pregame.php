<?php
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <!-- WARNING: for iOS 7, remove the width=device-width and height=device-height attributes. See https://issues.apache.org/jira/browse/CB-4323 -->
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, target-densitydpi=device-dpi" />
    
    <title>Fan Zone</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/foundation-icons.css" />
    <link href="css/video-js.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    
    <script src="js/vendor/modernizr.js"></script>
    
    <script src="js/video.js"></script>

      <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "js/video-js.swf";
  </script>

  </head>
  <body>
      
      <div class="sticky">
          <nav class="top-bar" data-topbar>
              <div class="text-center"><img src="img/logo.png" height="22"/>&nbsp;San Jose Earth Quakes Fan Zone</div>
          </nav>
          <p class="text-center app-download"><span class="label success radius">Download</span>&nbsp;our app for ultimate Game Experience</p>
      </div>
      
      <div class="player">
         <video id="mobile-player" width="100%" height="360" preload controls>
            <source src="http://172.16.23.62:8888/uploads/videos/starter.mov" />
          </video>
      </div>
       
      <div class="countdown text-center" onclick="inGame();">
            <p>Experience In-Game</p>
            <div class="counters">
                <span class="small button radius" id="d"></span>
                <span class="small button radius" id="h"></span>
                <span class="small button radius" id="m"></span>
                <span class="small button radius" id="s"></span>
            </div>
            <div class="upcoming">
                <img src="img/upcoming.jpg" width="100%"/>
            </div>
      </div>
      
      
      
      
      <script src="js/vendor/jquery.js"></script>
      <script src="js/foundation.min.js"></script>
    
      <script type="text/javascript">
          $(document).foundation();
         
      //Counters
      
      // set the date we're counting down to
      var target_date = new Date("May 25, 2014 19:45:00").getTime();
      
      // variables for time units
      var days, hours, minutes, seconds;
      var gap = 0;
      var player =  document.getElementById('mobile-player');
      var key = new Date(); //timestamp as session key. -> temporary
      
      // update the tag with id "countdown" every 1 second
      setInterval(function () {
                  
                  // find the amount of "seconds" between now and target
                  var current_date = new Date().getTime();
                  var seconds_left = (target_date - current_date) / 1000;
                  
                  if(gap % 5 == 0) {
                    //for every 5 secs update video
                 
                  $.post("http://172.16.23.62:8888/api.php", { session: key, call:"fetch_new_video" })
                  .done(function( data ) {
                        if(data == "nomore") {
                            //do nothing
                        } else
                        {
                            player.setAttribute("src", data);
                            player.load();
                            player.play();
                            //var isPlaying = player.paused();
                            //alert(isPlaying);
                            //if(isPlaying) { //only if playing keep looping
                            //    player.play();
                           // }
                        }
                    });
                  
                  
                  
                  }
                  gap = gap + 1;
                  
                  // do some time calculations
                  days = parseInt(seconds_left / 86400);
                  var dBlock = document.getElementById("d")
                  dBlock.innerHTML = days + " <br><span class=\"legends\">days</span>";
                  seconds_left = seconds_left % 86400;
                  
                  hours = parseInt(seconds_left / 3600);
                  seconds_left = seconds_left % 3600;
                  document.getElementById("h").innerHTML = hours+ " <br><span class=\"legends\">hrs</span>";;
                  
                  minutes = parseInt(seconds_left / 60);
                  document.getElementById("m").innerHTML = minutes + " <br><span class=\"legends\">mins</span>";;
                  
                  seconds = parseInt(seconds_left % 60);
                  document.getElementById("s").innerHTML = seconds+ " <br><span class=\"legends\">secs</span>";;
                  
                  }, 1000);
      
      //Function inGame();
      
      function inGame() {
          window.location.href = "http://172.16.23.62:8888/";
      }
 
      </script>
  </body>
</html>
