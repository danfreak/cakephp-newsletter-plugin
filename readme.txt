----------------------------------
REQUIREMENTS
----------------------------------
Extend-Associations: http://bakery.cakephp.org/articles/view/add-delete-habtm-behavior
JQuery for ajax calls in admin_send.ctp

You MUST have a sendEmail() function in your Appcontroller
a demo sendEmail() function that uses SwiftMailer (http://swiftmailer.org/) can be found here http://wiki.github.com/fabiokr/cakephp-newsletter-plugin


----------------------------------
TODO
----------------------------------
Explain COnfiguration Fields
$subject = Configure::read('Newsletter.unsubscribe_subject');
$subject = Configure::read('Newsletter.subscribe_subject');
$from = Configure::read('Newsletter.from'); #Required
$from_email = Configure::read('Newsletter.from_email'); #Required

$subject = Configure::read('Newsletter.sendX'); #Number of emails to sent at each admin_send call.
$subject = Configure::read('Newsletter.sendInterval'); #the interval time before send next batch
$subject = Configure::read('Newsletter.mail_opt_out_message');
$subject = Configure::read('Newsletter.emptyImagePath');