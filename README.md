# Implement Laravel Localization to develop a dynamic Multi-Language website 
This Laravel demo application is to show how you can create a dynamic multi-language website using Laravel Localization. You can store Languages in a database table and show a dropdown to the user to select the language. Also, you can enter data in multiple languages using a form. The form will dynamically create multiple tabs for each language to enter data. It uses a Translation table to store the name and description fields in different languages. If a new Language is added to the database, you only need to create a Laravel Translation file for that language and place it in the ‘lang’ folder. You don't have to change any code.

# How To Use
1. Download the repository from https://github.com/sundarsau/lara_lang

2. Extract it into a folder

3. Create a Database in MySQL

4. Copy .env.example to .env and update database name, username and password. For example, I used the database lara_form and updated database details as below:

   DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=lara_lang DB_USERNAME=root DB_PASSWORD=

5. Run composer install from project root

6. Run php artisan key:generate

7. Run php artisan migrate. This will create Laravel default tables and three custom tables languages, categories and category_translations

8. Run php artisan serve

9. In Browser run localhost:8000

   You can add/update languages, you can add/update categories in different languages.

License
This is an MIT license, you can modify the code according to your requirements
