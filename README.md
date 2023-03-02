
# Laravel Kanban Board

In this application, I build a Kanban-like Board using PHP Laravel, InertiaJS, Vue.Draggable, and Taliwind css.

The goal is not the board by itself, but rather to demonstrate how to batch update reordering multiple columns with multiple cards, all at once.

There are several ways to achieve this goal, however, I've chosen a built option, which using the Eloquent upsert() method.


<img width="1396" alt="Screenshot 2023-03-02 at 9 11 00 PM" src="https://user-images.githubusercontent.com/1163421/222528207-9514609b-cea9-4ce8-8d50-2ff1a62f1bbd.png">


## Installation

I use Laravel Sail over Docker to build and develop this application. However, you could easily run this application locally without having Laravel Sail.

Follow the steps below to install and run the application locally.


1. Clone this project
2. Go to the folder application using `cd` command on your `cmd` or terminal
3. Run composer install
4. Copy .env.example file to .env on the root folder. 
5. Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
6. Run php artisan key:generate
7. Run php artisan migrate
8. Run php artisan db:seed
9. Run npm install to install all JavaScript dependencies
10. Run npm run dev to start the application
11. Visit the application in the browser


## Authors

- [@bhaidar](https://www.github.com/bhaidar)


## License

This package is licensed under the [MIT License](https://choosealicense.com/licenses/mit/).

