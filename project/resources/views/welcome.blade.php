<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: black;
                color: white;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                scroll-behavior: smooth;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a, li {
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                display: inline-block;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .box{
                transition: all 1s;
                height: 100vh;
            }

            a{
                color: white !important;
            }
            

            

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        

                        <a href="{{ route('login') }}">Login</a>
                        

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Deliveboo
                </div>

                <div class="links">
                    <ul>
                        <li>Pizzeria da gigi</li>
                        <li>Pizzeria da gigi</li>
                        <li>Pizzeria da gigi</li>
                        <li>Pizzeria da gigi</li>
                    </ul>
                </div>
                <a href="#scroll-up">freccia down</a>
            </div>
        </div>
        
        
        <section class="box" id="scroll-down">
            <h1>Typology</h1> <br>
            <ul>
                @foreach ($typs as $typ)
                    <li>
                        <a href="{{route('typ-show', $typ -> id)}}">
                            {{$typ -> name}}
                        </a> <br>
                        <img src="{{$typ -> img_typs}}" style="width:200px; height:180px;">
                    </li>
                @endforeach
            </ul>
        </section>


        <section class="box" id="scroll-up">
            <h1>Ciao</h1> <br>
            <ul>
                @foreach ($typs as $typ)
                    <li>
                        <a href="{{route('typ-show', $typ -> id)}}">
                            {{$typ -> name}}
                        </a> <br>
                        <img src="{{$typ -> img_typs}}" style="width:200px; height:180px;">
                        
                    </li>
                @endforeach
            </ul>
            <a href="#scroll-down">freccia up</a>
        </section>
        
    </body>
</html>
