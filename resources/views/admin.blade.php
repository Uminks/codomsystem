@extends('layouts.app')

@push('metas')
    <title>Administrador | CODOMSystem</title>
@endpush

@push('styles')
    <style>
        .footer {
            background-color: #eee;
            text-align: center;
            padding: 15px;
            font-weight: 400;
            color: #444;
        }
    </style>
@endpush


@section('content')

        <div class="container">
            <codom-register></codom-register>
        </div>

@endsection