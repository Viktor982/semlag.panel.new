## NopingTunnel Admin dashboard

[Requirements](#requirements-link)

[Configuration](#config-link)

[Docs](docs/index.md)


<a name="requirements-link"></a>
## Requirements:
- nodeJS 6.0 (or higher)
- PHP 7.0 (or higher)
- Composer

## Installation:

You can automatic install by execute bash script utils/install.sh , or follow the following steps:

```bash
composer install
npm install
gulp
```
<a name="config-link"></a>
## Configuration:

All sensible data configuration is located at .env file or at machine ENV, the .env file must be something like:

## Database
```ini
DB_DRIVER=
DB_HOST=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
DB_PREFIX=
DB_PORT=
```

## Mailgun
```ini
MAILGUN_KEY=
```
## Recaptcha
```ini
RECAPTCHA_SECRET=
RECAPTCHA_PUBLIC=
```
## Mercadopago
```ini
MP_ACCESS_TOKEN=
```
## Paypal
```ini
PP_USERNAME=
PP_PASSWORD=
PP_SIGNATURE=
```
## Environment
```ini
ENV=development
```
