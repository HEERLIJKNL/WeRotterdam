@extends('cms.main-layout')

@section('content')
    <div class="product-detail">
        <div class="row">

            <div class="col-md-6">
            <form method="post" action="/admin/products/{{$product->id}}">
                <input type="hidden" name="_method" value="PATCH" />

                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="categorie">Categorie</label>
                        <select name="categorie_id" class="form-control">
                            @foreach($categories AS $category)
                                <option @if($category->id == $product->categorie_id)selected="selected"@endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="naam">Product naam</label>
                        <input type="name" class="form-control" name="name" value="{{$product->name}}" id="naam" placeholder="Product naam">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="prijs">Product prijs</label>
                        <input type="text" class="form-control" name="price" value="{{$product->price}}" id="prijs" placeholder="Prijs">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Product omschrijving</label>
                    <textarea class="form-control" name="description">{{$product->description}}</textarea>
                </div>
                <button type="submit" class="btn btn-default">Veranderingen opslaan</button>


            </form>
            </div>

        </div>

        <div class="row products">

            <div class="col-md-6">
                <label for="description">Product Maten</label>
                <ul class="sizes">
                    @foreach($product->sizes AS $size)
                    <li>
                        <form method="post" action="/admin/products/{{$product->id}}/setsize">
                            <input type="hidden" name="size_id" value="{{$size->id}}"/>
                            <div class="bl">
                                <div class="bl-title">{{$size->size}}</div>
                                <div class="bl-stored"><input type="text" name="store_amount" value="{{$size->stored}}" /></div>
                            </div>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="row product-pictures">
            <div class="col-md-6">
                <form method="post" enctype="multipart/form-data" action="/admin/products/{{$product->id}}/addphoto">
                    <label for="description">Product Afbeeldingen</label>
                    <div>
                        @foreach($product->images AS $image)
                            <div class="product-img">
                                <img src="/images/products/{{$image->image}}" />
                                <a href="/admin/images/{{$image->id}}/destroy" class="delete-img"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                            </div>
                        @endforeach
                    </div>
                    <a href="#" class="add-link add-photo">Foto toevoegen <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                    <input type="file" name="photo" class="upload-photo" />
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $(".add-photo").click(function(e){
            e.preventDefault();
            $(".upload-photo").click();
        });

        $(".upload-photo").change(function(){
            $(this).closest('form').submit();
        });
    </script>
@endsection