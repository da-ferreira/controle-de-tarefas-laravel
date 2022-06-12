@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center fw-bold">Adicionar tarefa</div>

                <div class="card-body">
                    <form action="{{ route('tarefa.store') }}" method="POST">
                        @csrf

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-white" id="task-name" name="tarefa" placeholder="Tarefa">
                            <label for="task-name">Tarefa</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control bg-white" id="date-limit-task" name="data_limite_conclusao">
                            <label for="date-limit-task">Data limite de conclusão</label>
                        </div>

                        <div class="text-center" id="div-botao-cadastrar-tarefa">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
