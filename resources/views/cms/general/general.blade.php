@extends('cms.main-layout')

@section('content')


    <div class="col-md-6">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Standaard email adres</label>
                <input type="email" class="form-control" name="email" id="inputEmail3" value="{{Config::get('site_settings.email')}}" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Bezorgkosten</label>
                <input type="text" class="form-control" name="deliverycosts" id="inputEmail3" value="{{Config::get('site_settings.deliverycosts')}}" placeholder="Bezorgkosten">
            </div>
            <button type="submit" class="btn btn-default">Opslaan</button>
        </form>
    </div>

@endsection