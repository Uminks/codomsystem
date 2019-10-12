@extends('layouts.app')

@push('metas')
    <title>Sistema | CODOMSystem</title>
@endpush

@push('styles')

@endpush


@section('content')

        <div class="container">

            <!-- <payment-register></payment-register>
            <charge-register></charge-register>
            <codom-register></codom-register>
            <charge-register></charge-register> -->

            <div class="container login-container">
        
                    <div class="row">
        
                        <div class="col text-center access-container">
                            
                            <a  href="/registrar-condominio">
                                <img src="{{asset('assets/svg/home.svg')}}">
                                <h2> Registrar Condominio </h2>
                            </a>
        
                        </div>
                        <div class="col text-center access-container">
        
                            <a href="/registrar-gasto">
                                <img src="{{asset('assets/svg/expenses.svg')}}">
                                <h2> Registrar Gasto </h2>
                            </a>
        
                        </div>
                        <div class="col text-center access-container">
        
                                <a href="/inmuebles">
                                    <img src="{{asset('assets/svg/list.svg')}}">
                                    <h2>Listar Inmuebles</h2>
                                </a>
            
                        </div>

                    </div>

                </div>

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