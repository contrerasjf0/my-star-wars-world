<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MSWW - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        
        <link href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
    </head>
    <body>
       
        <div class="container">
            <div class="row">
                <div class="col-lg-2">

                </div>
                <div class="col-lg-8">
                        <div class="d-flex flex-column align-self-center m-4">
                            <section class="cover-page d-flex flex-column align-self-center">
                                <figure>
                                    <img src="{{ asset('img/img-sw.png') }}" alt="logo-sw" height="200" width="350">
                                </figure>
                                <p class="text-center">May the Force be with you</p>
                                
                            </section>
                            <section>
                                <div>
                                    <ul class="nav justify-content-center">
                                                <li class="nav-item">
                                                    <a class="nav-link 
                                                        @if (Route::current()->uri() == '/')
                                                            active
                                                        @endif
                                                        " href="{{url('/')}}">Characters</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="">My Characters</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link 
                                                    @if (Route::current()->getName() == 'create')
                                                        active
                                                    @endif 
                                                    " href="{{route('create')}}">New Character</a>
                                                </li>
                                              </ul>
                                </div>
                            </section>
                        </div>
                        @yield('content')
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        </div>
        
    </body>
</html>
