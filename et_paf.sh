#!/bin/bash

cd /var/www/html
rm -rf $(ls | grep -v "config.php")
cd /opt/DEVOPSECESD 
cp -R * /var/www/html
