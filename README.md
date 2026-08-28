# MY LARAVEL WEBSITE PORTFOLIO

Welcome to my personal portfolio repository! This web application is developed as part of my **Prelim Requirement**. It highlights my web development projects, personal skill set, and my background as a developer.


## PROJECT DETAILS

* **Backend:** PHP / Laravel Framework
* **Frontend:** HTML5, CSS3, JavaScript, Laravel Blade
* **Database:** SQLite
* **Version Control:** Git & GitHub


## SET-UP INSTRUCTIONS

If you would like to test or view this project on your local machine, run the following commands in order:

```bash
# 1. Clone the repository
git clone [https://github.com/llagunojerrahmae/my-portfolio.git](https://github.com/llagunojerrahmae/my-portfolio.git)
cd my-portfolio

# 2. Install PHP dependencies
composer install

# 3. Set up the environment file & key
cp .env.example .env
php artisan key:generate

# 4. Run database migrations
php artisan migrate

# 5. Start the local development server
php artisan serve