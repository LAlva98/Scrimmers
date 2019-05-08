<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script
    src="http://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <script src="../../calendar/index.js"></script>
    <link rel="stylesheet" href="../../calendar/style_calendar.css">

    <link rel="stylesheet" href="../../assets/css/main.css" />
    
  </head>
  <body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
          <header id="header">
            <?php
            echo '<a href="/user/'.$_SESSION['username'].'" class="logo">' . $_SESSION['username'] . '</a>';
            ?>
          </header>
          
          <!-- Navbar -->
          <nav id = "nav">
            <ul class="links">
              <li><a href="/">Home</a></li>
              <li><a href="/about">About</a></li>
              <?php
              require __DIR__ . '/../../server/navbar.php';
              if(!empty($_SESSION)) {
                if(activeUser()) {
                  loggedInNav();
                }
                else {
                  defaultNav();
                }
              }
              else {
                defaultNav();
              }
              ?>
            </ul><ul class="icons">
              <li><a href="https://github.com/smolltucc/scrimmersgg" class="icon fa-github"><span class="label">Github</span></a></li>
            </ul>
          </nav>

          <div id="main">           
              <h2>Schedule selector:</h2><br>
              <div id='cal'>
                <h5>Select your schedule by clicking on the calendar, then submit it by clicking on the button at the end of the page.</h5>
                <h5>
                  <div id="day-schedule">
                  </div>
                </h5>
              </div>
              <form>
                <input type="button" value='Submit Your Schedule' id='selectedBtn'>
              </form>
          </div>
    </div>
    <script>
      let str = [];
      (function ($) {
          $("#day-schedule").dayScheduleSelector({
              days: [0, 1, 2, 3, 4, 5, 6],
              interval: 60,
              startTime: '00:00',
              endTime: '23:59',
              stringDays  : ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          });
          $("#day-schedule").on('selected.artsy.dayScheduleSelector', function (e, selected) 
          {
              var arr = "{";
              var s = "";
              for (var i = 0; i < selected.length; i++)
              {
                  arr +='"'+ i +'":';
                  arr+= JSON.stringify(selected[i].dataset);
                  if (i !== selected.length - 1)
                    arr += ","
              }
              arr += "}";
              str.push(JSON.parse(arr));
          })
          $("#day-schedule").data('artsy.dayScheduleSelector').deserialize(
          {

          });
      })($);

      $('#selectedBtn').on("click",function()
      {
          console.log(str);
          $.ajax({
            type: "POST",
            url: "/schedule",
            dataType: "text",
            data: {'schedule': JSON.stringify(str)},
            success: function(data, status) {
                console.log("Send schedule -> done");
                $(location).attr('href', '/user/' + data);

            }
            
          });
      });
  </script>
  </body>
</html>