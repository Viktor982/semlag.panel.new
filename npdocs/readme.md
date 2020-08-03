## Requirements:
- nodeJS 6.0 (or higher)
- PHP 7.0 (or higher)
- Composer

## Installation:

You can automatic install by execute bash script utils/install.sh , or follow the following steps:

```
composer install
npm install
gulp
```

## Configuration:

All sensible data configuration is located at .env file or at machine ENV, the .env file must be something like:

## Database
```
DB_DRIVER=
DB_HOST=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
DB_PREFIX=
DB_PORT=
```

## Mailgun
```
MAILGUN_KEY=
```
## Recaptcha
```
RECAPTCHA_SECRET=
RECAPTCHA_PUBLIC=
```
## Mercadopago
```
MP_ACCESS_TOKEN=
```
## Paypal
```
PP_USERNAME=
PP_PASSWORD=
PP_SIGNATURE=
```
## Environment
```
ENV=development
```
