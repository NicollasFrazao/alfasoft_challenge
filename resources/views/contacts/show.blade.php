@extends('layouts.app')

@section('content-header')
@endsection

@push('css')
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">{{ $contact->name }}</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="name">Nome: </label>
                    <p id="name">{{ $contact->name }}</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="email">E-mail: </label>
                    <p id="email">{{ $contact->email }}</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="phone">Telefone: </label>
                    <p id="phone">{{ $contact->phone }}</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="created_at">Criado em: </label>
                    <p id="created_at">{{ $contact->created_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="updated_at">Alterado em: </label>
                    <p id="updated_at">{{ $contact->updated_at->format('d/m/Y H:i:s') }}</p>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <a href="{{ route('contacts.index') }}" class="btn btn-default">Voltar</a>
                    
                    <div class="btn-group">
                        <a href="{{ route('contacts.edit', [$contact->id]) }}" class="btn btn-default btn-xs" data-toggle="tooltip" title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>

                        {!! Form::open(["route" => ["contacts.destroy", $contact->id], "method" => "delete"]) !!}
                            {!! Form::button("<i class='fas fa-trash'></i>", [
                                "type"        => "submit",
                                "onclick"     => "return confirm('Tem certeza que deseja efetuar a exclusão?');",
                                "class"       => "btn btn-danger btn-xs",
                                "data-toggle" => "tooltip",
                                "title"       => "Excluir",
                            ]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
@endsection

@push('scripts')
@endpush