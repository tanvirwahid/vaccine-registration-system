To run this application

1) Make sure you have php8.2 and necessary extensions installed and running on your machine.
2) Clone this repo
3) Go to the project folder, open a terminal and run 'composer install'.
4) Run 'cp .env.example .env'
5) Put database credentials here

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=database_name

DB_USERNAME=database_username

DB_PASSWORD=db_password

6) Make sure BROADCAST_CONNECTION=pusher
7) Put your pusher credential here

PUSHER_APP_ID=

PUSHER_APP_KEY=

PUSHER_APP_SECRET=

PUSHER_APP_CLUSTER=

8) Put necessary mail configuration/credential here 
MAIL_MAILER=log

MAIL_HOST=127.0.0.1

MAIL_PORT=2525

MAIL_USERNAME=null

MAIL_PASSWORD=null

MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS="hello@example.com"

MAIL_FROM_NAME="${APP_NAME}"

You can use mailtrap for testing

9) Run 'php artisan migrate' and 'php artisan db:seed'
10) Run 'php artisan key:generate'
11) Run 'php artisan serve'
12) Open another terminal and run 'php artisan queue:work'.
12) Open another terminal and run 'npm install'
13) After dependencies are installed run 'npm run dev'
14) Open browser and go to http://localhost:8000 (port may be different if something is already running there)
15) To check email notification run 'php artisan send-mail-notification'.

**Notes**
1) If sms notification support is needed, then we have to create a migration file to add mobile/phone column to users table. Then we have to open config/users.php file and add that column and necessary validation rule there. Also we need to check if phone/mobile column is empty during sending notification.
2) From the requirement, it seems we have to schedule vaccination asynchronously, so I did that.
3) In real life application, nids would be checked against some government database using some api. I simulated it by seeding some dummy user data in database (Available nids are 30000000001, 30000000002, ......, 30000000050). Since in real life, we would have to do it asynchronously, I used queue to simulate that and used pusher and socket.io to notify the user.
