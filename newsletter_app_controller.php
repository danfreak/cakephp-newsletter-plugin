<?php
/**
* Copyright (c) 2009, Fabio Kreusch
*
* Licensed under The MIT License
* Redistributions of files must retain the above copyright notice.
* @copyright            Copyright (c) 2009, Fabio Kreusch
* @link                 fabio.kreusch.com.br
* @license              http://www.opensource.org/licenses/mit-license.php The MIT License
*/
 
class NewsletterAppController extends AppController {

  var $components = array('RequestHandler');

  /**
  * Verifies if $str exists into $array. If $array is null, it's value
  * is assumed as $this->data.
  * $str can be as 'Form.field', and this function will verify if the keys
  * $array['Form'] and $array['Form']['field'] exists.
  * @param $str The key(s) to look for.
  * @param $array The array to look for the keys. Default to $this->data.
  * @return True if the keys exists, false otherwise.
  **/
  public function isNotEmpty($str, $array=null) {
  
    if(!$array) { $array = $this->data; }
    if(!$array) {return false; }
      
    $parts = explode(".", $str, 2);
    
    if(count($parts) == 1) {
      return array_key_exists($parts[0],$array) && $array[$parts[0]] != null;
    } elseif(count($parts) == 2) {
      return (
        (array_key_exists($parts[0],$array) && $array[$parts[0]] != null) && 
        (array_key_exists($parts[1],$array[$parts[0]]) && $array[$parts[0]][$parts[1]])
      );
    }
    
    return false;
  }
  
  /**
  * Send email(s) using parent class AppController sendEmail function.
  * Make sure your AppController haves this method. See readme.txt for more instructions.
  * @param
  * @return
  * @access
  **/
  function sendEmail($subject, $view, $to=null, $from_email = null, $from = null) {
    if(!$from_email) {$from_email = Configure::read('Newsletter.from_email');} #Required
    if(!$from) {$from = Configure::read('Newsletter.from');} #Required
    return parent::sendEmail($subject, $view, $to, $from_email, $from);
  }
  
}