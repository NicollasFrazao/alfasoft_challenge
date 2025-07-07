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
            <label for="name">Nome: </label>
            <p id="name">{{ $contact->name }}</p>

            <label for="email">E-mail: </label>
            <p id="email">{{ $contact->email }}</p>

            <label for="phone">Telefone: </label>
            <p id="phone">{{ $contact->phone }}</p>

            <label for="created_at">Criado em: </label>
            <p id="created_at">{{ $contact->created_at->format('d/m/Y H:i:s') }}</p>

            <label for="updated_at">Alterado em: </label>
            <p id="updated_at">{{ $contact->updated_at->format('d/m/Y H:i:s') }}</p>
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