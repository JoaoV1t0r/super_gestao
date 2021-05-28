<h3>Fornecedores</h3>
{{-- Comentarios no blade --}}

{{-- @dd($fornecedores) --}}

@if (count($fornecedores) > 0 && count($fornecedores) < 3)
    <h3>Existem Alguns fornecedores</h3>

@elseif(count($fornecedores) >= 3)
    <h3>Existem muitos fornecedores</h3>
@endif

{{-- @unless executa se o retorno for falso(Inverso do if) --}}
{{-- @endunless --}}

{{-- @isset(Igual a função isset() do PHP puro ) --}}
{{-- @endisset --}}

{{-- @empty -> Retorna true se a variável for vazio(Igula PHP puro)
@endempty --}}

{{-- @switch() -> Igual PHP puro
    @case()
        @break
    @case()
        @break
    @default
@endswitch --}}

{{-- @for($i = 0; $i < 10; $i++) -> Igual PHP puro
@endfor --}}


{{-- @while(true) -> Igual PHP puro
@endwhile --}}

{{-- @foreach($array as $key => $value)
@endforeach --}}

{{-- @forelse()
    Executa se existir valor
    @empty
    Executa se não estiver vazio
    @endempty
@endforelse --}}

{{-- @{{ $fornecedores }} --}}

{{-- {{ $loop->iteration }} ->Iteração atual(Foreach e Forelase)
{{ $loop->first e $loop->last }} --}}


@php
//Bloco de php puro no blade
@endphp