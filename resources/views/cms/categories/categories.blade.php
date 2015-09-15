@extends('cms.main-layout')

@section('content')

    <h1>Categorie&euml;n</h1>
    <div class="container-fluid main-screen">

        <div class="row">

            <div class="col-md-12"><br/>
                <a href="/admin/categories/create" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Categorie toevoegen
                </a>
            </div>

        </div>

        <table class="table table-condensed products">
            <thead>
            <tr>
                <td width="80%">Categorie</td>
                <td>Prijs</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($categories AS $category)
                <tr>
                    <td>
                        <div>{{$category->name}}</div>
                    </td>
                    <td class="price">&nbsp;</td>
                    <td class="edit">
                        <a href="categories/{{$category->id}}/edit" class="edit-pencil">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                        </a>
                    </td>
                    <td class="edit">
                        <form method="post" action="categories/{{$category->id}}">
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