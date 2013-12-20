ModuleInfo - by Ronald Locke / Germany / Berlin

This module will harvest informations about your installation. It collects
informations about hooks, functions and Drupal specific things like _alters,
forms, paths and definitions.

INSTALLATION

Copy the module into your modules directory and enable it via drush or UI.

USAGE

First go to admin/config/development/moduleinfo to set up results you want to
see on the different result pages. Check all if you want to have a birdview of
informations about everything this module offers.

You may later remove some results, which you are not interested in.

On the settings page you may now click "scan your installation now" from the
description text or do it manually by calling moduleinfo/scan.

Overview Page: shows all informations not specific to a module
Module Page: shows informations for a given module

After the scan you may go to your module page and notice the "ModuleInfo" link
in the description of each enabled module. Click that link to get more
informations about that module.

API

If you think there are informations you could need to add to that module
information page you can extend this module without hacking it via ctools
plugins.

Each plugin can provide 3 types of callbacks.

- scan callbacks, which will be called for each file at the system scan
  progress. The callback will be provided with the content of the file as
  string, the uri to the file and the module_name where this file belongs to.

  each scan callback can define positive "scan" and negative "skip" regular
  expressions, which both have to match to determent if the scan callback
  shall be executed.

- render callbacks, which will be called on the display page. Both global
  overview and module_page overview. The callback has to figure out by
  itself if it has useful informations for the given page.

  Each callback represents two functions actually. The callback is postfixed
  with _collector and _renderer. Only if both exist, it will be used. The
  idea is that the _collector returns pure data, thus other modules can
  use the collected data. The _renderer can render the data in a fieldset
  for viewing.

- post scan callbacks, which will be executed after all scan callbacks are
  done. Scan callbacks should use caching to save their results. There are a
  few caches which shall be there after scanning. If you would like to
  reprocess results into different formats, this should be the place to do
  that.

Example:

$plugin = array(
  'name' => 'API Hooks',
  'description' => 'Scans Drupal for defined HOOKs',
  'scan callbacks' => array(
    // The callback which shall be executed in the scan process
    '_moduleinfo_hooks_scan' => array(
      // RegEx for the filename which HAS to match
      'scan' => array(
        '/.+\.api\.php$/i',
      ),
      // RegEx for the filename which HAS NOT to match
      'skip' => array(
        '/.+\.tpl\.php$/i',
      ),
    ),
  ),
  'render callbacks' => array(
    // The callbacks for displaying data in the way you like.
    '_moduleinfo_hooks_exposed' => t('Exposed Hooks'),
    '_moduleinfo_hooks_implemented' => t('Implemented Hooks'),
  ),
  'post scan callbacks' => array(
    // The callback to call after all scans along with caches are build
    '_moduleinfo_hooks_post_scan_hook_list',
  ),
);

TO MODULE DEVELOPERS

If you provide a file in your module root module_name.api.php with your
hooks, this module will parse it and provide informations about these exposed
hooks and also which other modules have used them.
