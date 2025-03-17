# API para Controle de Estoque

Como forma de testar meus conhecimentos sobre APIs REST, desenvolvi esta API usando o framework Laravel e fiz uso do Postman para testar os endpoints.

## Instalação:

* Instale as dependências:
```
composer install
```
* Crie o arquivo .env (uso o arquivo .env.example como referência) e faça as alterações necessárias para usar o banco de dados:

![image](https://github.com/user-attachments/assets/b6b490c8-44ef-496d-bc1d-85e05b2763a0)

* Faça as migrações:
```
php artisan migrate
```
* Preencha as tabelas:

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
* Inicie a aplicação:
```php
php artisan serve
```
# Próximo passo:

* Documentar a API usando o Postman.
