@extends('layout')

@section('content')

    <div class="detail-container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="p-title">Winkelwagen</h2>
            </div>
        </div>
        <div class="row">
            <table class="shoppingcart-steps graph">
                <tr>
                    <td class="active"><div class="step"></div></td>
                    <td class="active"><div class="step"></div></td>
                    <td><div class="step"></div></td>
                    <td><div class="step"></div></td>
                </tr>
            </table>
            <table class="shoppingcart-steps text">
                <tr>
                    <td class="active"><a href="/shoppingcart">1. Uw winkelwagen</a></td>
                    <td class="active"><a href="/shoppingcart/step/1">2. Persoonlijke gegevens</a></td>
                    <td>3. Betaling/Aflevering</td>
                    <td>4. Bestellen</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8 shoppincart-account">
                <form class="form-horizontal" action="/shoppingcart/step/1" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />

                    {{--Adres gegevens formulier --}}

                    <div class="row title-bar">
                        <div class="col-md-12"> Adres gegevens</div>
                    </div>
                    <div class="row content-container">
                        <div class="col-md-12">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <label class="radio-inline">
                                            <input @if(!isset($user->Profile->gender) || (isset($user->Profile->gender) && $user->Profile->gender == "male")) checked="checked" @endif type="radio" name="gender" id="inlineRadio1" value="male"> Man
                                        </label>
                                        <label class="radio-inline">
                                            <input @if(isset($user->Profile->gender) && $user->Profile->gender == "female")) checked="checked" @endif type="radio" name="gender" id="inlineRadio2" value="female"> Vrouw
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Naam</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="firstname" value="@if(isset($user->Profile->firstname)){{$user->Profile->firstname}}@else{{old('firstname')}}@endif" class="form-control" id="inputEmail3" placeholder="Voornaam">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="subname" value="@if(isset($user->Profile->subname)){{$user->Profile->subname}}@else{{old('subname')}}@endif"  class="form-control" id="inputEmail3" placeholder="Tsvgsl">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="lastname" value="@if(isset($user->Profile->lastname)){{$user->Profile->lastname}}@else{{old('lastname')}}@endif"  class="form-control" id="inputEmail3" placeholder="Achternaam">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Adres</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="street" value="@if(isset($user->Profile->street)){{$user->Profile->street}}@else{{old('street')}}@endif"  class="form-control" id="inputEmail3" placeholder="Straat">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="street_nr" value="@if(isset($user->Profile->street_nr)){{$user->Profile->street_nr}}@else{{old('street_nr')}}@endif"  class="form-control" id="inputEmail3" placeholder="Nr">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="street_nr_add" value="@if(isset($user->Profile->street_nr_add)){{$user->Profile->street_nr_add}}@else{{old('street_nr_add')}}@endif"  class="form-control" id="inputEmail3" placeholder="Toev">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="postalcode" class="col-sm-2 control-label">Postcode</label>
                                    <div class="col-sm-4">
                                        <input type="text" value="@if(isset($user->Profile->postalcode)){{$user->Profile->postalcode}}@else{{old('postalcode')}}@endif"  name="postalcode" class="form-control" id="postalcode" placeholder="Postcode">
                                    </div>
                                    <label for="city" class="col-sm-2 control-label">Plaats</label>
                                    <div class="col-sm-4">
                                        <input type="text" value="@if(isset($user->Profile->city)){{$user->Profile->city}}@else{{old('city')}}@endif"  name="city" class="form-control" id="city" placeholder="Plaats">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="order_email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" value="@if(isset($user->Profile->email)){{$user->Profile->email}}@else{{old('order_email')}}@endif"  name="order_email" class="form-control" id="order_email" placeholder="Email">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Telefoon</label>
                                    <div class="col-sm-4">
                                        <input type="text" value="@if(isset($user->Profile->telephone)) {{$user->Profile->telephone}}@else{{old('telephone')}}@endif"  name="telephone" class="form-control" id="inputEmail3" placeholder="Telefoon">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Land</label>
                                    <div class="col-sm-4">
                                        <input type="text" disabled value="Nederland"  class="form-control" id="Country" placeholder="Land">
                                        <input type="hidden" name="country" value="Nederland" />
                                    </div>
                                </div>
                        </div>
                    </div>

                    {{--Account aanmaken form --}}

                    @if($showAccountFields)

                    <div class="row title-bar light">
                        <div class="col-md-12">Account aanmaken</div>
                    </div>
                    <div class="row content-container">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="account_email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="email" name="email" class="form-control" id="account_email" placeholder="Email">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="email" name="email_confirmation" class="form-control" id="inputEmail3" placeholder="Email nogmaals">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="password" name="password_confirmation" class="form-control" id="inputPassword3" placeholder="Password nogmaals">
                                    </div>
                                </div>

                        </div>
                    </div>

                    @endif

                    <div class="row content-container">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="g-btn pull-right">Betaling / Aflevering</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>

            <div class="col-md-6 shoppincart-account">

            </div>
        </div>
    </div>
@endsection