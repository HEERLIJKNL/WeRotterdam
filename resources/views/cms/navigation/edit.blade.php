@extends('cms.main-layout')

@section('content')

    <div class="product-details products">
        @if(isset($NavigationItem->id))
            <form class="form-horizontal" method="post" action="/admin/navigation/{{$NavigationItem->id}}">
                <input type="hidden" name="_method" value="PUT" />
                @else
                    <form class="form-horizontal" method="post" action="/admin/navigation">
                        <input type="hidden" name="_method" value="POST" />
                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="exampleInputPassword1">Naam</label>
                                    <input type="text" class="form-control" id="Name" name="name" placeholder="Naam" value="{{$NavigationItem->name}}">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">Knop</label>
                                    <input type="text" class="form-control" id="Url" name="button" placeholder="Url" value="{{$NavigationItem->button}}">
                                </div>

                                <div class="col-sm-6">
                                    <label for="exampleInputPassword1">URL</label>
                                    <input type="text" class="form-control" id="Url" name="url" placeholder="Url" value="{{$NavigationItem->url}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </form>
    </div>
@endsection