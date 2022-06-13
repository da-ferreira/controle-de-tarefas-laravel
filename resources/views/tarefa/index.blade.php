@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <h3 class="card-title fw-bold text-center mb-3">Tarefas</h3>

                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Tarefa</th>
                                <th scope="col">Data limite de conclusão</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($tarefas as $tarefa)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $tarefa->id }}</td>
                                    <td>{{ $tarefa->tarefa }}</td>
                                    <td>{{ date('d/m/Y', strtotime($tarefa->data_limite_conclusao)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- Só mostra a paginação se o número de tarefas for maior que o número de itens por página --}}
                    @if ($tarefas->total() > $tarefas->perPage())
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $tarefas->currentPage() == 1 ? 'disabled' : '' }}"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>

                                @for ($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <li class="page-item {{ $tarefas->currentPage() == $tarefas->lastPage() ? 'disabled' : '' }}"><a class="page-link" href="{{ $tarefas->nextPageUrl() }}">Avançar</a></li>
                            </ul>
                        </nav>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
