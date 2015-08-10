<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<form id="{{$form_id}}" style="display: none;" method="POST" action="{{$buckaroo_url}}">
    <input type="hidden" name="brq_amount" value="{{$brq_amount}}" />
    <input type="hidden" name="brq_return" value="{{$brq_return}}" />
    <input type="hidden" name="brq_invoicenumber" value="{{$brq_invoicenumber}}" />
    <input type="hidden" name="brq_currency" value="{{$brq_currency}}" />
    <input type="hidden" name="brq_description" value="{{$brq_description}}" />
    <input type="hidden" name="brq_culture" value="{{$brq_culture}}" />
    <input type="hidden" name="brq_websitekey" value="{{$brq_websitekey}}" />
    <input type="hidden" name="brq_signature" value="{{$brq_signature}}" />
    <input type="hidden" name="brq_payment_method" value="{{$brq_payment_method}}" />
    <input type="hidden" name="brq_service_ideal_issuer" value="{{$brq_service_ideal_issuer}}" />
</form>