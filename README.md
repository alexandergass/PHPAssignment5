# PHPAssignment5

1.	In assignment 4 (question 3a), you created a program to generate a properly-formed xml file on your server. For this assignment, you will create a php class to store your movie's data (with getters, setters, display, constructor).

Create a new php program that uses this class as follows:

o	declare an array that will hold your movie data.
o	Load the xml file and use a foreach command to loop through each element set. For each element set, store in an instance of your movie class and add to the movies array.
o	After all elements have been processed, use a for statement to loop through the array and display the movie data in a HTML table (with rows of 3 elements).

2.	Authentication System
Using phpadmin, create a new database called unit_7 and two new tables. The first table is called users and it contains 3 fields: user_id (int primary auto inc), username (text), and password(text). Using phpmyadmin, add a username and password to the users table. The second table is called login_sessions and it contains: login_id (int primary auto inc), user_id (int), and session_id (text), and last_access_time (int).

Create a html file with a login form (username, password, submit). When the submit button is pressed it will go to authenticate.php.

Create a file called authenticate.php. This program will retrieve the username and password and check for a matching record in the users table. If no match is found, redirect back to the login page. If a match is found, implement the following functionality:

o	retrieve the user_id of the matching record;
o	generate a session_id;
o	set the user_id and session_id as session variables;
o	send the user_id, session_id, and current time to the login_sessions table;
o	redirect to admin.php

Create a file called admin.php. This program will implement the following functionality:

o	retrieve the user_id and session_id from the browser session;
o	check for a matching record in the login_sessions table.
o	If a match is found, update the time stored in the login_sessions table and show a welcome message.
o	If a matching record is not found, redirect back to the login page.
