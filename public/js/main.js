/**
 * Foto creator / Upload photo / Add logo and show.
 */

$(function(){

    var form = ".photo-logo-creator";

    var uploadscreen = ".imagecreatepopup-bg";
    var uploadbar = ".imagecreatepopup";

    $(form + " .photo-logo-btn").click(function(){
        $(".photo-logo-creator input[type='file']").click();
    })

    $(form + " input[type='file']").change(function(){
        OpenImageExamples();
        //$(".photo-logo-creator").submit();
    })

    $(uploadbar + " .close-me").click(function(){ CloseImageExamples() });
    $(uploadscreen).click(function(){ CloseImageExamples() });

    $(uploadbar + " img").click(function(){
        $(form + " .bg-image").val($(this).attr("src"));
        $(form).submit();
    })

    function OpenImageExamples(){
        $(uploadscreen).fadeIn("fast",function(){
            $(uploadbar).slideDown("fast");
        });
    }
    function CloseImageExamples(){
        $(uploadbar).slideUp("fast",function(){
            $(uploadscreen).fadeOut("fast");
        });
    }
});

$(function(){
   $('.amount-items').on('change',function(e){
       var form = $(this).closest('form');
       form.submit();
   })
});

$(function(){
    if($('.payment-bar').length > 0){ SetPayment(); }
    $('.payment-bar').on('click',function(e){
        $(this).find(".col-sm-4.info input[type='radio']").prop('checked',true);
        SetPayment();
    });

    function HighLightBar(bar){
        $('.payment-bar').removeClass('active');
        bar.addClass('active');
    }
    function SetPayment(){
        $("input[name='payment']").each(function(){
           if($(this).prop('checked')){
               HighLightBar($(this).closest('.payment-bar'));
               $('.deliver-info-field.payment').html($(this).val().toUpperCase());
               return false;
           }
        });
    }

    $(".payment-select").submit(function(e){
        e.preventDefault();

        var PayProvider = $('input[name=payment]:checked', '.payment-select').val();

        if(PayProvider == "creditcard")
            PayProvider = $('select[name="creditcard-type"]').val();

        var Bank = $('select[name="bank"]').val();

        $.post( "/shoppingcart/payment", {
            payment: PayProvider,
            bank: Bank
        }).done(function(data){
            $('body').append(data);
            $('#buckaroo').submit();
        });
    });
});