<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="logo">
      <img src="http://localhost:8000/img/logo.png">
    </div>

    <div class="menu">
      <ul>
        <li><a href="{{ route('app.home') }}">Home</a></li>
        <li><a href="{{ route('cliente.index') }}">Cliente</a></li>
        <li><a href="{{ route('pedido.index') }}">Pedidos</a></li>
        <li><a href="{{ route('app.fornecedor') }}">Fornecedor</a></li>
        <li><a href="{{ route('produto.index') }}">Produto</a></li>
        <li><a href="{{ route('app.sair') }}">Sair</a></li>
      </ul>
    </div>
  </div>
</nav>
