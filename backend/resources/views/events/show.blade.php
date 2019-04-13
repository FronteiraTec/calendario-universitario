@extends('layouts.app', ['title' => 'Gerenciamento de Cardápio'])

@section('content')
    @include('layouts.headers.title-header', ['title' => 'Visualizar cardápio'])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Gerenciamento de Cardápio</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('event.index') }}" class="btn btn-sm btn-primary">Voltar para lista</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <h6 class="heading-small text-muted mb-4"></h6> -->
                        @include('events.form', [
                            'action' => 'show',
                            'event' => $event
                        ])
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
