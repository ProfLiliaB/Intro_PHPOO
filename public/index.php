<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHPOO</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        @media screen and (max-width: 600px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
                margin-bottom: 5px;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>
    <h1>Gerenciamento de Usuários</h1>
    <h2>Pesquisar Usuários</h2>
    <form method="post" id="pesquisa">
        <label for="search">Pesquisar:</label>
        <input type="text" id="search" name="search" placeholder="Pesquisar">
    </form>
    <h2>Lista de Usuários</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="usuarios">
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const usuarios = document.getElementById('usuarios');
            const form = document.getElementById('pesquisa');
            listar();
            form.addEventListener('input', (e) => {
                e.preventDefault();
                let data = new FormData(form);
                listar(data);
            });
        });
        function listar(data) {
            fetch('lista_usuarios.php',{
                    body: data,
                    method: 'POST'
                })
                .then((resposta) => {
                    if (resposta.ok) {
                        return resposta.text();
                    }
                })
                .then((dados) => {
                    usuarios.innerHTML = dados;
                });
        }
    </script>
</body>

</html>