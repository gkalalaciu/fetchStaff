# fetchStaff using .JSON FILE, create a corresponding Content-type and .twig file
I have a .JSON file that contains more than 800 staff data
I want:
- to create **A node (a content-type : STAFF)** based on the .JSON file fields
- fetch the .JSON file and store it in the database (Drupal Database) 
- fetch the .JSON file, for each staff, **add it to the STAFF content** (So, we will be able now to modify it via Drupal Admin panel)
- fetch the .JSON file, for each staff, **create the corresponding .html.twig file** like this: ``facultyName/staffName.html.twig``

You will find the .JSON file sample and the twig file sample attached.


