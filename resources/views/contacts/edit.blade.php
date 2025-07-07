@extends('layouts.app')

@section('content-header')
@endsection

@push('css')
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">ALTERAR CONTATO</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! \Form::model($contact, ["route" => ["contacts.update", $contact->id], "method" => "patch"]) !!}
                @include("contacts.fields")
            {!! \Form::close() !!}
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