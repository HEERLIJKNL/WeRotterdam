<html ng-app="CmsApp">
    <head>
        <title>Werotterdam, CMS</title>

        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel='stylesheet' type="text/css">
        <link href="css/cms.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container-fluid cms">
            <div class="row">
                <div class="col-md-3">

                    <div class="left-bar">
                        <div class="profile">
                            <div class="user">{{$user->name}}</div>
                            <div class="actions">
                                <a href="uitloggen">Uitloggen</a>
                            </div>
                        </div>

                        <div class="menu">
                            <ul>
                                <li><a href="#/">Dashboard</a></li>
                                <li><a href="/admin/products">Producten</a></li>
                                <li><a href="/admin/categories">Categorieen</a></li>
                                <li><a href="/admin/pages">Pagina beheer</a></li>
                                <li><a href="/admin/navigation">Menu beheer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="content">
                        <div class="logo"><img src="images/logo.jpg" /></div>
                        <div ng-view>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/angular.js"></script>
        <script type="text/javascript" src="js/angular-route.js"></script>
        <script type="text/javascript" src="js/cms/app.js"></script>
        <script type="text/javascript" src="js/cms/CmsControllers.js"></script>
    </body>
</html>