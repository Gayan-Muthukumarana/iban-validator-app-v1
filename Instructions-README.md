# IBAN Validator App

This project consists of a Laravel backend with APIs for IBAN validation using `Laravel Passport` and a separate `Vue.js` front-end application.

## Backend

The backend is responsible for providing APIs for IBAN validation. It's built using Laravel, a PHP framework.

### Installation

1. Clone the repository:

```bash
git clone https://github.com/Gayan-Muthukumarana/iban-validator-app-v1.git
```

2. Navigate to the project directory::

```bash
cd iban-validator-app-v1
```

3. Install dependencies::

```bash
composer install
```

4. Set up environment variables:

* Copy the `.env.example` file to `.env`.
* Configure your database connection in the `.env` file.
* Generate an application key:
```bash
php artisan key:generate
```
5. Migrate and seed the database:
```bash
php artisan migrate --seed
```
6. Serve the application:
```bash
php artisan serve
```

### Usage
Once the backend is running, you can access the App.

## Frontend

The frontend is built using `Vue.js` to provide a user interface for interacting with the IBAN validation APIs.

### Installation

1. Clone the repository:

```bash
git clone https://github.com/Gayan-Muthukumarana/iban-validator-app-frontend-v1.git
```
2. Navigate to the project directory:

```bash
cd iban-validator-app-frontend-v1
```
3. Install dependencies:

```bash
npm install
```
4. Serve the application:
```bash
npm run serve
```
### Usage
Once the frontend is running, you can access it in your browser at http://localhost:3000.
