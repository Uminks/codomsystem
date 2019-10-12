@extends('layouts.app')

@push('metas')
    <title>Lista de Inmuebles | CODOMSystem</title>
@endpush

@push('styles')

@endpush


@section('content')

        <div class="container">
                
                <estates-list></estates-list>

        </div> 
    
@endsection
