<?php
require __DIR__ . '/../../server/navbar.php';
if(activeUser()) {
	session_destroy();
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="/images/favicon.gif" types="image/gif" >
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">
		<div class="wrapper" class="fade-in">
			<header id="header">
				<a href="/login" class="logo">Login</a>
			</header>
            <!-- Navbar -->
            <nav id="nav">
                <ul class="links">
					<li><a href="/logout">Logout</a></li>
                </ul>
                <ul class="icons">
                    <li><a href="https://github.com/smolltucc/scrimmersgg" class="icon fa-github"><span class="label">Github</span></a></li>
                </ul>
            </nav>            
			<!-- Smol form -->
			<div id="main">
				<form>
					<div class="fields">
						<div class="field">
							<label for="name">Username</label>
							<input type="text" name="name" id="username" />
						</div>
						<div class="field">
							<label for="name">Password</label>
							<input type="password" name="name" id="password" />
						</div>
						<div class="field">
							<input type="button" value="Submit" id="submit" />
						</div>
					</div>
				</form>
				<p id="response"></p>
			</div>
		</div>
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrollex.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>
		<script src="/pages/js/adminLogin.js"></script>
    </body>                        
</html>
