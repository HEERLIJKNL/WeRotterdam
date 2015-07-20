<html>
<head>
    <title>Laravel</title>

    <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel='stylesheet' type="text/css">

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            display: inline-block;
        }

        .title {
            font-size: 28px;
            margin-top: 40px;
        }

        .quote {
            font-size: 24px;
        }
        .product-line{
            border-right: 1px solid #EDEDED;
            margin: 10px 0px;
        }
        .product{
            display: block;
            padding: 34px;
            min-height: 340px;
            vertical-align: top;
            margin-bottom: 10px;
            min-height: 425px;
            box-shadow: 0px 2px 4px #E0E0E0;
            position:relative;
        }
        .product .placeholder{
            width:210px;
            height:290px;
            overflow: hidden;
        }
        .product .placeholder img{
            /*
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
            */
            width:210px;
        }
        .product .grow img {
            width: 210px;

            -webkit-transition: all .4s ease;
            -moz-transition: all .4s ease;
            -o-transition: all .4s ease;
            -ms-transition: all .4s ease;
            transition: all .4s ease;
        }

        .product .grow img:hover {
            width: 500px;
            margin-left:-145px;
            margin-top:-85%;
        }
        .product .price{
            font-weight: bold;
            display: inline;
            position: absolute;
            bottom: 0px;
            right: 0px;
            padding: 10px;
            background-color: #1CAA06;
            color: #fff;
        }
        .product .detail{
            font-weight: bold;
            display: inline-block;
            position: absolute;
            left: 0px;
            right: 0px;
            bottom: 0px;
            padding: 10px;
            background-color: #F2F2F2;
            /* text-align: center; */
            border-top: 1px solid #1CAA06;
        }
        .categorie{
            overflow: hidden;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        @foreach($categories AS $categorie)
            <div class="col-md-12">
                <div class="title"> <strong>{{ $categorie->name }}</strong> </div>
            </div>
            @foreach($categorie->products->chunk(4) AS $products)
                @foreach($products AS $product)
                    <div class="col-md-3 product-line">
                        <div class="product">
                            @foreach($product->images AS $image)
                                <div class="placeholder grow">
                                    <img src="/images/products/{{$image->image}}">
                                </div>
                            @endforeach
                            <div>{{$product->name}}</div>
                            <div class="detail">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Details
                                <div class="price">&euro; {{number_format($product->price, 2, ',', ' ')}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endforeach
    </div>
</div>
</body>
</html>