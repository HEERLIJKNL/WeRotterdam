@extends('cms.main-layout')

@section('content')

    <h1>Navigatie</h1>
    <div class="container-fluid main-screen">
        <table class="table table-condensed products ng-hide">
            <thead>
            <tr>
                <td></td>
                <td>Naam</td>
                <td>Knop</td>
                <td></td>
                <td>Pagina</td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($NavigationItems AS $item)
                <tr>
                    <td class="price"><input type="checkbox" name="page[]" value="{{$item->id}}" /></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->button}}</td>
                    <td><span class="glyphicon glyphicon-link" aria-hidden="true"></td>
                    <td>{{$item->url}} <a href="/{{$item->url}}" target="_blank"><span class="glyphicon glyphicon-arrow-right glyph-style-btn"></span></a></td>
                    <td class="edit text-right">
                        <a href="/admin/pages/{{$item->id}}/edit" class="edit-pencil">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                        <a href="/admin/pages/{{$item->id}}/delete" class="edit-remove">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection