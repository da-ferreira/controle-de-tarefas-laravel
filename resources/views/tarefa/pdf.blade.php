<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>
        .titulo {
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 30px;
        }

        .tabela {
            width: 100%;
        }

        table th{
            text-align: center;
        }

        .td-center {
            text-align: center;
        }

    </style>
</head>
<body>
    <h2 class="titulo">Lista de tarefas</h2>

    <table class="tabela">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Data limite de conclusão</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarefas as $tarefa)
                <tr>
                    <td class="td-center">{{ $tarefa->id }}</td>
                    <td style="padding-left: 20px;">{{ $tarefa->tarefa }}</td>
                    <td class="td-center">{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
