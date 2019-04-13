@extends('layouts.app', ['title' => 'Event Management'])

@section('content')
    @include('layouts.headers.title-header', ['title' => 'Eventos'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Adicionar Cardápio</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('event.index') }}" class="btn btn-sm btn-primary">Voltar para a lista</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('event.store') }}" autocomplete="off">
                            @csrf
                            @include('events.form', ['action' => 'create'])
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
