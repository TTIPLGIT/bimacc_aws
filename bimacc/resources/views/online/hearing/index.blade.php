<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Online Arbitration System</title>

    <!-- Scripts -->
  
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script> 
 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('favicon.ico') }}"/>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/redmond/jquery-ui.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ url(asset('css/app.css')) }}" rel="stylesheet" type="text/css"> 
</head>
  <body>
<div class="container-fluid chat-container">
  <b-card id="app"  no-body class="card-hearing-head">
       
    <b-card-body style="padding:0rem;">
      <hearing-component :user="{{ auth()->user() }}"></hearing-component>
    </b-card-body>
  </b-card>
</div>

</body>
</html>