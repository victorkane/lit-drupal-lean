#Patches

## Applying patches
Provided that the patch was made relative to the root directory of the concerned project, navigate to the that directory (using cd). For a patch on Drupal, that will be the Drupal directory; for a contrib module or theme, that is the root directory of the project. Once there, issue the command:

    patch -p1 < path/file.patch

or if you are using Git:

    git apply --index path/file.patch

## Patch documentation in this directory
Patch documentation should be in the following format:

* module name
  * brief description
  * issue link (if exists)
  * patch file location

Example:

* views
  * Add CSS class to read-more link on trimmed text field
  * http://drupal.org/node/1557926
  * http://drupal.org/files/views-more_link_class-1557926.patch

---
* fences
  * Undefined Index (with installation profiles and features?)
  * https://drupal.org/node/1561244
  * https://drupal.org/files/undefined-index-1561244-7.patch
