@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title fw-bold text-center mb-3">Editar tarefa</h3>

                    <form action="{{ route('tarefa.update', $tarefa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control bg-white" id="task-name" name="tarefa" placeholder="Tarefa" value="{{ $tarefa->tarefa }}">
                            <label for="task-name">Tarefa</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" class="form-control bg-white" id="date-limit-task" name="data_limite_conclusao" value="{{ $tarefa->data_limite_conclusao }}">
                            <label for="date-limit-task">Data limite de conclusão</label>
                        </div>

                        <div class="text-center" id="div-botao-cadastrar-tarefa">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
