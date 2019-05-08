Spec/Planning Sheet
-------------------
_Subject to change a lot_

Before reading
--------------
Anything that has a + sign on it means its a bonus: so don't prioritize 
that if there's something else to deal with.

Frontend Philosophy:
--------------------

Make it look pretty

Keep what user's can reliably touch to a bare minimum.
	That way backend doesn't have to think about X cases to handle.

Backend Philosophy:
-------------------

Keep tables as simple as possible to avoid dealing with nasty joins
and other annoyances

Things that will _probably_ never change go in tables

Stuff that user's can touch go in configs
	* we do this because if the tables break we're fucked
	  if the config breaks we just replace that 1 config with a new one

Keep what we want ignore the rest:
	if you're expecting a button press, ignore everything else

Page by Page Basis
------------------

Home:
	* static with some links to: games info login/account etc

Games:
	* Super basic form where you pick a game(country?), and are redirected to that game's list of teams

	!Given that we probably won't have more than 2/3 games we don't need a db for this.
		1. Because that is public anyway
		2. There's no point in accessessing a table with 2/3 row and nearly no columns

	Team:
		static page which shows some data about the team in question

Info:
	* static bs q/a page for brainlets

Login:
	* static form to login
	+ Password/account recovery
	
Special Pages:
--------------

Account:
	* static page displaying some user info
		[pulled from a user config somewhere for flexibility]
	
Team:
	* staic page which always shows basic info - unless you're the admin of the team
		Admins just get a special button to go to form to submit some new things

	* Messaging(button)
		* Should only be there if you're signed however

		Basically just send a prebuilt email to the other team members with the
		requesters team link

TeamEdit:
	* basically a giant form that is reached by teamadmins
	* Data here can again be from a team config file somewhere in backend
	* Contact info:
		Things like steam links for each player or smthng idk

Database:
---------

Assuming we use some table based system we should try to keep the tables as clean as we can
Heres an example of a users table to give you an idea:

| id | email | password | config |
----------------------------------
| 16 | @mail | password | id.cfg |

That config file can really just be a json file or something simple since that data will have 
to be flexible to change.
Also this should make it easier to produce a whole bunch of random data to test with

A teams table would look similar but it depends on what we want to do.
