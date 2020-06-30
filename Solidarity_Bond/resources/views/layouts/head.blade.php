<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="{{ asset('assets/img/logo_cesi_cropped.png') }}">
<meta name="description" content="@yield('meta-description', 'Une page du site du Projet Solidarity Bond')"/>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- API Token -->
@auth
    <meta name="api-token" content="{{session()->get('token')}}">
@endauth
<!-- Titre -->
<title>@yield('title', 'Solidarity Bond')</title>
<!-- Scripts -->
<script href="{{ asset('js/app.js') }}" defer></script>
<!-- Polices & Styles -->
@include('layouts.css-communs')






