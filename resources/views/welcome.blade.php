<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cinema API</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .content {
                margin-left:40px;
            }
            .content h1, 
            .content p, 
            .content li,
            .content table {
                text-align:left;
                font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;
            }
            .content strong {
                font-weight:600;
            }
            .content pre {
                text-align:left;
                border:1px solid #CCC;
                padding:10px;
                border-radius:10px;
                width:50%;
            }
            .content PRE,
            .content TABLE {
                margin-left:20px;
            }
        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <h1>Welcome to the Cinema API</h1>

                <p>There are currently:</p>
                <ul>
                    <li><strong>{{ $cinema_count }}</strong> Cinemas</li>
                    <li><strong>{{ $movie_count }}</strong> Movies</li>
                    <li><strong>{{ $sessiontime_count }}</strong> SessionTimes</li>
                </ul>
                <p>If you need more data please run <code>php artisan db:seed</code> from the command line.</p>
                <hr>

                <p>The following endpoints are available for usage:</p>
                <table>
                    <tr>
                        <th>Endpoint</th>
                        <th>Live Endpoint</th>
                        <th>Description</th>
                    </tr>
                    @foreach ($endpoints as $ep)
                       <tr>
                           <td>{{ $ep[0] }}</td>
                           <td><a href="{{ $ep[1] }}">{{ $ep[1] }}</a></td>
                           <td>{{ $ep[2] }}</td>
                       </tr>
                    @endforeach
                </table>
                <hr>

                <p>To filter results by date please supply the date in json format.</p>
                <p>Accepted date formats: <code>YYYY</code>, <code>YYYY-MM</code> and <code>YYYY-MM-DD</code></p>
                <p>Example:</p>
                <pre>
POST /movies/aut%20deserunt%20tenetur
content-type: application/json
cache-control: no-cache
user-agent: PostmanRuntime/7.1.5
accept: */*
host: 127.0.0.1:8000
accept-encoding: gzip, deflate
content-length: 28
{
"date" : "2018-09-01"
}
</pre>
                
            </div>
        </div>
    </body>
</html>
