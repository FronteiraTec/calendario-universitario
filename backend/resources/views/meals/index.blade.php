@extends('layouts.app', ['title' => 'Gerenciar Cardápios'])

@section('content')
    @include('layouts.headers.title-header', ['title' => 'Cardápios']) 

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Lista de Cardápios</h3>
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
                                    <th scope="col">Descrição</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meals as $meal)
                                    <tr>
                                        <td>{{ $meal->day->format('d/m/Y') }}</td>
                                        <td>{{ $meal->description }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('meal.show', $meal) }}">Visualizar</a>
                                                    <a class="dropdown-item" href="{{ route('meal.edit', $meal) }}">Editar</a>
                                                    <form action="{{ route('meal.destroy', $meal) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        
                                                        <button type="button" class="dropdown-item"
                                                            onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''"
                                                            style="cursor: pointer"
                                                        >
                                                            Remover
                                                        </button>
                                                    </form>    
                                                </div>
                                            </div>
                                        </td>
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