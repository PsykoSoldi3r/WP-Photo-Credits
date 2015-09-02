# WP-Photo-Credits
Wordpress Plugin - Added photo credits to images

Changelog:

1.0
* Credits name added to attachments as meta data
* Credits URL added to attachments as meta data
* Supported Lanuages: Dutch and English
* Use photo credits information in your on theme

#### How to use

A. Post Content

It is easy to get photo credit informatoin in you posts content. When added a new attachtment to you post, the credits information will automatically added to the post. But when there are no information available. The credits information will not shown, and after inserting a attachement to post content and changing the credits information. You will need to insert the photo into the post content again.

B. In your own Wordpress Theme.

Where you would like to get the photo credits information, put the following code in your theme:
```
<?php do_action('PhotoCreditsGetInfo', $POST_ID ); ?>
```
$POST_ID must be the ID of the image
