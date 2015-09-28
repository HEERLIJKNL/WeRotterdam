@extends('layout')

@section('content')
    <div class="ct">
        <div class="contact-info">
            <h2>Contact</h2>
            <div class="green-bar">
                <strong>Retouren</strong><br />
                Bent u op zoek naar het adres waar u uw artikel naar kunt retourneren? Meld uw artikel retour aan via uw account. U ontvangt dan automatisch het juiste retouradres. Lees meer over retourneren.
            </div>
            <div class="green-bar">
                <strong>Klachten</strong><br />
                Heeft u na contact met onze klantenservice nog een klacht? Om deze klacht zo snel mogelijk op te kunnen lossen, adviseren wij u om telefonisch contact met ons op te nemen via 010 - 211 00 90, of een e-mail te sturen naar ons via dit formulier.
            </div>
        </div>
        <div class="contact-form">
            <div class="col-md-6 c-pad">
                <div class="page-sub-title">Contactformulier</div>
                <div class="light-grey ct-container">
                    @if(Session::has('success'))
                        {{Session::get('success')}}
                    @else
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Voornaam</label>
                            <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" placeholder="Voornaam">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Achternaam</label>
                            <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Achternaam">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Telefoonnummer</label>
                            <input type="text" name="telephone" class="form-control" id="exampleInputEmail1" placeholder="Telefoonnummer">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Onderwerp</label>
                            <input type="text" name="subject" class="form-control" id="exampleInputEmail1" placeholder="Onderwerp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Uw bericht</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="g-btn pull-right">Versturen</button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>

            <div class="col-md-6 c-pad">
                <div class="page-sub-title">Contactgegevens</div>
                <div class="ct-container">
                    <p>
                        <strong>Adresgegevens</strong><br />
                        We'Rotterdam<br />
                        Villapark 1<br />
                        3051 BP Rotterdam<br />
                        Nederland
                    </p>
                    <p>
                        <strong>Contactgegevens</strong><br />
                        Email: info@werotteram.com<br />
                        Website: www.werotterdam.com<br />
                        Tel: 010 - 211 00 90
                    </p>
                </div>
            </div>

        </div>
    </div>
@endsection