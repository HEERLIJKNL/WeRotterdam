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
                    <td class="active"><a href="/shoppingcart">1. Uw winkelwagen</a></td>
                    <td class="active"><a href="/shoppingcart/step/1">2. Persoonlijke gegevens</a></td>
                    <td class="active"><a href="/shoppingcart/step/2">3. Betaling/Aflevering</a></td>
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
                                {{$order->Fullname}}<br />
                                {{$order->Address}}<br />
                                {{$order->city}}
                            </div>

                            <div class="deliver-title">Contact</div>
                            <div class="deliver-info-field">
                                {{$order->email}}<br />
                                {{$order->telephone}}
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
                            <div class="deliver-info-field">&euro; {{number_format($cart::total() + Config::get('site_settings.deliverycosts'),2,",","")}}</div>
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
                        <form class="form-horizontal payment-select">
                            <div class="payment-bar">
                                <div class="col-sm-4 info"><input type="radio" name="payment" value="ideal" checked /> IDEAL</div>
                                <div class="col-sm-4">
                                    <div class="payment-logo ideal"></div>
                                </div>
                                <div class="col-sm-4 subselect">
                                    <select name="bank">
                                        @foreach($banks as $code => $name)
                                            <option value="{{$code}}">{{$name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="payment-bar">
                                <div class="col-sm-4 info"><input type="radio" name="payment" value="creditcard" /> Creditcard</div>
                                <div class="col-sm-4">
                                    <div class="payment-logo creditcard"></div>
                                </div>
                                <div class="col-sm-4 subselect">
                                    <select name="creditcard-type">
                                        <option value="visa">Visa</option>
                                        <option value="mastercard">Mastercard</option>
                                    </select>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="g-btn">Bestelling afronden</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection