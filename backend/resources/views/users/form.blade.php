<h6 class="heading-small text-muted mb-4">Informações</h6>
<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-name">Nome</label>
        <input
            type="text"
            name="name"
            id="input-name"
            class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
            placeholder="Nome"
            @if ($action != 'create')
                value="{{ old('name', $user->name) }}"
            @endif
            required
            autofocus
        >

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-email">E-mail</label>
        <input
            type="email"
            name="email"
            id="input-email"
            class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}"
            placeholder="E-mail"
            @if ($action != 'create')
                value="{{ old('email', $user->email) }}"
            @endif
            required
        >

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<h6 class="heading-small text-muted mb-4">Permissões</h6>
<div class="pl-lg-4">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('permissionMeal') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-permissionMeal">Cardário</label>
                <select
                    type="permissionMeal"
                    name="permissionMeal"
                    id="input-permissionMeal"
                    class="form-control form-control-alternative{{ $errors->has('permissionMeal') ? ' is-invalid' : '' }}"
                    required
                >
                    <!-- Alguém melhora esse código pelo amor de deus -->
                    <option
                        @if ($action != 'create' && $user->permissionMeal == 0)
                        selected
                        @endif
                    value="0">Sem acesso</option>
                    <option
                        @if ($action != 'create' && $user->permissionMeal == 2)
                        selected
                        @endif
                    value="1">Criador</option>
                    <option
                        @if ($action != 'create' && $user->permissionMeal == 3)
                        selected
                        @endif
                    value="2">Editor</option>
                    <option
                        @if ($action != 'create' && $user->permissionMeal == 4)
                        selected
                        @endif
                    value="3">Administrador</option>
                </select>

                @if ($errors->has('permissionMeal'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('permissionMeal') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('permissionEvent') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-permissionEvent">Eventos</label>
                <select
                    type="permissionEvent"
                    name="permissionEvent"
                    id="input-permissionEvent"
                    class="form-control form-control-alternative{{ $errors->has('permissionEvent') ? ' is-invalid' : '' }}"
                    @if ($action != 'create')
                        value="{{ old('permissionEvent', $user->permissionEvent) }}"
                    @endif
                    required
                >
                    <!-- Alguém melhora esse código pelo amor de deus -->
                    <option
                        @if ($action != 'create' && $user->permissionEvent == 0)
                        selected
                        @endif
                    value="0">Sem acesso</option>
                    <option
                        @if ($action != 'create' && $user->permissionEvent == 2)
                        selected
                        @endif
                    value="1">Criador</option>
                    <option
                        @if ($action != 'create' && $user->permissionEvent == 3)
                        selected
                        @endif
                    value="2">Editor</option>
                    <option
                        @if ($action != 'create' && $user->permissionEvent == 4)
                        selected
                        @endif
                    value="3">Administrador</option>
                </select>

                @if ($errors->has('permissionEvent'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('permissionEvent') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
<h6 class="heading-small text-muted mb-4">Segurança</h6>
<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-password">Senha</label>
        <input
            type="password"
            name="password"
            id="input-password"
            class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}"
            placeholder="Senha"
        >

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label class="form-control-label" for="input-password-confirmation">Confirmar senha</label>
        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="Confirmar senha" value="">
    </div>
    <p>Essa senha deve ser redefinida pelo usuário</p>

    <div class="text-center">
        <button type="submit" class="btn btn-success mt-4">Salvar</button>
    </div>
</div>
