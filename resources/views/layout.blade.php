<html>
<head>
    <title>We'rotterdam. Ja hetzelfde maar minder egoistisch</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap.min.css" rel='stylesheet' type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/animate.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container main">
    <div class="row">
        <div class="top-bar">
            <div class="logo">
                <img src="/images/logo.jpg" />
            </div>
        </div>
    </div>
    <div class="row">
        @include('navigation.navigation')
    </div>
    @yield('content')
    <div class="row">
    <footer>
        <div class="col-md-3">
            <span class="category">Vragen</span>
            <a href="#">Over ons</a>
            <a href="#">Contact</a>
            <a href="#">Producten</a>
            <a href="#">Veelgestelde vragen</a>
        </div>
        <div class="col-md-3">
            <span class="category">Onze producten</span>
            <a href="#">Over ons</a>
            <a href="#">Contact</a>
            <a href="#">Producten</a>
            <a href="#">Veelgestelde vragen</a>
        </div>
        <div class="col-md-3">
            <span class="category">Volg ons</span>
            <a href="#">Over ons</a>
            <a href="#">Contact</a>
            <a href="#">Producten</a>
            <a href="#">Veelgestelde vragen</a>
        </div>
        <div class="col-md-3">
            <span class="category">Meer over ons</span>
            <a href="#">Over ons</a>
            <a href="#">Contact</a>
            <a href="#">Producten</a>
            <a href="#">Veelgestelde vragen</a>
        </div>
    </footer>
    </div>
</div>

<div class="imagecreatepopup-bg"></div>
<div class="imagecreatepopup">
    <div class="title">Selecteer een foto</div>
    <ul>
        <li><img src='/images/imagecreate/polaroidgreenbg.jpg'></li>
        <li><img src='/images/imagecreate/simple.jpg'></li>
    </ul>
    <a class="close-me" href="#"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
</div>

<script src="/js/main.js" type="text/javascript"></script>
</body>
</html>