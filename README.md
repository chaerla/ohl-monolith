## Description

This is a monolith web-app for OHL LABPRO 2023. This service fepends on this [backend service](https://github.com/chaerla/be-single-service) app. 

## Author
**13521044 Rachel Gabriela Chen**

## Installation

```bash
$ composer install
```

## Running the app

### Run the [API](https://github.com/chaerla/be-single-service) service

### local
- Copy `.env.local.example` into `.env` and fill with your local env variables. The API_URL variable is the URL where the backend service is running.
```bash
# development
$ npm run dev #to pack the frontend assets
$ php artisan serve --env=local
```

### with docker
- Has to be run via wsl/linux
- Copy `.env.sail.example` into `.env`. Modify only the API_URL. If running via wsl, the host should be windows' IP. 
```bash
$ npm run dev #to pack the frontend assets
$ ./vendor/bin/sail up
```

### Register
![image](https://github.com/chaerla/ohl-monolith/assets/91037907/9b9acbf0-15df-4e4b-9e8f-e4dfea6bbaef)

### Login
![image](https://github.com/chaerla/ohl-monolith/assets/91037907/7d4b2a00-8992-4d9f-adcf-13b26ef8e241)

### Dashboard
![image](https://github.com/chaerla/ohl-monolith/assets/91037907/c076d20e-ee58-4725-a076-8653779feba9)

### Buy Item
![image](https://github.com/chaerla/ohl-monolith/assets/91037907/98de1473-0ee6-4669-a528-fe526fc84ce8)

### Purchase History
![image](https://github.com/chaerla/ohl-monolith/assets/91037907/903add54-13f9-421b-b991-9cb7c903c646)





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
| ENDPOINT          | METHOD |
|-------------------|--------|
| /auth/login       | POST   |
| /auth/register    | POST   |
| /auth/logout      | POST   |
| /auth/refresh     | POST   |
| /buy-item         | POST   |
| /invoices         | GET    |
| /                 | GET    |
| /login            | GET    |
| /register         | GET    |
| /item/:id         | GET    |
| /purchase-history | GET    |

## Bonus
### B06 - Responsive Layout

