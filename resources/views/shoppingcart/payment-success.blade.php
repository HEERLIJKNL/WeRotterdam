@extends('layout')

@section('content')
    <div class="detail-container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="p-title">Bestelling success</h2>
            </div>
        </div>
        <div class="row">
            <table class="shoppingcart-steps graph completed">
                <tr>
                    <td class="active"><div class="step completed"></div></td>
                    <td class="active"><div class="step completed"></div></td>
                    <td class="active"><div class="step completed"></div></td>
                    <td class="active"><div class="step completed"></div></td>
                </tr>
            </table>
            <table class="shoppingcart-steps text">
                <tr>
                    <td class="active"><a href="/shoppingcart">1. Uw winkelwagen</a></td>
                    <td class="active"><a href="/shoppingcart/step/1">2. Persoonlijke gegevens</a></td>
                    <td class="active"><a href="/shoppingcart/step/2">3. Betaling/Aflevering</a></td>
                    <td class="active"><a href="#">4. Voltooid</a></td>
                </tr>
            </table>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8 shoppincart-account">
                <div class="row title-bar">
                    <div class="col-md-12"> Bestelling voltooid</div>
                </div>
                <div class="row content-container">
                    <div class="col-md-12 text-center">

                        Bedankt voor uw bestelling!
                        Er is een mail verstuurd met een overzicht van de bestelling.

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection