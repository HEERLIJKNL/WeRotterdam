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
                            <a href="#" class="payment-bar">
                                <div class="col-sm-4 info">IDEAL</div>
                                <div class="col-sm-8">
                                    <div class="payment-logo ideal"></div>
                                </div>
                            </a>
                            <a href="#" class="payment-bar">
                                <div class="col-sm-4 info">Creditcard</div>
                                <div class="col-sm-8">
                                    <div class="payment-logo creditcard"></div>
                                </div>
                            </a>
                            <a href="#" class="payment-bar">
                                <div class="col-sm-4 info">Paypal</div>
                                <div class="col-sm-8">
                                    <div class="payment-logo paypal"></div>
                                </div>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection