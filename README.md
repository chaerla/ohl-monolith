## Description

This is a monolith web-app for OHL LABPRO 2023. This service fepends on this [backend service](https://github.com/chaerla/be-single-service) app. 

## Author
**13521044 Rachel Gabriela Chen**

## Initialization

- Copy `.env.example` into `.env` and fill with your local env variables. The API_URL variable is the URL where the backend service is running.

## Installation

```bash
$ composer install
```

## Running the app

### local
```bash
# development
$ npm run dev #to pack the frontend assets
$ php artisan serve
```

### with docker
```bash
$ npm run dev #to pack the frontend assets
$ ./vendor/bin/sail up
```

## Design Patterns
### Model-View-Controller (MVC) pattern:
The MVC pattern is the core architectural design pattern in Laravel. It helps in separating the application logic into tModel, View, Controller

## Tech Stack
- Laravel Framework 10.15.0
- Bootstrap
- JQuery
- TailwindCSS
- mysql

## Endpoints
### API
#### auth/login: POST
#### auth/register: POST
#### auth/logout: POST
#### auth/refresh: POST
#### buy-item: POST
#### invoices: POST

### Frontend
#### / : GET
#### item/{id} : GET
#### /purchase-history : GET

## Bonus
### B06 - Responsive Layout

