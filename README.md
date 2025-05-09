# API para Controle de Estoque

Como forma de testar meus conhecimentos sobre APIs REST, desenvolvi esta API usando o framework Laravel e fiz uso do Postman para testar os endpoints e criar sua documentação.

## Instalação:

* Instale as dependências:
```
composer install
```
* Crie o arquivo .env (use o arquivo .env.example como referência) e faça as alterações necessárias para usar o banco de dados:

![image](https://github.com/user-attachments/assets/b6b490c8-44ef-496d-bc1d-85e05b2763a0)

* Faça as migrações:
```
php artisan migrate
```
* Preencha as tabelas:

```php
# Preencha a tabela marcas
php artisan db:seed --class=CreateMarcas
```
```php
# Preencha a tabela categorias
php artisan db:seed --class=CreateCategorias
```
```php
# Preencha a tabela unidades
php artisan db:seed --class=CreateUnidades
```
```php
# Preencha a tabela produtos
php artisan db:seed --class=CreateProdutos
```
```php
# Preencha a tabela fornecedores
php artisan db:seed --class=CreateFornecedores
```
```php
# Preencha a tabela entradas
php artisan db:seed --class=CreateEntradas
```
```php
# Inclui um usuário para autenticação
php artisan db:seed --class=CreateUsers
```
* Inicie a aplicação:
```php
php artisan serve
```

## Observações:

* Todas os endpoints para controle de estoque são protegidos pelo JWT-Auth, então é necessário gerar uma chave secreta:
```php
php artisan jwt:secret
```
## Credenciais de autenticação:

* E-mail: teste@teste.com
* Senha: teste123

## Documentação:

* https://documenter.getpostman.com/view/36701195/2sB2cPik6Z
