# Laravel/React URL Shortener

This project is a URL shortening service built with Laravel and React. It allows users to shorten long URLs for easier sharing and tracking.

## Prerequisites

Before you begin, ensure you have the following installed on your local machine:
- PHP (7.4 or higher)
- Composer
- Node.js
- NPM

## Installation

1. Clone the repository:
   ```
   git clone https://github.com/Bishopafl/url-shortener.git
   ```
2. Navigate to the project directory:
   ```
   cd url-shortener
   ```
3. Install PHP dependencies:
   ```
   composer install
   ```
4. Install NPM packages:
   ```
   npm install
   ```
5. Copy the `.env.example` file to `.env`:
   ```
   cp .env.example .env
   ```
6. Generate an application key:
   ```
   php artisan key:generate
   ```
7. Run migrations:
   ```
   php artisan migrate
   ```
8. Build the front-end assets:
   ```
   npm run dev
   ```

## Adding a CSV File

1. Create a CSV file named `urls.csv` with the first column named `long_url` containing the URLs you want to shorten.
2. Place this file in the root directory of your project.

## Running the Application

Start the Laravel server:
```
php artisan serve
```
Your URL shortener should now be running on [http://localhost:8000](http://localhost:8000)..
