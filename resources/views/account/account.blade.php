@extends('layout')

@section('content')

    <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-9 dashboard">

            <h2>ACCOUNT</h2>
            <h3>Mijn bestel geschiedenis</h3>

            <div class="order-history">
                <ul class="orders">
                    @foreach($orders AS $order)
                    <li>
                    <div class="order-details block">
                        <div class="order-date">{{$order->created_at->diffForHumans()}}</div>
                        <table>
                            @foreach($order->Items AS $item)
                            <tr>
                                <td class="r-img"><img src="/images/products/tmb_{{$item->Product->images[0]->image}}" /></td>
                                <td class="r-description">
                                    <div>{{$item->Product->name}}</div>
                                    <div class="r-size">{{$item->size}}</div>
                                </td>
                                <td class="r-price">&euro; {{number_format($item->price,2,",","")}}</td>
                                <td class="r-amount">{{$item->amount}}</td>
                                <td class="r-ptotal">&euro; {{number_format(($item->amount * $item->price),2,",","")}}</td>
                            </tr>
                            @endforeach
                            <tr class="r-total">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Betaald:</td>
                                <td>&euro; {{number_format($order->payment_total,2,",","")}}</td>
                            </tr>
                        </table>
                    </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="account-data">
                <h3>Mijn adres gegevens</h3>
                @if($user->profile)
                <div class="block">
                    <div><span>Naam</span> {{$user->profile->firstname." ".trim($user->profile->subname." ".$user->profile->lastname)}}</div>
                    <div><span>Straat</span> {{$user->profile->street}} {{$user->profile->street_nr}} {{$user->profile->street_nr_add}}</div>
                    <div><span>Postcode</span> {{$user->profile->postalcode}} <span>Plaats</span> {{$user->profile->city}}</div>
                    <div><span>Land</span> Nederland</div>
                    <div><span>Telefoon</span> {{$user->profile->telephone}} <span>Email</span> {{$user->profile->email}}</div>
                </div>
                @endif
            </div>

        </div>

    </div>

@endsection