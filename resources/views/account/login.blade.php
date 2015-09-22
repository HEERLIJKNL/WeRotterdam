@extends('layout')

@section('content')
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-12">
                    <div class="account-container msg">
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> er is iets fout gegaan.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
       <div class="row">
           <div class="col-md-6">
               <div class="account-container">
                   <form method="post" action="/account/login">
                   <h2>MIJN ACCOUNT</h2>
                   <div class="account-login-container">
                       <div class="form-group">
                           <label for="exampleInputEmail1">Email</label>
                           <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                       </div>
                       <div class="form-group">
                           <label for="exampleInputEmail1">Wachtwoord</label>
                           <input name="password" type="password" class="form-control" id="exampleInputEmail1" placeholder="Wachtwoord">
                       </div>
                       <div>
                           <button type="submit" class="btn btn-blue">INLOGGEN</button>
                       </div>
                   </div>
                   </form>
               </div>
           </div>
           <div class="col-md-6">
               <div class="account-container create">
                   <form method="post" action="/account/register">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h2>ACCOUNT AANMAKEN</h2>
                        <div class="account-create-container">

                               <div class="form-group">
                                   <label for="exampleInputEmail1">Email</label>
                                   <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                               </div>
                               <div class="form-group row">
                                   <div class="col-xs-6">
                                       <label for="exampleInputPassword1">Wachtwoord</label>
                                       <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Wachtwoord">
                                   </div>
                                   <div class="col-xs-6">
                                       <label for="exampleInputPassword1">Wachtwoord <span>nogmaals</span></label>
                                       <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1" placeholder="Wachtwoord">
                                   </div>
                               </div>

                       </div>

                       <h2>ADRES GEGEVENS</h2>
                       <div class="account-create-container">
                           <div class="form-group row">
                               <div class="col-xs-5">
                                   <label for="exampleInputPassword1">Voornaam</label>
                                   <input name="firstname" type="text" class="form-control" id="exampleInputPassword1" placeholder="Voornaam">
                               </div>
                               <div class="col-xs-2">
                                   <label for="exampleInputPassword1">&nbsp;</label>
                                   <input name="subname" type="text" class="form-control" id="exampleInputPassword1" placeholder="tsvgsl">
                               </div>
                               <div class="col-xs-5">
                                   <label for="exampleInputPassword1">Achternaam</label>
                                   <input name="lastname" type="text" class="form-control" id="exampleInputPassword1" placeholder="Achternaam">
                               </div>
                           </div>
                           <div class="form-group row">
                               <div class="col-xs-7">
                                   <label for="exampleInputPassword1">Straat</label>
                                   <input name="street" type="text" class="form-control" id="exampleInputPassword1" placeholder="Straat">
                               </div>
                               <div class="col-xs-2">
                                   <label for="exampleInputPassword1">Nr</label>
                                   <input name="street_nr" type="text" class="form-control" id="exampleInputPassword1" placeholder="Nr">
                               </div>
                               <div class="col-xs-3">
                                   <label for="exampleInputPassword1">Toev</label>
                                   <input name="street_nr_add" type="text" class="form-control" id="exampleInputPassword1" placeholder="Toev">
                               </div>
                           </div>
                           <div class="form-group row">
                               <div class="col-xs-4">
                                   <label for="exampleInputPassword1">Postcode</label>
                                   <input name="postalcode" type="text" class="form-control" id="exampleInputPassword1" placeholder="Postcode">
                               </div>
                               <div class="col-xs-8">
                                   <label for="exampleInputPassword1">Plaats</label>
                                   <input name="city" type="text" class="form-control" id="exampleInputPassword1" placeholder="Plaats">
                               </div>
                           </div>
                       </div>
                       <button type="submit" class="btn btn-grey">REGISTREREN</button>
                   </form>
               </div>
           </div>
       </div>
@endsection