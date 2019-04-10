# FileVault

#### Requirements
* Requires <a href="https://www.advancedcustomfields.com/" target="_blank">Advanced Custom Fields PRO plugin to be installed and activated.</a>
* You need to have a directory where your files are uploaded to. Make sure that this directory contains an __.htaccess__ file with the following code to ensure no one can access it directly via the browser:
```
# .htaccess

# Options -Indexes
Order Deny,Allow
Deny from all
```

## After plugin installation & activation:
* Need to create a new page in WordPress for the Members Area. This page must have a slug that corresponds with the code in the plugin. In our case, this slug is "meyer-member-area".
* Common files to be uploaded to ```wp-content/uploads/meyer-members-files/\_common```.
* Private files to be uploaded to ```wp-content/uploads/meyer-members-files/\_private```.

## Setup
1. Go to "Companies and Files" and enter group or company name to 'Company Names' field. All names should be on its own line. You can add common files on this page, files that are visible to all users.
2. After saving, you will be able to go to Users and select the appropriate company name. This is how to give a user access to 'private' files.
3. You will now be able to add private files on the "Companies & Files" admin page.
=======
Common files to be uploaded to ```wp-content/uploads/meyer-members-files/\_common```.

Private files to be uploaded to ```wp-content/uploads/meyer-members-files/\_private```.
