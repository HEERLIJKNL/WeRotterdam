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
    $('.payment-bar').on('click',function(e){
        e.preventDefault();
        $('.payment-bar').removeClass('active');

        $(this).addClass('active');
    });
});