<!DOCTYPE HTML>
<html>
	<head>
		<title>About Scrimmers</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="icon" href="/images/favicon.gif" types="image/gif" >
		<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<a href="/about" class="logo">What is this now?</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="/">Home</a></li>
							<li class="active"><a href="/about">About</a></li>
							<?php
							require __DIR__ . '/../../server/navbar.php';
							if(activeUser()) {
								loggedInNav();
							}
							else {
								defaultNav();
							}
							 ?>
						</ul>
						<ul class="icons">
							<li><a href="https://github.com/smolltucc/scrimmersgg" class="icon fa-github"><span class="label">Github</span></a></li>
						</ul>
					</nav>
				<!-- Main -->
				<div id="main">

					<!-- Post -->
					<section class="post">
						<header class="major">
							<h1>For aspiring esports players</h1>
						</header>
					</section>
					<p>
					Finding people to practice can be annoying so we aim to make the experience
					a bit less so by providing players the means to quickly communicate their needs
					</p>
					

				</div>
				<!-- Footer -->
				<footer id="footer">
					<section>
					<h2 id="response">Feedback? We'd love that!</h2>
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
		<script src="/pages/js/about.js"></script>
	</body>
</html>
