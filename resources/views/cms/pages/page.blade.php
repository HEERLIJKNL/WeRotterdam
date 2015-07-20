@extends('cms.main-layout')

@section('content')

<h1>Paginas</h1>
<div class="container-fluid main-screen">
    <table class="table table-condensed products ng-hide">
        <thead>
        <tr>
            <td></td>
            <td>Naam</td>
            <td>Url</td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($pages AS $page)
        <tr>
            <td class="price"><input type="checkbox" name="page[]" value="{{$page->id}}" /></td>
            <td>{{$page->name}}</td>
            <td>{{$page->url}}</td>
            <td class="edit text-right">
                <a href="/admin/pages/{{$page->id}}/edit" class="edit-pencil">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                </a>
                <a href="/admin/pages/{{$page->id}}/delete" class="edit-remove">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</div>

@endsection