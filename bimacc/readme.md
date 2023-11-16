## Laravel SB Admin Template

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This project implements [Startbootstrap SB-Admin](https://startbootstrap.com/template-overviews/sb-admin/) on [Laravel 5.7](http://www.laravel.com) views 
using a separate admin layout on the default home view (After authentication).

## Installation

### Step 1

Clone the repository and install Composer & NPM dependencies.
```sh
git clone https://github.com/ajrmzcs/laravel-sb-admin.git [YourProjectDirectory]
cd [YourProjectDirectory] 
composer install && npm install
npm run dev
```

### Step 2
Create a test MySQL database
Set your on .env your DB credentials
Run migrations
```sh
php aritsan migrate
```

### Step 3
Start development server
```sh
php aritsan serve
```

### Step 4
Register a new user

#### Next Steps
* Separate admin panel sections in partials/components
* Use html blade tables, instead of JQuery Datatable and retrieve data from a model
* Implement an optional vue component for fetching table data via AJAX
