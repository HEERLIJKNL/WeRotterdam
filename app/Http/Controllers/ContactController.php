<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller {

    public function __construct(){
        parent::__construct();
    }

	public function index(){
        return view('contact.contact');
    }

    public function send(Request $request){

        Mail::send('emails.contact',[],function($message){
            $message->to('rik@heerlijk.nl')->subject('Contact formulier');
        });

        Session::flash('success','Het contactformulier is succesvol verstuurd.');
        return redirect()->back();
    }
}