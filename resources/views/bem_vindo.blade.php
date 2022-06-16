
{{-- Executa o conteúdo se o usuário estiver autenticado --}}
@auth
    <h1>Usuário autenticado</h1>
    <p>ID: {{ Auth::user()->id }}</p>
    <p>Nome: {{ Auth::user()->name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
@endauth

{{-- Oposto do auth, executa seu conteúdo se o usuário não estiver autenticado (guest = convidado) --}}
@guest
    <p>Olá visitante</p>
@endguest
