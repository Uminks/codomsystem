@extends('layouts.app')

@push('metas')
    <title>Administrador | CODOMSystem</title>
@endpush

@push('styles')

@endpush


@section('content')

        <div class="container">

            <payment-register></payment-register>
            <charge-register></charge-register>
            <codom-register></codom-register>
            <charge-register></charge-register>

        <!--
        <badger-accordion>

            <badger-accordion-item>
                <template slot="header"><h2 class="title-accordeon">Registrar Condominio</h2></template>    
                <template slot="content"><codom-register></codom-register></template>  
            </badger-accordion-item>
        
            <badger-accordion-item>
                <template slot="header"><h2 class="title-accordeon">Registro de gastos</h2></template>    
                <template slot="content"><expense-register></expense-register></template>  
            </badger-accordion-item>
        </badger-accordion>
             -->
            <!-- <payment-register></payment-register> -->
            <!-- <charge-register></charge-register> -->
        </div> 



@endsection