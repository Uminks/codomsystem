@extends('layouts.app')

@push('metas')
    <title>Login | CODOMSystem</title>
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

<div class="container-fluid">

        <div class="container login-container">

            <div class="row">
                <h1> CODOMSystem </h1>
            </div>

            <div class="row">

                <div class="col text-center access-container">
                    
                    <a  href="#user-access" data-toggle="modal" data-target="#user-access">
                        <img src="{{asset('assets/svg/admin-icon.svg')}}">
                        <h2> Acceso Administrador </h2>
                    </a>

                </div>
                <div class="col text-center access-container">

                    <a href="#admin-access" data-toggle="modal" data-target="#admin-access">
                        <img src="{{asset('assets/svg/user-icon.svg')}}">
                        <h2> Acceso Usuario </h2>
                    </a>

                </div>
            </div>
        </div>
    </div> 

    <!-- Modal -->
    <div class="modal fade" id="user-access" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Acceso usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form action="">

                    <div class="form-group">
                        <label for="user">Usuario</label>
                        <input type="email" name="user" class="form-control" id="user-input" aria-describedby="emailHelp" placeholder="Ingresar usuario">
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="password-input" placeholder="Ingresar contraseña">
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Ingresar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="admin-access" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Acceso administrador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    <form action="">

                        <div class="form-group">
                            <label for="user">Usuario</label>
                            <input type="email" name="user" class="form-control" id="user-input" placeholder="Ingresar usuario">
                        </div>

                    </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Ingresar</button>
            </div>
            </div>
        </div>
    </div>

@endsection