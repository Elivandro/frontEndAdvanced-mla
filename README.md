# Mentoria Laravel Architect - [Beer And Code](https://github.com/beerandcodeteam)

## Framework:
- [**Laravel 10**](https://laravel.com/)


## Requerimenos minimos

- [**Docker**](https://docs.docker.com/engine/install/)
- [**Git**](https://git-scm.com/)


<hr>

### Como rodar a aplicação:

Cópie o repositório:

```
git clone git@github.com:Elivandro/frontEndAdvanced-mla.git
cd frontEndAdvanced-mla
```

renomeie arquivo de variaveis env

```
cp .env.example .env
```

Para instalar as dependências do composer:

```
docker run --rm -it\
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Inicie o sail
```
./vendor/bin/sail up -d
```

Para instalar as dependências do npm:
```
./vendor/bin/sail npm install
```

Gere uma chave para aplicação

```
./vendor/bin/sail artisan key:generate
```

configure no arquivo .env

```
APP_NAME

DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
rode as migrações

```
./vendor/bin/sail artisan migrate
```

coloque alguns dados no banco

```
./vendor/bin/sail artisan db:seed
```

rodar o vite

```
./vendor/bin/sail npm run dev
```

coloque um apelido ao sail
```
https://laravel.com/docs/10.x/sail#configuring-a-shell-alias
```