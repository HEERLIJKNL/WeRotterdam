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
                    <td class="active">1. Uw winkelwagen</td>
                    <td class="active">2. Persoonlijke gegevens</td>
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

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="inlineRadio1" value="male"> Man
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="inlineRadio2" value="female"> Vrouw
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Naam</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="firstname" class="form-control" id="inputEmail3" placeholder="Voornaam">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="subname" class="form-control" id="inputEmail3" placeholder="Tsvgsl">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="lastname" class="form-control" id="inputEmail3" placeholder="Achternaam">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Adres</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="street" class="form-control" id="inputEmail3" placeholder="Straat">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="street_nr" class="form-control" id="inputEmail3" placeholder="Nr">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" name="street_nr_add" class="form-control" id="inputEmail3" placeholder="Toev">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Postcode</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="postalcode" class="form-control" id="inputEmail3" placeholder="Postcode">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Plaats</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="city" class="form-control" id="inputEmail3" placeholder="Plaats">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">Telefoon</label>
                                    <div class="col-sm-4">
                                        <input type="text" name="telephone" class="form-control" id="inputEmail3" placeholder="Telefoon">
                                    </div>
                                </div>

                        </div>
                    </div>

                    {{--Account aanmaken form --}}

                    <div class="row title-bar light">
                        <div class="col-md-12">Account aanmaken</div>
                    </div>
                    <div class="row content-container">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="email" name="acc_email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="email" name="acc_email2" class="form-control" id="inputEmail3" placeholder="Email nogmaals">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="password" name="password2" class="form-control" id="inputPassword3" placeholder="Password nogmaals">
                                    </div>
                                </div>
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