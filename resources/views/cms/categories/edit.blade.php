@extends('cms.main-layout')

@section('content')

    <div class="categorie-detail">
        <div class="row">

            <div class="col-md-6">
                @if(isset($categorie))
                <form method="post" action="/admin/categories/{{$categorie->id}}">
                    <input type="hidden" name="_method" value="PATCH" />
                @else
                <form method="post" action="/admin/categories">
                @endif

                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="categorie">Categorie naam</label>
                            <input type="name" class="form-control" name="name" value="@if(isset($categorie)){{$categorie->name}}@endif" id="naam" placeholder="Categorie naam">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default">Opslaan</button>

                </form>
            </div>

        </div>
    </div>

@endsection
