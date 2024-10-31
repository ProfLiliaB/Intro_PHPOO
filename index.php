<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHPOO</title>
</head>

<body>
    <h1>Gerenciamento de Usuários</h1>
    <h2>Pesquisar Usuários</h2>
    <form method="post" action="public/logar.php" id="login">
        <input type="text" id="login" name="login" placeholder="login">
        <input type="text" id="senha" name="senha" placeholder="senha">
        <button type="submit">Entrar</button>
        <div id="mensagem"></div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const msg = document.getElementById('mensagem');
            const form = document.getElementById('login');
            form.addEventListener('input', (e) => {
                e.preventDefault();
                let data = new FormData(form);
                listar(data);
            });
        });
        function listar(data) {
            fetch('public/logar.php', {
                    body: data,
                    method: 'POST'
                })
                .then((resposta) => {
                    if (resposta.ok) {
                        return resposta.text();
                    }
                })
                .then((dados) => {
                    msg.innerHTML = dados;
                });
        }
    </script>
</body>

</html>