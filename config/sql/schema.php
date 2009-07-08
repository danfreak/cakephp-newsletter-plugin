<?php 
/* SVN FILE: $Id$ */
/* App schema generated on: 2009-07-08 21:07:32 : 1247082692*/

/**
* Usage
* ----------------------------
* 
* Copy this file in app/config/sql/
* 
* From the console run:
* ----------------------------
* cake schema run create -name Newsletter
* 
**/
class NewsletterSchema extends CakeSchema {
	var $name = 'Newsletter';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}


	var $newsletter_groups = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 200),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $newsletter_groups_mails = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'newsletter_mail_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'newsletter_group_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk' => array('column' => array('newsletter_mail_id', 'newsletter_group_id'), 'unique' => 0))
	);
	var $newsletter_groups_subscriptions = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'newsletter_subscription_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'newsletter_group_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'Foreign_Keys' => array('column' => array('newsletter_subscription_id', 'newsletter_group_id'), 'unique' => 0))
	);
	var $newsletter_mail_views = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'newsletter_mail_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10, 'key' => 'index'),
		'ip' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk' => array('column' => array('newsletter_mail_id', 'ip'), 'unique' => 0))
	);
	var $newsletter_mails = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'from' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'from_email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'subject' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'content' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'read_confirmation_code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'last_sent_subscription_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'sent' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $newsletter_subscriptions = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 250),
		'email' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 250, 'key' => 'unique'),
		'opt_out_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'confirmation_code' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 250),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'email' => array('column' => 'email', 'unique' => 1))
	);
}
?>