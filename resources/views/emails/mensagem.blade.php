@component('mail::message')
# Introdução

O corpo da mensagem.

- Opção 1
- Opção 2
- Opção 3
- Opção 4

@component('mail::button', ['url' => ''])
Texto do botão 1
@endcomponent

@component('mail::button', ['url' => ''])
Texto do botão 2
@endcomponent

@component('mail::button', ['url' => ''])
Texto do botão 3
@endcomponent

Obrigado,<br>
{{ config('app.name') }}
@endcomponent
