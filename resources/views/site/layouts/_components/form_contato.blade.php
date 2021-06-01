<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $borda }}">
    @if($errors->has('nome'))
        <div class="alert-danger my-1 rounded p-1 ">
            {{$errors->first('nome')}}
        </div>
    @endif
    <br>

    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $borda }}">
    @if($errors->has('telefone'))
        <div class="alert-danger my-1 rounded p-1 ">
            {{$errors->first('telefone')}}
        </div>
    @endif
    <br>

    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $borda }}">
    @if($errors->has('email'))
        <div class="alert-danger my-1 rounded p-1 ">
            {{$errors->first('email')}}
        </div>
    @endif
    <br>

    <select name="motivo_contatos_id" value="{{ old('motivo_contatos_id') }}" class="{{ $borda }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)

            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}
            </option>

        @endforeach
    </select>
    @if($errors->has('motivo_contatos_id'))
        <div class="alert-danger my-1 rounded p-1 ">
            {{$errors->first('motivo_contatos_id')}}
        </div>
    @endif
    <br>

    {{-- <textarea name="mensagem" class="{{ $borda }}">{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea> --}}
    <textarea name="mensagem" class="{{ $borda }}" placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') != '' ? old('mensagem') : '' }}</textarea>
    @if($errors->has('mensagem'))
        <div class="alert-danger my-1 rounded p-1 ">
            {{$errors->first('mensagem')}}
        </div>
    @endif
    <br>

    <button type="submit" class="{{ $borda }}">ENVIAR</button>
</form>
