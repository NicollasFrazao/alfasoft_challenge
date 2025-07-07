@extends('layouts.app')

@section('content-header')
@endsection

@push('css')
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CADASTRAR CONTATO</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! \Form::open(["route" => ["contacts.store"]]) !!}
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