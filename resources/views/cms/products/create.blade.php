@extends('cms.main-layout')

@section('content')

    <form action="/admin/products" method="post">
        <div class="col-md-6">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="categorie">Categorie</label>
                    <select name="categorie" class="form-control">
                        @foreach($categories AS $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
            <div class="form-group col-md-8">
                <label for="naam">Product naam</label>
                <input type="name" class="form-control" name="name" id="naam" placeholder="Product naam">
            </div>
            <div class="form-group col-md-4">
                <label for="prijs">Product prijs</label>
                <input type="text" class="form-control" name="price" id="prijs" placeholder="Prijs">
            </div>
            </div>
            <div class="form-group">
                <label for="description">Product omschrijving</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Opslaan</button>
        </div>
    </form>

@endsection