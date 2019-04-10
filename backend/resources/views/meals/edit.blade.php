@extends('layouts.app', ['title' => 'Editar Cardápio'])

@section('content')
    @include('layouts.headers.title-header', ['title' => 'Cardápios'])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Editar Cardápio</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('meal.show', ['id' => $meal->id]) }}" class="btn btn-sm btn-primary">Voltar para visualização</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('meal.update', $meal) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <!-- <h6 class="heading-small text-muted mb-4"></h6> -->
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('day') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-day">Data</label>
                                    <input type="date" name="day" id="input-day" class="form-control form-control-alternative{{ $errors->has('day') ? ' is-invalid' : '' }}" placeholder="Data" value="{{ old('day', $meal->day->format('Y-m-d')) }}" required autofocus>

                                    @if ($errors->has('day'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('day') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-description">Descrição</label>
                                    <textarea type="text" name="description" id="input-description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Descrição" required
                                    >{{ old('description', $meal->description) }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection