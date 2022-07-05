<?php

namespace App\Http\Controllers;

use App\Exports\TarefasExport;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TarefaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarefas = Tarefa::where('user_id', auth()->user()->id)->paginate(10);
        return view('tarefa.index', ['tarefas' => $tarefas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all('tarefa', 'data_limite_conclusao');
        $dados['user_id'] = auth()->user()->id;

        $tarefa = Tarefa::create($dados);

        // Enviando um email ao usuário logado (autenticado), notificando a criação de uma nova tarefa
        Mail::to(auth()->user()->email)->send(new NovaTarefaMail($tarefa));

        return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarefa $tarefa)
    {
        if (auth()->user()->id == $tarefa->user_id) {
            return view('tarefa.edit', ['tarefa' => $tarefa]);
        }

        return view('acesso_negado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        if (auth()->user()->id == $tarefa->user_id) {
            $tarefa->update($request->all());
            return redirect()->route('tarefa.show', $tarefa->id);
        }

        return view('acesso_negado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        if (auth()->user()->id == $tarefa->user_id) {
            $tarefa->delete();
            return redirect()->route('tarefa.index')->with('message', 'Post deleted successfully');
        }

        return view('acesso_negado');
    }

    /**
     * Exporta todas as tarefas em XLSX ou CSV.
     *
     * @param [string] $extension Deve ser 'xlsx' ou 'csv'
     */
    public function export($extension)
    {
        if (in_array($extension, ['xlsx', 'csv'])) {
            return Excel::download(new TarefasExport(), 'tarefas.' . $extension);
        }

        return redirect()->route('tarefa.index');
    }

    /**
     * Exporta todas as tarefas para PDF
     *
     * @return void
     */
    public function exportPdf()
    {
        $pdf = PDF::loadView('tarefa.pdf', ['tarefas' => auth()->user()->tarefas()->get()]);

        // 1º parametro: tipo de papel -> a4, letter
        // 2º parametro: orientação -> landscape (paisagem), portrait (retrato [padrão])
        $pdf->setPaper('a4', 'portrait');

        // return $pdf->download('tarefas.pdf');
        return $pdf->stream('tarefas.pdf');
    }
}
