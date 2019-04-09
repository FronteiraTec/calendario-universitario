@extends('layouts.app', ['title' => __('meal Management')])

@section('content')
    <div class="header bg-gradient-primary pb-7 pt-5 pt-md-7">
        <div class="container-fluid">
            <h1 class="display-2 text-white">Cardápio</h1>
            <p class="text-white mt-0 mb-5">Refeições do RU</p>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Cardápios</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('meal.create') }}" class="btn btn-sm btn-primary">Adicionar cardápio</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Dia</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meals as $meal)
                                    <tr>
                                        <td>{{ $meal->day->format('d/m/Y') }}</td>
                                        <td>{{ $meal->name }}</td>
                                        <td>{{ $meal->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            <!-- { $meals->links() } -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection