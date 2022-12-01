@extends('layout.app')
@inject('viewModel', '\App\ViewModels\PropertyViewModel')
@section('main')
        <h1 class="p-2"><svg class="bi pe-none" width="32" height="32"><use xlink:href="#home"/></svg> Imóveis</h1>
        <hr>
        {{-- Sessão Cards --}}
        <div class="col-2 m-4">
            <button class="btn btn-sm btn-outline-success p-2">
               <b>+</b> Adicionar Imóvel
            </button>
        </div>
        <div class="table-container col-10 ms-4 table-responsive">
            <table class="table table-sm table-striped table-hover">
                <thead class="table-dark" >
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Logradouro</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Status</th>
                    <th></th>
                </thead>
                <tbody class="table-group-divider">
                    @foreach($viewModel->getAllProperties() as $property)
                        <tr>
                            <td>{{str_pad($property->id, 3, '0', STR_PAD_LEFT); }}</td>
                            <td>{{$property->title}}</td>
                            <td>{{$property->addr_cep}}</td>
                            <td>{{$property->addr_number}}</td>
                            <td>{{$property->addr_number}}</td>
                            <td>{{$property->is_rented == 1 ? "Alugado" : "Disponível"}}</td>
                            <td>
                                <a href="#" style="color:blue;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-up-left " viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M7.364 3.5a.5.5 0 0 1 .5-.5H14.5A1.5 1.5 0 0 1 16 4.5v10a1.5 1.5 0 0 1-1.5 1.5h-10A1.5 1.5 0 0 1 3 14.5V7.864a.5.5 0 1 1 1 0V14.5a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5H7.864a.5.5 0 0 1-.5-.5z"/>
                                        <path fill-rule="evenodd" d="M0 .5A.5.5 0 0 1 .5 0h5a.5.5 0 0 1 0 1H1.707l8.147 8.146a.5.5 0 0 1-.708.708L1 1.707V5.5a.5.5 0 0 1-1 0v-5z"/>
                                    </svg>
                                </a>
                                <a href="#" class="m-2 "style="color: green">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                <a href="#" style="color: tomato">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection