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
                <td><div class="step"></div></td>
                <td><div class="step"></div></td>
                <td><div class="step"></div></td>
            </tr>
        </table>
        <table class="shoppingcart-steps text">
            <tr>
                <td class="active">1. Uw winkelwagen</td>
                <td>2. Persoonlijke gegevens</td>
                <td>3. Betaling/Aflevering</td>
                <td>4. Bestellen</td>
            </tr>
        </table>
    </div>
    <div class="row">
        <div class="shoppingcart-container">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Aantal</th>
                        <th class="price">Totaal</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($cart::content() AS $cartitem)
                    <tr class="shoppingcart-bar">
                        <td>
                            <div class="product-line">
                                <div class="img">
                                    <img src="/images/products/{{$cartitem->options->image}}" />
                                </div>
                                <div class="info">
                                    <div class="product-title">{{$cartitem->name}}</div>
                                    <div class="product-description"></div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form method="post" action="/shoppingcart">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <input type="hidden" name="_method" value="PUT" />
                                <input type="hidden" name="id" value="{{$cartitem->rowid}}" />
                                <select name="amount" class="amount-items">
                                    @for($i = 1; $i <= 10; $i++)
                                    <option @if($i == $cartitem->qty) selected @endif value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select> <a class="remove" href="/shoppingcart/remove/{{$cartitem->rowid}}">verwijderen</a>
                            </form>
                        </td>
                        <td>
                            &euro; {{number_format($cartitem->subtotal,2,",","")}}
                        </td>
                    </tr>
                    @endforeach
                    <tr class="shoppingcart-deliver">
                        <td></td>
                        <td class="text-right">Bezorgkosten:</td>
                        <td>&euro; {{number_format(Config::get('site_settings.deliverycosts'),2,",","")}}</td>
                    </tr>
                    <tr class="shoppingcart-total">
                        <td></td>
                        <td class="text-right">Totaal:</td>
                        <td class="price">&euro; {{number_format($cart::total() + Config::get('site_settings.deliverycosts'),2,",","")}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="pull-right">
                <a href="/shoppingcart/step/1" class="g-btn">Persoonlijke gegevens</a>
            </div>
        </div>
    </div>
</div>
@endsection