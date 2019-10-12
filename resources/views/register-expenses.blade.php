@extends('layouts.app')

@push('metas')
    <title>Registrar Gastos | CODOMSystem</title>
@endpush

@push('styles')

@endpush


@section('content')

        <div class="container">
                
                <expense-register :user_id={{Auth::user()->id}}></expense-register>

        </div> 
    
@endsection