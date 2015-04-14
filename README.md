# eraproject.ca readme
Git repository: https://github.com/stevelyall/eraproject-site

The eraproject.ca provides a public area accessible to visitors, as well as a private area for researchers to access data from the database. It was built with Bootstrap (http://getbootstrap.com) and PHP.

##Public Area
Currently offers a basic landing page with contact information, a link to sign up for the mobile app beta, privacy policy for review, and log-in page for researchers.

###Beta Opt-in
As part of Google Play's beta process for Android apps, users must be members of a specific google group before the download link on Google Play becomes visible. The link in the navigation bar simply redirects the user to https://groups.google.com/forum/#!forum/eraprojecttesters where they may request to join the google group.
Google Groups will notify the group owner (myeraproject@gmail.com) or members designated as group managers by email, who may then approve or deny the request using the Google Groups console. Once admitted to the Google Group, users may download the application from Google Play: https://play.google.com/apps/testing/ca.eraproject.ernieapp

###Navigation
The site's navigation bar is included from a single navigation.php file which can be easily updated. The navigation bar displays different options depending on whether a user is logged in or if that user is the admin user. Pages not shown on the navigation bar requiring authentication have protected visibility.

##Private Area
User accounts are created by the default administrator user. The administrator or created user accounts may use their username and password to access the protected areas of the site.

###View Responses
The responses page displays the individual responses recieved from the mobile app. Each row represents a single response from a participant, identified by the participant id they entered into the app during its initial set-up. Clicking participant's id shows the demographic information for the participant on a separate page.
A download link is provided, which lets the user download the displayed data in .csv format.

###View Participants
The participants Page shows all of the participants who have submitted at least one response from the mobile app. As with the responses page, clicking a participant's id opens a new page with that participant's demographic information shown by itself.

###Manage Users (Admin only)
The user management view, only visible for the user admin, allows the administrator to add, delete or modify additional subordinate users permitted to access the responses and participants pages.

####Add User
From the add user page, the administrator can add users one after the other by providing a username and password for each. To save a new user, make sure a username and password have been entered, then choose the "Add User" button. Choosing the "Done Adding Users" button returns to the user management page. 

####Delete User
From the manage user screen, the administrator can remove users by clicking on the delete icon next to a user's name. 

####Edit User
From the manage user screen, the administrator can click the edit icon next to a user to open a page which allows her/him to change a user's name or password. To change a user's username and password, input their new credentials in the appropriate fields, then choose "Submit Changes". To return to the user management screen, click the "Done Editing User" button.
