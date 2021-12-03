<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ asset(config('brandVars.logo')) }}">
        <link rel="shortcut icon" sizes="192x192" href="{{ asset(config('brandVars.logo')) }}">

        <title>{{config('brandVars.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
            body{
                font-family: 'Open Sans', sans-serif;
            }
            *:hover{
                -webkit-transition: all 1s ease;
                transition: all 1s ease;
            }
            section{
                float:left;
                width:100%;
                background: #fff;  /* fallback for old browsers */
                padding:30px 0;
            }
            h1{float:left; width:100%; color:#232323; margin-bottom:30px; font-size: 14px;}
            h1 span{font-family: 'Libre Baskerville', serif; display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px; font-weight:700}
            h1 a{color:#131313; font-weight:bold;}


            /*Profile Card 3*/
            .profile-card-3 {
                font-family: 'Open Sans', Arial, sans-serif;
                position: relative;
                float: left;
                overflow: hidden;
                width: 100%;
                text-align: center;
                height:438px;
                border:none;
            }
            .profile-card-3 .background-block {
                float: left;
                width: 100%;
                height: 270px;
                overflow: hidden;
            }
            .profile-card-3 .background-block .background {
                width:100%;
                vertical-align: center;
                opacity: 0.9;
                -webkit-filter: blur(0.5px);
                filter: blur(0.5px);
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
            }
            .profile-card-3 .card-content {
                width: 100%;
                padding: 15px 25px;
                color:#232323;
                float:left;
                background:#efefef;
                height:50%;
                border-radius:0 0 5px 5px;
                position: relative;
                z-index: 9999;
            }
            .profile-card-3 .card-content::before {
                content: '';
                background: #efefef;
                width: 120%;
                height: 100%;
                left: 11px;
                bottom: 51px;
                position: absolute;
                z-index: -1;
                transform: rotate(-13deg);
            }
            .profile-card-3 .profile {
                border-radius: 50%;
                position: absolute;
                bottom: 50%;
                left: 50%;
                max-width: 100px;
                opacity: 1;
                box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
                border: 2px solid rgba(255, 255, 255, 1);
                -webkit-transform: translate(-50%, 0%);
                transform: translate(-50%, 0%);
                z-index:99999;
            }
            .profile-card-3 h2 {
                margin: 0 0 5px;
                font-weight: 600;
                font-size:25px;
            }
            .profile-card-3 h2 small {
                display: block;
                font-size: 15px;
                margin-top:10px;
            }
            .profile-card-3 i {
                display: inline-block;
                font-size: 16px;
                color: #232323;
                text-align: center;
                border: 1px solid #232323;
                width: 30px;
                height: 30px;
                line-height: 30px;
                border-radius: 50%;
                margin:0 5px;
            }
            .profile-card-3 .icon-block{
                float:left;
                width:100%;
                margin-top:15px;
            }
            .profile-card-3 .icon-block a{
                text-decoration:none;
            }
            .profile-card-3 i:hover {
                background-color:#232323;
                color:#fff;
                text-decoration:none;
            }
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-gray-dark bg-dark px-2 justify-content-between">
        <a class="navbar-brand" href="#">
            <img src="{{asset(config('brandVars.logo'))}}" width="60" alt="logo">
        </a>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Inicio</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500 underline">Ingresar</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-white dark:text-gray-500 underline">Registrarse</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
    <div class="row">
            <div class="col-12 col-md-10 offset-md-1 my-3">
                    <div class="card profile-card-3">
                        <div class="background-block">
                            <img src="{{asset('img/bg-card.jpg')}}" alt="profile-sample1" class="background"/>
                        </div>
                        <div class="profile-thumb-block">
                            <img src="{{asset(config('brandVars.bigLogo'))}}" alt="profile-image" class="profile" style="max-width: 200px; max-height: 200px;"/>
                        </div>
                        <div class="card-content pb-2">
                            <h2>{{config('brandVars.cName')}}<small>Sistema de administración</small></h3>
                                <div class="icon-block"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"> <i class="fab fa-instagram"></i></a><a href="#"> <i class="fab fa-youtube"></i></a></div>
                        </div>
                    </div>
                    <h2 class="mt-3 w-100 float-left text-center"><strong>¡Bienvenido!</strong></h2>
            </div>
        </div>
    </body>
</html>
