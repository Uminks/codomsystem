<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    </head>
    <body>
  
        <div class="container-fluid">

            <?php $user = Auth::user()  ?>  

            <div class="container login-container">

                <div class="row">
                    <h1> CODOMSystem   <?php print($user) ?>  </h1>
                </div>

                <div class="row">

                    <div class="col text-center access-container">
                        
                        <a  href="">
                            <img src="{{asset('assets/svg/admin-icon.svg')}}">
                            <h2> Acceso Administrador </h2>
                        </a>

                    </div>
                    <div class="col text-center access-container">

                        <a href="">
                            <img src="{{asset('assets/svg/user-icon.svg')}}">
                            <h2> Acceso Usuario </h2>
                        </a>

                    </div>
                </div>
            </div>
        </div>


       

        <script src="{{ mix('js/app.js') }}"></script>

    </body>
</html>
