## Introduction 
This is a collection of tools used for management of certain Tasks in the school that I work at.
Careful, the security in this project is far from perfect since most of the security Issues are handeled on side of the server and I don't exactly have a huge amount of impact on that. It is secure in it's environment but should you attempt to use it within your own environment you should make sure that you don't cause an uncomfortable amount of security breaches. That being said, we can now get to the interesting part.

## What you need to do before using:

There is a file you will have to create before you can safely use these tools. It is called "var.php" and is to be placed in the technik/ folder itself. The file will need to carry the variables that have sensitive information like the passwords for authentication. You'll also have to include the files in the dbc directory which handles your database connection.

## How it works:

The site is seperated in different parts, the ticket system for staff, the ticket system for students, the app database, and the timetable.

### Staff ticket system:

The staff ticket system is located at /technik/home/, it first asks for authentication and then brings you to the actual site which is fairly self explanatory. Once the form an that site is filled you can hit send and it'll send a formated email to the $sendmail variable you should set in var.php 

### Student ticket system:

This works fairly similar to the staff page just without a password. However, students are limited to one ticket per 24 hours (by a cookie that is set) to prevent spamming.

### App dtabase:

The app database shows all apps added to it (in our case the apps in our iPad management system that can be installed by teachers and/or students) Apps can be added to the database via form and be searched by name, subject, or description.

### Timetable:

Shows the hours one of our IT-staff will be available at the school to do tech support right away.