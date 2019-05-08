<!DOCTYPE HTML>
<html>
	<head>
		<title>Scrimers.gg</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="icon" href="/images/favicon.gif" types="image/gif" >
		<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">
				<!-- Intro -->
					<div id="intro">
						<h1>Scrimmers.gg</h1>
						<p>"Werks on my machine" - everyone 2k19 GOTY Edition</p>
						<ul class="actions">
							<li><a href="#main" class="button icon solo fa-arrow-down scrolly">"Werks on my machine" -everyone 2k19 GOTY Edition</a></li>
						</ul>
					</div>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li class="active"><a href="#main" class="scrolly">Home</a></li>
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
						</ul>
						<ul class="icons">
							<li><a href="https://github.com/smolltucc/scrimmersgg" class="icon fa-github"><span class="label">GitHub</span></a></li>
						</ul>
					</nav>
				<!-- Main -->
					<div id="main">
						<!-- Posts -->
							<!-- Try to stick to png's if the image is vectorized in a sense -->
							<section class="posts">
								<article>
									<header>
										<h2><a href="/game/qc">Quake Champions<br></a></h2>
									</header>
								</article>
								<article>
									<header>
										<h2><a href="/game/csgo">CS:GO</a></h2>
									</header>
								</article>
								<article>
									<h2><a href="/game/apex">Apex Legends</a></h2>
								</article>
							</section>
					</div>
			</div>
		<!-- Scripts (we need these for the animations to actually work -->
			<script src="/assets/js/jquery.min.js"></script>
			<script src="/assets/js/jquery.scrollex.min.js"></script>
			<script src="/assets/js/jquery.scrolly.min.js"></script>
			<script src="/assets/js/browser.min.js"></script>
			<script src="/assets/js/breakpoints.min.js"></script>
			<script src="/assets/js/util.js"></script>
			<script src="/assets/js/main.js"></script>
	</body>
</html>
