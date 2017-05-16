# Steps to install on local machine

1. `cd ~/Code`
2. `git clone https://github.com/Doomtickle/KeetonHouse.git`
3. `cd KeetonHouse`
4. `composer install`
5. `npm install`
6. `mysql -uroot` 
    * password will be blank
7. `create database keeton;`
8. `exit`
9. Open the .env file (if it's not there, create it) and copy this in there:
```APP_NAME=Laravel
   APP_ENV=local
   APP_KEY=
   APP_DEBUG=true
   APP_LOG_LEVEL=debug
   APP_URL=http://localhost
   
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=keeton
   DB_USERNAME=root
   DB_PASSWORD=
   
   BROADCAST_DRIVER=log
   CACHE_DRIVER=file
   SESSION_DRIVER=file
   QUEUE_DRIVER=sync
   
   REDIS_HOST=127.0.0.1
   REDIS_PASSWORD=null
   REDIS_PORT=6379
   
   MAIL_DRIVER=smtp
   MAIL_HOST=smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=null
   MAIL_PASSWORD=null
   MAIL_ENCRYPTION=null
   
   PUSHER_APP_ID=
   PUSHER_APP_KEY=
   PUSHER_APP_SECRET=
   ```
   10. Back to the `~/Code/KeetonHouse` directory in your terminal and `php artisan key:generate`
   11. `php artisan migrate`
   12. The site should work at [http://KeetonHouse.dev](http://KeetonHouse.dev) now. Go to the hidden url [/register](http://KeetonHouse.dev) and make an account.
   13. If you want to seed the database with dummy data, open `php artisan tinker` and run the following commands: (hit enter after each line)
   ```
   factory('App\Resident', 50)->create();
   
   $residents = App\Resident::all();
   
   foreach($residents as $resident){ factory('App\Transaction', 25)->create(['resident_id' => $resident->id]); }
   foreach($residents as $resident){ factory('App\Note', 5)->create(['resident_id' => $resident->id]); }
   
   ```
   
   14. I've probably forgotten something, so if one of the steps doesn't work just let me know!
