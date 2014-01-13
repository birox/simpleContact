#simpleContact
![](http://documentator.org/assets/img/simpleContact.png)

*Plugin Name:* simpleContact  
*Author:* Biro Florin  
*Author Website:* [documentator.org](http://documentator.org)  
*Created:* 1/13/2014 9:47:55  
*Version:* 1.0.0  
*Download source:*  [GitHub](#)  
***

**simpleContact** will register a Contact us page on your Documentator installation that can be accessed by visiting http://my\_website.com/contact. It comes with a config.php file where you need to fill in the necessary variables.

>Config options

* <code>SEND_EMAIL</code> => the sender email (should use an email address with same domain name as Documentator)
* <code>RECEIVE_EMAIL</code> => the email address where the form should be submitted (your email address)
* <code>THANK_YOU</code> => a message to be shown when a visitor submits the contact form
* <code>ERROR_SEND</code> => a message to be shown if mail sending fails
* <code>CONTACT_FIELDS</code> => an array of arrays containing the fields you want to display on the form

>Hooks in use:

1. <code>hook('js', null, 'simplecontact\_js');</code>
2. <code>hook('css', null, 'simplecontact\_css');</code>
3. <code>hook('translate', null, 'simplecontact\_translate');</code>
6. <code>hook('pages\_url', null, 'simplecontact\_pages');</code>
7. <code>hook('page\_contact', null, 'contact\_page');</code>
8. <code>hook('ajax\_simpleContact', null, 'simplecontact\_ajax');</code>

***

>Functions in use:

* <code>plugin\_path(\_\_FILE\_\_);</code>
* <code>plugin\_url(\_\_FILE\_\_);</code>
* <code>get_path();</code>
* <code>\_t($translate)</code>

***

>Plugin structure:

* assets  
  * scripts.js  
  * style.css  
* translate  
  * en.ini  
* views  
  * contact.php
* index.php
* config.php
