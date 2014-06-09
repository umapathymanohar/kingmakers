<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Kingmakers IAS Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/kingmakers/public/assets/css/style.css?v=1" media='all' rel="stylesheet">
    <link href="/kingmakers/public/assets/css/select2.css" rel="stylesheet"/>
    <link href="/kingmakers/public/assets/css/datepicker.css" rel="stylesheet">
  <!-- Le styles  <link href='/kingmakers/public/assets/css/dropkick.css?v=1' media='all' rel='stylesheet' />-->
    <!--<link href="css/united/bootstrap.css" rel="stylesheet">
    --><!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

    <script src="/kingmakers/public/assets/js/jquery.min.js"></script> 
  </head>
  
<body>

<header role="banner">
                <div class="container">
                  <div class="row">
                    <div class="span6">
                      <h1 class="logo">
                        <a href="home"><img src="/kingmakers/public/assets/images/logo.png" alt=""></a>
                      </h1>
                    </div>
 

                  </div>
                </div>
              </header>
 
<hr>
 
<div id="main" role="main">
  <div class="container">
 
            @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
            
           @yield('main')

  </div>


    
    <script src="/kingmakers/public/assets/js/bootstrap.js"></script>
  <script src="/kingmakers/public/assets/js/bootstrap-datepicker.js"></script>
  <script src="/kingmakers/public/assets/js/script.js"></script>
  
 