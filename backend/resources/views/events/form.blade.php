<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-name">Nome</label>
        <input
            type="text"
            name="name"
            id="input-name"
            placeholder="Nome"
            class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
            @if ($action != 'create')
                value="{{ old('name', $event->name) }}"
            @endif
            @if ($action == "show")
                readonly
            @endif
            required
        >

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('day') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-day">Data</label>
        <input
            type="date"
            name="day"
            id="input-day"
            class="form-control form-control-alternative{{ $errors->has('day') ? ' is-invalid' : '' }}"
            @if ($action != 'create')
                value="{{ old('day', $event->day->format('Y-m-d')) }}"
            @endif
            @if ($action == "show")
                readonly
            @endif
            required
        >

        @if ($errors->has('day'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('day') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('schedule') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-schedule">Hora</label>
        <input
            type="time"
            name="schedule"
            id="input-schedule"
            class="form-control form-control-alternative{{ $errors->has('schedule') ? ' is-invalid' : '' }}"
            @if ($action != 'create')
                value="{{ old('day', $event->day->format('H:i')) }}"
            @endif
            @if ($action == "show")
                readonly
            @endif
            required
        >

        @if ($errors->has('schedule'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('schedule') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('place') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-place">Local</label>
        <input
        type="text"
        name="place"
        id="input-place"
        placeholder="Local"
        class="form-control form-control-alternative{{ $errors->has('place') ? ' is-invalid' : '' }}"
        @if ($action != 'create')
            value="{{ old('place', $event->place) }}"
        @endif
        @if ($action == "show")
            readonly
        @endif
        required>

        @if ($errors->has('place'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('place') }}</strong>
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
            required
            @if ($action == "show")
                readonly
            @endif
        >{{ $action != 'create' ?$event->description:''}}</textarea>

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
