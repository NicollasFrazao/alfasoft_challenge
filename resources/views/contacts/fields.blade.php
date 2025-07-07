@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="form-group col-sm-6">
        {!! \Form::label("name", "Nome:") !!}
        {!! \Form::text("name", old('name'), ["class" => "form-control", "required" => true, "minlength" => 6]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! \Form::label("email", "E-mail:") !!}
        {!! \Form::email("email", old('email'), ["class" => "form-control", "required" => true]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! \Form::label("phone", "Telefone:") !!}
        {!! \Form::text("phone", old('phone'), ["class" => "form-control", "required" => true, "minlength" => 9, "maxlength" => 9]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {!! \Form::submit("Salvar", ["class" => "btn btn-primary"]) !!}
        <a href="{{ route('contacts.index') }}" class="btn btn-default">Voltar</a>
    </div>
</div>