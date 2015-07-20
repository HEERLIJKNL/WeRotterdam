<h1>Producten</h1>
<div class="container-fluid main-screen">
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
                <td><img height="100" src="/images/products/{{$product->images[0]->image}}" /></td>
                <td>{{$product->name}}</td>
                <td class="price">&euro; {{number_format($product->price, 2, ',', ' ')}}</td>
                <td class="edit">
                    <a class="edit-pencil">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>
                </td>
                <td class="edit">
                    <a class="edit-remove">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>