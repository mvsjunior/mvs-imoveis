@extends('auth.loginTemplate.app')

@section('main')
    <div class="">
        <form class="form-auth" action={{route('register')}} method="POST">
            @csrf()
            <img src="http://mvsimoveis.local/img/house.png" alt="">
            <h3 class="text-center">MVS Imóveis</h3>
            <p class="text-center">Registrar uma nova conta</p>
            <input class="form-control" name="nome" type="text" placeholder="Nome" required>
            <input class="form-control" name="sobrenome" type="text" placeholder="Sobrenome" required>
            <input class="form-control" name="email" type="email" placeholder="Email" required>
            <input class="form-control" name="password" type="password" placeholder="Password" required>
            <input class="form-control" name="confirmPassword" type="password" placeholder="Digite novamente o Password" required>
            <input class="btn btn-primary mt-3 p-2 bold" type="submit" value="Registrar">
        </form>
    </div>
@endsection