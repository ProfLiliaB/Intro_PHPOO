<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHPOO</title>
</head>

<body>
    <section>
        <h1>Gerenciamento de Usuários</h1>
        <form action="processa.php" method="post">
            <input type="hidden" name="action" value="create">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required><br>
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required><br>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required><br>
            <button type="submit">Cadastrar</button>
        </form>
    </section>
    <section>
        <h2>Atualizar Usuário</h2>
        <form action="processa.php" method="post">
            <input type="hidden" name="action" value="update">
            <label for="cpf_update">CPF:</label>
            <input type="text" id="cpf_update" name="cpf" required><br>
            <label for="nome_update">Nome:</label>
            <input type="text" id="nome_update" name="nome"><br>
            <label for="email_update">Email:</label>
            <input type="email" id="email_update" name="email"><br>
            <label for="senha_update">Senha:</label>
            <input type="password" id="senha_update" name="senha"><br>
            <label for="status_update">Status:</label>
            <input type="text" id="status_update" name="status"><br>
            <button type="submit">Atualizar</button>
        </form>
    </section>
    <section>
        <h2>Deletar Usuário</h2>
        <form action="processa.php" method="post">
            <input type="hidden" name="action" value="delete">
            <label for="cpf_delete">CPF:</label>
            <input type="text" id="cpf_delete" name="cpf" required><br>
            <button type="submit">Deletar</button>
        </form>
    </section>
</body>

</html>