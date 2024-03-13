# CardapioOnlineLaravel

# FORAM ATUALIZADAS AS DEPENDENCIAS DO PROJETO E CRIEI UM NOVO REPOSITORIO

# backend

## Crie um banco de dados com o nome vue-laravel-dashboard e configure seu usuário e senha no arquivo 
## .env.exemple renomeando o mesmo para .env
```
```
## O projeto usa Laravel 8
## Após ambiente configurado execute os seguintes comandos para criar as tabelas do banco de dados
## O usuário criado é admin@admin.com e a senha é admin e é o unico dado que será gerado,
## você pode cadastrar o cardápio e os demais itens

composer update

php artisan vendor:publish --provider="Intervention\Image\ImageServiceProviderLaravelRecent"

composer require intervention/image

php artisan make:request MenuStoreRequest

php artisan storage:link

php artisan config:clear

php artisan migrate
php artisan db:seed

php artisan serve

## frontend

## Instale o VUE e após 
## Execute o script para instalar as dependências
```
npm install
```

### Compilar e rodar o aplicativo em ambiente de desenvolvimento
```
npm run serve
```

### Compilar para ambiente de produção
```
npm run build
```

### Documentação do VUE
See [Configuration Reference](https://cli.vuejs.org/config/).

