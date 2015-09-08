@extends('cms.main-layout')

@section('content')

    <h1>Navigatie</h1>
    <div class="container-fluid main-screen">

        <div class="row">

            <div class="col-md-12"><br/>
                <a href="/admin/navigation/create" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Navigatie toevoegen
                </a>
            </div>

        </div>

        <table class="table table-condensed products ng-hide">
            <thead>
            <tr>
                <td></td>
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
                    <td>
                        @if($item->active)
                            <a href="/admin/navigation/deactivate/{{$item->id}}" class="btn btn-success " aria-label="Left Align">
                                <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            </a>
                        @else
                            <a href="/admin/navigation/activate/{{$item->id}}" class="btn btn-danger " aria-label="Left Align">
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                            </a>
                        @endif
                    </td>
                    <td class="price"><input type="checkbox" name="page[]" value="{{$item->id}}" /></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->button}}</td>
                    <td><span class="glyphicon glyphicon-link" aria-hidden="true"></td>
                    <td>{{$item->url}} <a href="/{{$item->url}}" target="_blank"><span class="glyphicon glyphicon-arrow-right glyph-style-btn"></span></a></td>
                    <td class="edit text-right">
                        <a href="/admin/navigation/{{$item->id}}/edit" class="edit-pencil">
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