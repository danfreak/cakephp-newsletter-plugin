----------------------------------
REQUIREMENTS
----------------------------------
Extend-Associations: http://bakery.cakephp.org/articles/view/add-delete-habtm-behavior
JQuery for ajax calls in admin_send.ctp

You MUST have a sendEmail() function in your Appcontroller
a demo sendEmail() function that uses SwiftMailer (http://swiftmailer.org/) can be found here http://wiki.github.com/fabiokr/cakephp-newsletter-plugin


----------------------------------
INSTALLATION & CONFIGURATION
----------------------------------
drop the plugin files in the folder app/plugins/newsletter/

create the necessary DB tables using either:
the file in app/plugins/newsletter/config/sql/schema.sql

or via shell copy app/plugins/newsletter/config/sql/newsletter.php in app/config/sql/
and run:

cake schema run create -name Newsletter


Open app/plugins/newsletter/config/newsletter.php
Define the required configuration variables and either copy them in your app/config/bootstrap.php
or write
require_once(APP.'plugins/newsletter/config/newsletter.php');
in your app/config/bootstrap.php

Enjoy!

----------------------------------
TODO
----------------------------------
Explain Configuration Fields
$subject = Configure::read('Newsletter.unsubscribe_subject');
$subject = Configure::read('Newsletter.subscribe_subject');
$from = Configure::read('Newsletter.from'); #Required
$from_email = Configure::read('Newsletter.from_email'); #Required

$subject = Configure::read('Newsletter.sendX'); #Number of emails to sent at each admin_send call.
$subject = Configure::read('Newsletter.sendInterval'); #the interval time before send next batch
$subject = Configure::read('Newsletter.mail_opt_out_message');
$subject = Configure::read('Newsletter.emptyImagePath');