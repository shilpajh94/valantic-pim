sudo chmod -R 0777 .
sudo chown -R www-data:www-data .
sudo -u www-data php bin/console cache:clear
sudo -u www-data php bin/console assets:install web 
sudo chmod -R 0777 .

