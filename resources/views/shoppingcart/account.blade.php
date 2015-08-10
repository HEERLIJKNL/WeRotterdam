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
            <div class="col-md-6 shoppincart-account">
                <div class="row title-bar">
                    <div class="col-md-12"> Uw account</div>
                </div>
                <div class="row content-container">
                    <div class="col-md-12">

                        <form class="form-horizontal" method="post" action="/shoppingcart/step/1/login">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-4">
                                    <a href="#">Wachtwoord vergeten?</a>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="g-btn pull-right">Inloggen</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>


            <div class="col-md-6 shoppingcart-new-account">
                <div class="row title-bar light">
                    <div class="col-md-12"> Geen account</div>
                </div>
                <div class="row content-container">
                    <div class="col-md-12 text-center">
                        <a href="/shoppingcart/step/1/adres" class="g-btn">Gegevens invullen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection