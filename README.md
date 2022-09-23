There are following requirements for the assignment.

Create order
Show max and least sale car.


I have used Laravel framework as backend technology. While for frontend i used a simple bootstrap admin panel used jquery to post data.

I have build a simple system where user just login to our system and can create order via add order page. 
Also user can see list of orders. i have just show latest 10 records at the moment.
I have written case to get payment details for case. you can use following api to get payment details for any customer.

{{base_url}}/api/check-customer-payment
method: POST
Body request:

{
    "customerNumber": "497",
    "checkNumber": "234324"
}


Please use following command to run the project at your end

git clone https://github.com/mohsin980/task.git

create database task. (you may find database in the repo. i have used the one provided by you just added migrations for it and added primary ids.)

composer install
php artisna key:generate
php artisan optimize
php artisan migrate (you may import db directly)
php artisan db:seed (user data)

npm install
npm install -g gulp-cli
gulp serve

php artisna serve


login to system  using below credentials

admin@gmail.com
Password@1