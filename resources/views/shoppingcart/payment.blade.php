@extends('layout')

@section('content')
    <div class="detail-container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="p-title">Betaling / Aflevering</h2>
            </div>
        </div>
        <div class="row">
            <table class="shoppingcart-steps graph">
                <tr>
                    <td class="active"><div class="step"></div></td>
                    <td class="active"><div class="step"></div></td>
                    <td class="active"><div class="step"></div></td>
                    <td><div class="step"></div></td>
                </tr>
            </table>
            <table class="shoppingcart-steps text">
                <tr>
                    <td class="active">1. Uw winkelwagen</td>
                    <td class="active">2. Persoonlijke gegevens</td>
                    <td class="active">3. Betaling/Aflevering</td>
                    <td>4. Bestellen</td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 shoppincart-account">
                <div class="row title-bar">
                    <div class="col-md-12"> Overzicht</div>
                </div>
                <div class="row content-container">
                    <div class="col-md-12">

                        <div class="deliver-block">
                            <div class="deliver-title">Bezorgadres</div>
                            <div class="deliver-info-field">
                                Softbalpad 15<br />
                                3223ES Hellevoetsluis<br />
                                Nederland
                            </div>
                        </div>

                        <div class="deliver-block">
                            <div class="deliver-title">Betaalmiddel</div>
                            <div class="deliver-info-field payment">
                                IDEAL
                            </div>
                        </div>

                        <div class="deliver-block">
                            <div class="deliver-title">
                                Totaal te betalen:
                            </div>
                            <div class="deliver-info-field">&euro; {{$cart::total()}}</div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 shoppingcart-new-account">
                <div class="row title-bar light">
                    <div class="col-md-12"> Ik betaal met</div>
                </div>
                <div class="row content-container">
                    <div class="col-md-12">
                        <form class="form-horizontal">
                            <div class="payment-bar">
                                <div class="col-sm-4 info"><input type="radio" name="payment" value="ideal" checked /> IDEAL</div>
                                <div class="col-sm-8">
                                    <div class="payment-logo ideal"></div>
                                </div>
                            </div>
                            <div class="payment-bar">
                                <div class="col-sm-4 info"><input type="radio" name="payment" value="creditcard" /> Creditcard</div>
                                <div class="col-sm-8">
                                    <div class="payment-logo creditcard"></div>
                                </div>
                            </div>
                            <div class="payment-bar">
                                <div class="col-sm-4 info"><input type="radio" name="payment" value="paypal" /> Paypal</div>
                                <div class="col-sm-8">
                                    <div class="payment-logo paypal"></div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <a href="/shoppingcart/step/3" class="g-btn">Bestelling afronden</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection