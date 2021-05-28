# Pulses Challenge
## Indíce
* [Sobre](#sobre)
* [Requisitos](#requisitos)
* [Setup](#setup)
* [Docker Setup](#docker-setup)
* [Links](#links)

## Sobre

Este projeto tem o objetivo de criar instrumentos de pesquisa com perguntas de diferentes formatos.

## Requisitos
- PHP 7.3 ou mais recente
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- [composer](https://getcomposer.org/doc/00-intro.md) (caso use container)
- [docker-compose](https://docs.docker.com/compose/install) (caso use container)

## Setup

Instale as dependências do PHP:

```sh
$ composer install
```
<sub>Use a flag `--no-dev`, caso esteja em produção.</sub>

Instale as dependências do JavaScript (caso esteja em desenvolvimento):

```sh
$ npm i
```

Edite as configurações no arquivo `.env`:
```sh
$ cp .env.example .env && nano .env
```

Gera uma chave de aplicação:
```sh
$ php artisan key:generate
```

Rode as migrations e seeds:
```sh
$ php artisan migrate --seed
```

Rode o programa utilizando o php-cli:
```sh
$ php artisan serve
```

A aplicação ficaria disponível através do link: http://localhost:8000.

## Docker Setup

Configure o arquivo .env seguindo as configurações do .env.example (para funcionar, basta copiar e colar o conteúdo).

Instale as dependências do PHP:
```sh
$ composer install
```

Suba o container:
```sh
composer docker up
```

Rode as migrations e seeds:
```sh
composer docker-migrate
```

A aplicação ficaria disponível através do link: http://localhost:8000.

Para parar o container:
```sh
composer docker down
```

Para acessar o artisan:
```sh
composer docker artisan <command>
```

## Links

https://laravel.com/docs

https://docs.docker.com/compose/install

https://travis-ci.com/