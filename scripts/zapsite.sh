# 
# Prepare Drupal instance for interactive installation
# Execute from document root (may need sudo)

# Zap the database
# http://drush.ws/ shows sql-drop!
drush sql-drop

# Zap settings.php by copying over a fresh one from default.settings.php
cp sites/default/default.settings.php sites/default/settings.php 

# Zap the contents of the files directory
rm -rf sites/default/files/*
rm -f sites/default/files/.htaccess
chown www-data sites/default/files sites/default/settings.php

# Ready to Install Drupal!
echo "Go ahead and install Drupal!\n"
