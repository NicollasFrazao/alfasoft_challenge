<div class="row">
    <div class="form-group col-sm-6">
        {!! \Form::label("name", "Nome:") !!}
        {!! \Form::text("name", null, ["class" => "form-control", "required" => true, "minlength" => 6]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! \Form::label("email", "E-mail:") !!}
        {!! \Form::email("email", null, ["class" => "form-control", "required" => true]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        {!! \Form::label("phone", "Telefone:") !!}
        {!! \Form::text("phone", null, ["class" => "form-control", "required" => true, "minlength" => 9, "maxlength" => 9]) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        {!! \Form::submit("Cadastrar", ["class" => "btn btn-primary"]) !!}
        <a href="{{ route('contacts.index') }}" class="btn btn-default">Voltar</a>
    </div>
</div>