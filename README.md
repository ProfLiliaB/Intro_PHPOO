# Conteúdo criado para aula de Introdução ao PHP Orientado a Objetos
Este projeto é um sistema de gerenciamento de usuários que utiliza PHP para operações de CRUD (Create, Read, Update, Delete) e MySQL como banco de dados.

## Funcionalidades
- **Cadastro de Usuários**: Adicione novos usuários ao sistema.
- **Leitura de Usuários**: Visualize todos os usuários cadastrados em uma tabela responsiva.
- **Atualização de Usuários**: Atualize as informações dos usuários existentes.
- **Exclusão de Usuários**: Remova usuários do sistema.
- **Pesquisa de Usuários**: Pesquise usuários pelo nome, CPF ou email.

## Tecnologias Utilizadas
- **PHP**: Linguagem de programação utilizada para o backend.
- **MySQL**: Banco de dados utilizado para armazenar os dados dos usuários.
- **HTML/CSS**: Utilizados para a interface do usuário.
- **Javascript**: Utilizado para a função de pesquisa em tempo real (sem recarregar a página)

## Instalação
1. Clone o repositório:
    ```bash
    git clone https://github.com/seu-usuario/seu-repositorio.git
    ```
2. Instale as dependências do PHP:
    ```bash
    composer install
    ```
3. Configure o banco de dados MySQL:
    - Crie um banco de dados no MySQL.
    - Atualize as credenciais do banco de dados no arquivo `Database.php`.
4. Execute o servidor PHP:
    ```bash
    php -S localhost:8000
    ```
5. Acesse o sistema no navegador:
    ```
    http://localhost:8000
    ```

## Uso

### Cadastro de Usuários
Preencha o formulário de cadastro com as informações do usuário e clique em "Cadastrar".

### Leitura de Usuários
Acesse a lista de usuários para visualizar todos os usuários cadastrados.

### Atualização de Usuários
Preencha o formulário de atualização com as novas informações do usuário e clique em "Atualizar".

### Exclusão de Usuários
Clique no link "Excluir" ao lado do usuário que deseja remover.

### Pesquisa de Usuários
Use o campo de pesquisa para procurar usuários pelo nome, CPF ou email.


Feito com ❤️ por ProfLilia