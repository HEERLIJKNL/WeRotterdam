@extends('cms.main-layout')

@section('content')

<h1>Producten</h1>
<div class="container-fluid main-screen">

    <div class="row">

        <div class="col-md-12"><br/>
            <a href="/admin/products/create" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Product toevoegen
            </a>
        </div>

    </div>

    <table class="table table-condensed products">
        <thead>
        <tr>
            <td></td>
            <td>Product</td>
            <td>Prijs</td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($products AS $product)
            <tr>
                <td>@if(count($product->images))<img height="100" src="/images/products/{{$product->images[0]->image}}" />@endif</td>
                <td>
                    <div>{{$product->name}}</div>
                    <div>
                        <ul class="sizes">
                            @foreach($product->sizes AS $size)
                                <li>
                                    <div class="bl">
                                        <div class="bl-title">{{$size->size}}</div>
                                        <div class="bl-stored">{{$size->stored}}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </td>
                <td class="price">&euro; {{number_format($product->price, 2, ',', ' ')}}</td>
                <td class="edit">
                    <a href="products/{{$product->id}}/edit" class="edit-pencil">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </td>
                <td class="edit">
                    <form method="post" action="products/{{$product->id}}">
                        <input type="hidden" name="_method" value="delete" />
                        <button type="submit" class="edit-remove">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection