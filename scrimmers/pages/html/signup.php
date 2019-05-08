<!DOCTYPE HTML>
<html>
	<head>
		<title>Signup</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/assets/css/main.css" />
		<link rel="icon" href="/images/favicon.gif" types="image/gif" >
		<noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
    </head>
    <body class="is-preload">
        <div class="wrapper" class="fade-in">
            <header id="header">
                <a href="/signup" class="logo">Signup</a>
            </header>
            <!-- Navbar -->
            <nav id="nav">
                <ul class="links">
                    <li><a href="/" class="scrolly">Home</a></li>
                    <li><a href="/about">About</a></li>
					<?php
					require __DIR__ . '/../../server/navbar.php';
					if(activeUser()) {
						loggedInNav();
					}
					else {
						defaultNav('signup');
					}
					?>
                </ul>
                <ul class="icons">
                    <li><a href="https://github.com/smolltucc/scrimmersgg" class="icon fa-github"><span class="label">Github</span></a></li>
                </ul>
            </nav>            
            <!-- Main -->
            <div id="main">
                <!-- Form elements -->
                <form id="main-form">
                    <div class="fields">
                        <div class="field">
                            <label for="name" id="nameLabel">Username</label>
                            <input type="text" name="name" id="name" />
                        </div>
                        <div class="field">
                            <label for="email" id="emailLabel">Email</label>
                            <input type="text" name="email" id="email" />
                        </div>
                        <div class="field">
                            <label id="pw-label" for="password">Password</label>
                            <input type="password" name="password" id="password" />
                        </div>
                        <div class="field">
                            <label for="password-confirm">Confirm Password</label>
                            <input type="password" name="password-confirm" id="password-confirm" />
                        </div>
                        <div class="field">
                            <input type="button" value="Submit" id="submit-button"/>
                        </div>
                    </div>
                </form>
                </div> 
        </div>
        <!-- Scripts -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/jquery.scrollex.min.js"></script>
        <script src="/assets/js/jquery.scrolly.min.js"></script>
        <script src="/assets/js/browser.min.js"></script>
        <script src="/assets/js/breakpoints.min.js"></script>
        <script src="/assets/js/util.js"></script>
        <script src="/assets/js/main.js"></script>
        <script src="/pages/js/signup.js"></script>
    </body>                        
</html>
