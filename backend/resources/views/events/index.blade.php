@extends('layouts.app', ['title' => 'Gerenciar Eventos'])

@section('content')
    @include('layouts.headers.title-header', ['title' => 'Eventos'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h3 class="mb-0">Lista de Eventos</h3>
                            </div>
                            <div class="col-4 text-center">
                                <a href="{{ route('event.index', [
                                    'month' => $prevMonth->month,
                                    'year' => $prevMonth->year
                                ]) }}" class="btn btn-sm btn-primary mx-1">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                <b>{{ ucfirst($actualFilter['monthName'])}} - {{$actualFilter['year']}}</b>
                                <a href="{{ route('event.index', [
                                    'month' => $nextMonth->month,
                                    'year' => $nextMonth->year
                                ]) }}" class="btn btn-sm btn-primary mx-1">
                                    <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="col-4 text-right">
                                @hasPermission('event', 2)
                                <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary">Adicionar evento</a>
                                @endhasPermission
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
                                    <th scope="col">Lugar</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->scheduledDay->format('d/m/Y') }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->place }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('event.show', $event) }}">Visualizar</a>
                                                    <a class="dropdown-item" href="{{ route('event.edit', $event) }}">Editar</a>
                                                    @hasPermission('event', 3)
                                                    <form action="{{ route('event.destroy', $event) }}" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="button" class="dropdown-item"
                                                            onclick="confirm('Tem certeza de que deseja remover esse evento?') ? this.parentElement.submit() : ''"
                                                            style="cursor: pointer"
                                                        >
                                                            Remover
                                                        </button>
                                                    </form>
                                                    @endhasPermission
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
                            <!-- { $events->links() } -->
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
