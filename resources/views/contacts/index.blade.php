@extends('layouts.app')

@section('content-header')
@endsection

@push('css')
@endpush

@section('content')
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">CONTATOS</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            {!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush