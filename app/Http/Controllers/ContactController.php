<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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

        $contactinfo = $request;
        $sendto = Config::get('site_settings.email');

        Mail::send('emails.contact',compact('contactinfo'),function($message) use($sendto) {
            $message->to($sendto)->subject('Contact formulier');
        });

        Session::flash('success','Het contactformulier is succesvol verstuurd.');
        return redirect()->back();
    }
}