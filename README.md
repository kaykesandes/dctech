# DC Tech Project

Este é o projeto da DC Tech.

## Requisitos

Certifique-se de ter as seguintes ferramentas instaladas em seu sistema:

- PHP (>= 7.x)
- Composer
- Node.js
- npm
- MySQL (ou outro banco de dados suportado pelo Laravel)

## Configuração

1. Clone o repositório:

   ```bash
   git clone https://github.com/kaykesandes/dctech.git
   ```
2. Instale as dependências do PHP:

   ```bash
   composer install
   ```
3. Copie o arquivo de ambiente:

    No Linux/Mac:
     ```bash
    cp .env.example .env
     ```

    No Windows Command Prompt:
    ```bash
    copy .env.example .env

     ```
4. Gere a chave de criptografia:

     ```bash
    php artisan key:generate
     ```
5. Instale as dependências do Node.js:

     ```bash
    npm install
     ```
6. Compile os ativos do frontend:

    ```bash
    npm run build
     ```

# Executando o Projeto
Execute o servidor de desenvolvimento do Laravel:

    php artisan serve
    

Acesse o projeto em http://localhost:8000.
