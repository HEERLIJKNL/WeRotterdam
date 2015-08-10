<?php namespace App\Src\Buckaroo;

use Illuminate\Support\Facades\Config;

class Buckaroo
{
    protected $paymentData;

    protected $form_id;

    protected $banks;

    public function __construct(){
        $this->form_id  = Config::get('buckaroo.form_id');
        $this->banks    = new Banks();
    }

    public function fetchForm($data){

        $buckaroo_url = Config::get('buckaroo.payment_url');

        $this->paymentData = [
            'brq_amount'                => $data['price'],
            'brq_payment_method'        => $data['payment_method'],
            'brq_service_ideal_issuer'  => $data['payment_bank'],
            'brq_return'                => $data['return_url'],
            'brq_invoicenumber'         => $data['invoice_nr'],

		    'brq_currency'          => Config::get('buckaroo.brq_currency'),
		    'brq_description'       => Config::get('buckaroo.brq_description'),
		    'brq_culture'           => Config::get('buckaroo.brq_culture'),
		    'brq_websitekey'        => Config::get('buckaroo.brq_websitekey')
        ];

        $this->paymentData['brq_signature']         = $this->createSignature();


        return view(
            'buckaroo::form',
            array_merge(
                $this->paymentData,
                [
                    'buckaroo_url'  => $buckaroo_url,
                    'form_id'       => $this->form_id
                ]
            )
        );
    }

    public function setFormId($id){
        $this->form_id = $id;
    }

    public function invoice_nr($request){
        return $request['BRQ_INVOICENUMBER'];
    }

    private function createSignature(){
        $fields = $this->paymentData;
        ksort($fields);

        $fieldString = "";

        foreach($fields AS $fieldname => $field){
            $fieldString .= $fieldname."=".$field;
        }
        $fieldString .= Config::get('buckaroo.secret_key');

        return sha1($fieldString);
    }

    public function banks(){
        return $this->banks;
    }
}