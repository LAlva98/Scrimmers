# Conceptual User stories

## Not logged in/ just browsering 

Navbar shows: home[ACTIVE] about login signup

They press one of the following:

* Home 

	* refresh page/do nothing

* About

	* navbar shows: home about[ACTIVE] login signup

* Login
	
	* Navbar shows: home about login[ACTIVE] signup

* Signup

	* Navbar shows: home about login signup[ACTIVE]

* Team pages
	
	* Navbar shows: home about login signup
	* Teams list determined by the form filters applied

* Player pages

	* Navbar shows: home about login signup
	* Page shows relevant player info




## Signup

Preface: user somehow gets to the signup page

1. User: _attempts to fill out the form_
2. Correct them until they give us good input

3. Server inserts the new record into its database
5. Server creates a new session token in our sessions table
5. Server responds with a link to their page & a session token

6. User goes anywhere (besides logout)

Navbar should now have: home about _MY PROFILE_ _LOGOUT_

## Login

Preface: user somehow gets to the login page

1. User: _attempts to fill out the form_
2. Correct them until they give us good input

3. Server creates a new session for the user and stores it somewhere
4. Server responds with a session token
5. Server responds with some html to replace the form

6. User goes anywhere(besides logout)

Navbar should now have home about _MY PROFILE_ _LOGOUT_

## Logout 

Takes the user to a small page telling them they are logged out.

Browser requests that the server stop keeping track of the user.

Navbars go back to original logged out case

No navbar on this page, just let the banner at the top be a link back home
