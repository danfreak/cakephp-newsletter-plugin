<?php
/*
* Configuration variables
* define them and copy the content of this file in app/config/bootstrap.php
* */

Configure::write('Newsletter.unsubscribe_subject', '################');
Configure::write('Newsletter.subscribe_subject','################');
//the default name that will appear in the from email if you don't specify one
// while building your mail
Configure::write('Newsletter.from', '################'); #Required
//the e-mail you want to send from if you don't specify one
// while building your mail
Configure::write('Newsletter.from_email', '################'); #Required

#Number of emails to sent at each admin_send call.
Configure::write('Newsletter.sendX', 10);

#the interval time before send next batch in seconds
Configure::write('Newsletter.sendInterval', 10); 

//the message you want to use to tell about unsubscribing
Configure::write('Newsletter.mail_opt_out_message', '');

//header message of the newsletter
Configure::write('Newsletter.mail_header_message', '#########');

Configure::write('Newsletter.emptyImagePath', '');