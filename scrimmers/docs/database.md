# Databases Heroku, ClearDB, and PHP

I'll cover the easier steps first then the more in-depth ones later.

Whats covered:

1. Setting up the Heroku plugin
2. _Connecting_ to the remote database
3. Sending some test data from a _local machine_ to the _remote database_
4. Interacting with that database with _php_

NOTE: _this was done on Debian Stretch with ZSH as my shell but this general workflow should work for most users_

## Heroku Plugin

First and foremost provision the `ClearDB` plugin on the Heroku app.
On Heroku, go to the app's `Resources` tab and look for the `ClearDB MySQL` plugin.

## Connect to the remote database

First we'll establish some kind of _test connection_ so that we can connect at all.
Get the `CLEARDB_DATABASE_URL` from Heroku under the _Settings_ tab under _Reveal Config Vars_.

The url should look like `msql://foo:bar@some-cool-thing.what.ever/heroku_asdf?....`. 
This url gives us all the credentials we need to connect.
Here's a break down of the url:

Username
:   foo

Password
:   bar

Host
:   some-cool-thing.what.ever

DB Name
:   heroku_asdf

### Connecting with MySQL Workbench

[MySQL workbench Download Link](https://www.mysql.com/products/workbench/)

Go to `Database` -> `Manage Connections`: `New` | `Connection`

_Default schema can be left out for later_.

NOTE: if you're on a \*nix system the password might say something about a keychain(really who uses this feature).
As long as you have the password handy you can always ignore any warnings and copy paste the database password in when asked.

_Read the whole message because_: sometimes sql versions are _not_ completely compatible but it _should_ be fine for our purposes
of uploading purely educational sample data.

### Connecting via MySQL command line

There is one note to keep in mind: `-p` and `--password` don't actually take the password as it's argument... it's actually __the hostname__.
This is to keep the password out of your `.bash_history` and `$HISTORY`: _which is plaintext, which is why that would be bad practice_.

Here's the command you need for basic usage: `mysql -u foo -p heroku_asdf -h some-cool-thing.what.ever`

Here's the output of this command:

```
smolltucc  ~  % mysql -u foo -p heroku_asdf -h some-cool-thing.what.ever
Enter password: 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 1234
Server version: 5.5.56-log MySQL Community Server (GPL)

Copyright (c) 2000, 2019, Oracle and/or its affiliates. All rights reserved.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql>
```

If all goes well we can now proceed to uploading some test data.

## Uploading a Sample to the database

Assume we have a file `USERS_SAMPLE.sql`.
If you have a `.db` file just check the content of the file, I'm willing to bet a few sheckels
that it's just a bunch of sql commands in plaintext.

### Using MySQL Workbench

Connect through the database connection you setup earlier; you may have to restart MySQL Workbench the first time.
On the left find Data `Import/Restore` and use the `Import from Dump Project Folder` option.

Scroll down and `Start Import`.

Once done you can verify its there by checking what tables you can export under `Data Export` on the left.

### Using the terminal

The command you're looking for is: `mysql -u foo -p heroku_asdf -h some-cool-thing.what.ever < some-file.sql`

It will will ask for the password like before.
Then just wait for the file to upload to the server.

Here's some sample output:
```
smolltucc  ~  % ls *sql
USERS_SAMPLE.sql
smolltucc  ~  % mysql -u foo -p heroku_asdf -h some-cool-thing.what.ever < USERS_SAMPLE.sql
Enter password: 
smolltucc  ~  %
```

If nothing seemingly went wrong then you should be setup to try some php on it.

## PHP Queries

Below is a very basic php script to show the tables in our database.
If the table is there then the data is also there, so I won't concern this guide with looking through columns.

```php
// We're using this array as a sort of 'config' to make connecting a bit cleaner looking
$remote = array(
	"host"		=>  "some-cool-thing.what.ever",	// site 
	"name"		=>  "heroku_asdf",			        // database name
	"username"	=>  "foo",					        // username
	"password"	=>  "bar"						    // password for user
);
// Try connecting to the database
$db = mysqli_connect(
    $remote['host'], 
    $remote['username'], 
    $remote['password'], 
    $remote['name']) 
    or die('Couldn\'t connect to db' . $db->connect_error);

// Try querying the databse for allthe available tables 
$tables = mysqli_query($db, "SHOW TABLES FROM " . $remote['name'] . ';');

// If there is no table then something really wrong happened
if(!$tables) {
	echo 'tables no able to list :(';
	mysqli_close($db);
	exit;
}
// Show off the table(s) available to us
while($row = mysqli_fetch_row($tables)) {
	echo "Table: {$row[0]}\n";
}
mysqli_close($db);
```

This script can also be ran with `php -S localhost:8000`.
It should still work because we're connecting with the user creds 
provided to us by heroku.