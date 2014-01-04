lit-drupal-lean
===============

Proyecto de ejemplo para taller y presentación en DrupalPicchu2014, centrado en un proceso lean y agil pensado para Drupal, y una arquitectura "todo dentro del código" para el fácil despliegue de contenidos y configuraciones entre instancias de una aplicación Drupal (utilizando perfil de instalación, features y CTools Bulk Export a módulo):

"Conquistando para Drupal un proceso agil, motorizado por incrementos en la usabilidad del usuario, con herramientas".

Example project for DrupalPicchu2014 workshop.

"Conquering, for Drupal, an agile process driven by user experience enhancements, with tools".

### Instructions

* Clone
* Install as you would any Drupal 7 web app at docroot
* The install profile will execute automatically.
* Once the web app comes up:
  * Go to Structure > Features
    * Click on Lit Base feature main link
    * Select Field Bases (field_base) component and click on the `Revert components` button
    * Click on Features from the breadcrumb
    * Select the Lit Demo module and enable it by clicking on the `Save settings` button
  * Go to Modules
  * In the Chaos Tools package enable the `Lit user export module`.

### Test your new installation of Lit Workshop

* Go to Content to visualize default demo content
* Select any five piece of content of type Text
* From Update options, select `Make selected content not sticky` (i.e. non-demo) and hit the `Update` button
* Still logged in as admin, go to Home page.
* Those five pieces are cycled on the home page as Workshop Member / Admin visible Texts.

* Masquerade as user bard
* The remaining Texts (set to demo mode by virtue of their sticky field being set) are cycled
* Click on `Click here to add your own critique to this text`
* The form to create a critique is brought up, with the reference to that text automatically filled in and greyed out.
* Click on `My account` menu item at top right of page.
* bard's texts appear listed in the My texts table on the account page.

* Click on the `switch back` link, then log out completely as admin
* As an anonymous user the landing page options block appears with its three options.
* Click on the About Literary Workshop link to go to the About section (context sensitive blocks, etc.)
* At the bottom of the page, click on the try out the demo link. 
* Now in the demo section choose to login either as demo users bard or muse by clicking on the corresponding link.
* You will see bard or muse's texts appear listed in the corresponding My texts table on the account page.
* Going back to home, all texts (authored both by bard and muse) are cycled through by the homepage view.

* Whenever viewing the full node display for a Text, if CRIT's exist for that text, a list of those CRITS will be found just below the Text.

### More resources

More info on why install profile at https://github.com/victorkane/lit-drupal-lean/issues/27

Project docs: [Lit Drupal Lean project wiki](https://github.com/victorkane/lit-drupal-lean/wiki). 

Project news and history: [Issue page](https://github.com/victorkane/lit-drupal-lean/issues?state=open).

Slides: coming early January

Video: coming late January
