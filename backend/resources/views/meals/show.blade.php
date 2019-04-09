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
                                <a href="{{ route('meal.index') }}" class="btn btn-sm btn-primary">Voltar para lista</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <h6 class="heading-small text-muted mb-4"></h6> -->
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('day') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-day">Data</label>
                                <input disabled type="date" name="day" id="input-day" class="form-control form-control-alternative{{ $errors->has('day') ? ' is-invalid' : '' }}" placeholder="Data" value="{{ $meal->day->format('Y-m-d') }}" required autofocus>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">Nome</label>
                                <input disabled type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nome" value="{{ old('name', $meal->name) }}" required autofocus>
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-description">Descrição</label>
                                <textarea disabled type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Descrição" required
                                >{{ old('description', $meal->description) }}</textarea>
                            </div>

                            <div class="text-center">
                                <a href="{{route('meal.edit', ['meal' => $meal->id])}}" class="btn btn-primary mt-4">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection