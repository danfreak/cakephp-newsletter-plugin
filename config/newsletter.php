<?php
/*
* Configuration variables
* define them and copy the content of this file in app/config/bootstrap.php
* */

Configure::write('Newsletter.unsubscribe_subject', '################');
Configure::write('Newsletter.subscribe_subject','################');
Configure::write('Newsletter.from', '################'); #Required
Configure::write('Newsletter.from_email', '################'); #Required

#Number of emails to sent at each admin_send call.
Configure::write('Newsletter.sendX', 10);

#the interval time before send next batch in milliseconds
Configure::write('Newsletter.sendInterval'); 

Configure::write('Newsletter.mail_opt_out_message');

Configure::write('Newsletter.emptyImagePath');