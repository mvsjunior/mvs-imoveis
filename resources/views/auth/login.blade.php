@extends('auth.loginTemplate.app')

@section('main')
        <form class="justify-center form-auth" action={{route('login')}} method="POST">
            @csrf()
            <img src="http://mvsimoveis.local/img/house.png" alt="">
            <h3 class="text-center">MVS Imóveis</h3>
            <input class="form-control" name="email" type="email" placeholder="Email" required>
            <input class="form-control" name="password" type="password" placeholder="Password" required>
            <input class="btn btn-primary " type="submit" value="Login">
        </form>
@endsection