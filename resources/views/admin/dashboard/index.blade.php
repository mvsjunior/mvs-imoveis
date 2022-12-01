@extends('layout.app')

@inject('viewModel', '\App\ViewModels\DashboardViewModel')
@section('main')
    <h1 class="p-2"><svg class="bi pe-none" width="32" height="32"><use xlink:href="#speedometer2"/></svg> Dashboard</h1>
        <hr>
        {{-- Sessão Cards --}}
        <div class="dashboard-cards col-12">
        {{-- Card - Totais imóveis --}}
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-header d-flex">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-houses-fill me-2 mt-1 ms-2" viewBox="0 0 16 16">
                <path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.51 2.51 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354L7.207 1Z"/>
                <path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Z"/>
            </svg>
            <h5>Imóveis Cadastrados</h5>
            </div>
            <div class="card-body">
            <h4>{{$viewModel->getNumTotalProperties() . " Imóveis"}}</h4>
            </div>
        </div> {{-- Card - Totais imóveis #end --}}

        {{-- Card - imóveis disponíveis --}}
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-lock-fill me-2 mt-1 ms-2" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                <path d="m8 3.293 4.72 4.72a3 3 0 0 0-2.709 3.248A2 2 0 0 0 9 13v2H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                <path d="M13 9a2 2 0 0 0-2 2v1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h4a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1v-1a2 2 0 0 0-2-2Zm0 1a1 1 0 0 1 1 1v1h-2v-1a1 1 0 0 1 1-1Z"/>
                </svg>
                <h5>Imóveis Alugados</h5>
            </div>
            <div class="card-body">
                <h4>{{$viewModel->getNumPropertiesRented() . " Imóveis" }}</h4>
            </div>
        </div> {{-- Card - imóveis disponíveis #end --}}

        {{-- Card - imóveis disponíveis para alugar --}}
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-check-fill me-2 mt-1 ms-2" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                </svg>
                <h5>Disponíveis p/ Alugar</h5>
            </div>
            <div class="card-body">
                <h4>{{$viewModel->getNumPropertiesNotRented() . " Imóveis"}} </h4>
            </div>
        </div> {{-- Card - imóveis disponíveis para alugar #end --}}
    </div> {{-- .dashboard-cards #end --}}
@endsection