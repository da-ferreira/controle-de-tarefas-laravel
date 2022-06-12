@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">{{ $tarefa->tarefa }}</h5>

                    <fieldset disabled class="justify-content-center">
                        <div class="mb-3 col-md-5 mx-auto">
                            <label for="date-limit-task">Data limite de conclusão</label>
                            <input type="date" class="form-control bg-white text-center" value="{{ $tarefa->data_limite_conclusao }}" id="date-limit-task">
                        </div>
                    </fieldset>

                    <div class="text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
