<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $user_data['username'];?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="icon" href="/images/favicon.gif" types="image/gif" >
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script
		src="http://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script>
    	<script src="../../calendar/index.js"></script>
    	<link rel="stylesheet" href="../../calendar/style_view.css">
		
	</head>
	<body class="is-preload">
		<div id="wrapper">
		
			<header id="header">
				<?php
				echo '<a href="/user/'.$user_data['username'].'" class="logo">' . $user_data['username'] . '</a>';
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
			<div id = "main">
				<section class = "post">
					<div class = "row">
						<div class ="col-6 col-12-small">
							<h2>Bio</h2>
							<?php 
							if($user_data['user_bio'] != null) {
								echo htmlspecialchars($user_data['user_bio']);
							}
							else {
								echo '<p>User has no bio</p>';
							}
							?>
							<h2>Links</h2>
							<?php 
							if($user_data['user_links']) {
								echo htmlspecialchars($user_data['user_links']);
							}
							else {
								echo '<p>No links here ;O;</p>';
							}
							?>
						</div>
						<div class ="col-6 col-12-small">
							<h2>Games</h2>
							<?php 
							if($user_data['user_games'] != null) {
								echo htmlspecialchars($user_data['user_games']);
							}
							else {
								echo '<p>No games found here ;-;</p>';
							}
							?>
						</div>
					</div>
				</section>
				<section id="user-schedule" class="post">
					<header>
						<h2>Available Times</h2>
						<div id="scheduleUser">
							<div id='cal'>
								<h5>
									<div id="day-schedule">
									</div>
								</h5>
							</div>
						</div>
						<?php
						if($_SESSION['username'] == $_SESSION['atPage']) {
							echo "<form><input type='button' value='Edit Your Schedule' id='editBtn'></form>";
						}						
						?>
					</header>
				</section>
			</div>
			
		</div>
		<script>
			var str = "";
			var arr = [];
			var timeArr = [];
			var scheduleObj = {};
			
			(function ($) {
				console.log("here")
				$.ajax({
					type: "GET",
					url: "/scheduleView",
					dataType: "text",
					success: function(data, status) {
						console.log("Get schedule -> done");
						str = JSON.parse(data);
						for (var i = 0; i < str.length; i++)
						{
							arr.push(str[i].user_schedule);
						}
						for (var i = 0; i < arr.length; i++)
						{
							timeArr.push(arr[i]);
							
						}
						
						var scheduleJson = JSON.parse(timeArr)
						getSchedule(scheduleJson);
						$("#day-schedule").data('artsy.dayScheduleSelector').deserialize(scheduleObj);
					},
					error: function(){
					}            
				});
				$("#day-schedule").dayScheduleSelector({
					days: [0, 1, 2, 3, 4, 5, 6],
					interval: 60,
					startTime: '00:00',
					endTime: '23:59',
					stringDays  : ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
					disableDays: [0, 6]
				});
				
				
				function getSchedule(schedule)
				{   
					
					var dayTime = [];
					var canInsert = false;
					for (var i = 0; i < schedule.length; i++) 
					{
					if (day !== schedule[i][0].day) {
						var dayTime = [];
					}
					var timeOfDay = [];              
					var hour = 0;
					var day = "";
					var j = 0;
					var next = 0;
					while (schedule[i][j] !== undefined)
					{
						day = schedule[i][j].day;      
						next = j + 1;
						if (schedule[i][next] !== undefined && schedule[i][next].day !== day)
						{
						canInsert = true;
						}
						if (j === 0)
						{
						var time = schedule[i][j].time;
						timeOfDay.push(time);
						if (schedule[i][next] === undefined) {
							canInsert = true;
							var time = parseInt(schedule[i][j].time);
							if (time < 10) {
							var realTime = "0"+(time+1) + ":00";
							}
							else {
							var realTime = time + ":59";
							}
							timeOfDay.push(realTime);
							dayTime.push(timeOfDay);
						}
						}
						else 
						{
						if (schedule[i][next] === undefined)
						{
							canInsert = true;
							var time = parseInt(schedule[i][j].time);
							if (time < 10) {
							var realTime = "0"+(time+1) + ":00";
							}
							else {
							var realTime = time + ":59";
							}
							timeOfDay.push(realTime);
							dayTime.push(timeOfDay);
						} 
						} 
						j++;
					}
					if (canInsert)
					{
						scheduleObj[day] = dayTime;
						canInsert = false;
					}
					}
				}
				$('#editBtn').on('click', function() {
					$(location).attr('href', '/mySchedule');
				})
			})($);
 		</script>

		<footer id="footer">
			<?php
			// Attempt to only ever show the message box if the user is logged in
			if(!activeUser()) {
				echo '<h2>Login to send ' . $user_data['username'] . 'a message</h2>';
				exit;
			}
			// make sure users can't message themselves
			if($_SESSION['username'] == $user_data['username']) {
				exit;
			}
			?>
			<section>
				<form>
					<div class="fields">
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="3"></textarea>
						</div>
					</div>
					<input id="submit" type="button" value="Send Message" />
				</form>
			</section>
		</footer>
		<!-- Scripts -->
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/jquery.scrollex.min.js"></script>
		<script src="/assets/js/jquery.scrolly.min.js"></script>
		<script src="/assets/js/browser.min.js"></script>
		<script src="/assets/js/breakpoints.min.js"></script>
		<script src="/assets/js/util.js"></script>
		<script src="/assets/js/main.js"></script>
		<?php
		// only give the js back if they are not the same person
		if($_SESSION['username'] != $user_data['username']) {
			echo '<script src="/pages/js/userPage.js"></script>';
		}
		?>
	</body>                        
</html>


<!-- <div class = "row"> -->
<!-- 	 -->
<!-- </div> -->
