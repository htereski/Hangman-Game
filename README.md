# Rodando localmente

## Instale as dependências

```bash
  npm install
```
```bash
  composer install
```

## .env

```bash
  cp .env.example .env
```
```bash
  php artisan key:generate
```

## Migrations e Seeders

```bash
  php artisan migrate:fresh
```
```bash
  php artisan db:seed
```

## Gere um link simbólico

```bash
  php artisan storage:link
```

## Inicie o servidor

```bash
  npm run dev
```
```bash
  php artisan serve
```
