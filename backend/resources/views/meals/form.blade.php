<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('scheduledDay') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-scheduledDay">Data</label>
        <input
            type="date"
            name="scheduledDay"
            id="input-scheduledDay"
            class="form-control form-control-alternative{{ $errors->has('scheduledDay') ? ' is-invalid' : '' }}"
            placeholder="Data"
            @if ($action != 'create')
                value="{{ old('scheduledDay', $meal->scheduledDay->format('Y-m-d')) }}"
            @endif
            @if ($action == 'show')
                readonly
            @endif
            required
            autofocus
        >

        @if ($errors->has('scheduledDay'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('scheduledDay') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-description">Descrição</label>
        <textarea
            rows="10"
            type="text"
            name="description"
            id="input-description"
            class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}"
            placeholder="Descrição"
            @if ($action == 'show')
                readonly
            @endif
            required
        >{{ $action != 'create' ? $meal->description : '' }}</textarea>

        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>

    @if ($action != 'show')
        <div class="text-center">
            <button type="submit" class="btn btn-success mt-4">Salvar</button>
        </div>
    @endif
</div>
