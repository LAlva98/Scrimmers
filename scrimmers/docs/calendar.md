# The calendar:

For the calendar we used a [jQuery plugin]("https://github.com/artsy/day-schedule-selector") made by Artsy.
<br>
# How the user will use it:  
<br>
The user can change is schedule at any time, by clicking on the "Edit your schedule" button at the end of his profile page. <br>
A new page will be loaded where the user can select the time slots he wants for his schedule. Then, once he is done the user will "Submit his data".
<br>
# Data submission:
<br>
The schedule is translated from a JSON object to a smaller string that has a JSON object syntax. Once the string is shorter, it is sent to the db using an AJAX call to a PHP script that update the user_schedule field.
<br>
When the schedule needs to be loaded, an AJAX call is made to a PHP script that fetch the schedule string.
The schedule is then transformed into an object, that is then deserialized by a function available in the jQuery plugin.