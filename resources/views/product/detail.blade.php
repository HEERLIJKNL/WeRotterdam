@extends('layout')

@section('content')
<div class="product-detail-container">
    <div class="row">
        <div class="col-md-12">
            <ul class="bread-crumb">
                <li>Kleding</li>
                <li>Truien</li>
            </ul>
            <h2>{{$product->name}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="product-img">
                <img src="/images/products/{{$product->images[0]->image}}" />
            </div>

            <ul class="product-img-thumbs">
                @foreach($product->images AS $image)
                <li><a class="active" href="#"><img src="/images/products/{{$image->image}}" /></a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <form method="post" action="/shoppingcart/add" >

                <input type="hidden" name="_method" value="POST" />
                <input type="hidden" name="id" value="{{$product->id}}" />
                <input type="hidden" name="size" value="M" />
                <input type="hidden" name="amount" value="1" />
                <input type="hidden" name="color" value="white" />
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="detail-info">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-error">{{ Session::get('error') }}</div>
                    @endif

                    <div class="detail-box">
                        <span>Prijs</span>&euro;{{$product->price}}
                    </div>
                    <div class="detail-box">
                        <span>Kleur</span>
                        <a href="#" data-val="white" class="clr-pick white"></a>
                        <a href="#" data-val="red" class="clr-pick red"></a>
                        <a href="#" data-val="green" class="clr-pick green active"></a>
                        <a href="#" data-val="blue" class="clr-pick blue"></a>
                        <a href="#" data-val="orange" class="clr-pick orange"></a>
                    </div>
                    <div class="detail-box">
                        <span>Maten</span>
                        <a href="#" data-val="S" class="size-pick">S</a>
                        <a href="#" data-val="M" class="size-pick">M</a>
                        <a href="#" data-val="L" class="size-pick">L</a>
                        <a href="#" data-val="XL" class="size-pick">XL</a>
                        <a href="#" data-val="XXL" class="size-pick">XXL</a>

                    </div>
                    <div class="info-box">
                        <p>Nam porta augue hendrerit augue dictum mollis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin convallis ante non ornare malesuada. Mauris eget consectetur mi. Aenean lectus nibh, convallis ac dignissim vitae, ullamcorper eget elit. Vestibulum viverra vulputate urna. Phasellus eu nunc congue, aliquet erat in, lacinia quam. Mauris euismod leo est, in viverra risus egestas id. Suspendisse elementum ante vel sagittis condimentum. Fusce dictum convallis purus, ac suscipit ante lobortis eget. Nulla quis arcu pharetra, iaculis lorem at, fringilla nisl. Cras a augue eu erat tristique sollicitudin.</p>

                        <p>Pellentesque sit amet quam id ex venenatis tincidunt convallis vel felis. Sed semper est at nisl dapibus euismod. Suspendisse quis ipsum a mauris fermentum elementum ut a urna. Cras felis erat, consectetur sit amet risus vel, pharetra molestie felis. In volutpat dui et dui dictum venenatis. Maecenas tempor mattis odio ac aliquet. Nulla vehicula diam augue, non auctor libero fringilla et.</p>
                    </div>
                    <div class="order-box">
                        <span>
                            <div class="amount-buttons">
                                <a href="#" class="amount-plus"><span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span></a>
                                <a href="#" class="amount-minus"><span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span></a>
                            </div>
                            Aantal <span class="amount-display">1</span>
                        </span>
                        <button type="submit">Toevoegen aan winkelwagen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){

        SetSelected();

        var amountinput = $("input[name='amount']");
        var amountdisplay = $(".amount-display");

        function SetSelected(){
            SetActive("color",".clr-pick");
            SetActive("size",".size-pick");
        }

        function SetActive(inputName, hrefClass){
            var val   = $("input[name = '"+ inputName +"']").val();

            $(hrefClass).each(function(index){
                if($(this).data('val') == val)
                    $(this).addClass("active");
                else
                    $(this).removeClass("active");
            })
        }

        $(".clr-pick").click(function(e){
            e.preventDefault();
            var val = $(this).data('val');
            $("input[name='color']").val(val);
            SetActive("color",".clr-pick");
        })

        $(".size-pick").click(function(e){
            e.preventDefault();
            var val = $(this).data('val');
            $("input[name='size']").val(val);
            SetActive("size",".size-pick");
        })

        $(".amount-plus").click(function(e){
            e.preventDefault();
            var amount = parseInt(amountinput.val()) + 1;
            amountinput.val(amount);
            amountdisplay.html(amount);
        })
        $(".amount-minus").click(function(e){
            e.preventDefault();
            var amount = parseInt(amountinput.val()) - 1;
            if(amount <= 0) amount = 1;
            amountinput.val(amount);
            amountdisplay.html(amount);
        })
    });
</script>
@endsection