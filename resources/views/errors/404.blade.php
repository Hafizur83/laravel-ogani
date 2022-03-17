<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error page</title>
    <link rel="stylesheet" href="{{asset('public/site/css/bootstrap.min.css')}}">
    <style>
        #error{
            height: 100vh;
            background-color: #ebf3ff;
            padding-top: 5rem;
        }
    </style>
</head>
<body>
    <div id="error">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <img class="img-fluid" src="{{ asset('public/images/error-404.png') }}" alt="">
                    <div class="text-center">
                        <h1>Not Found</h1>
                        <h2>The page you are looking not found.</h2>
                        <a class="btn btn-lg btn-outline-primary" href="{{ url('/') }}">Go Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>