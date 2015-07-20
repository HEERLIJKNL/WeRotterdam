<div class="menu">
    <ul>
        <li><a href="/">Home</a></li>
        @foreach($NavigationItems as $item)
        <li><a href="/{{$item->url}}">{{ucfirst($item->button)}}</a></li>
        @endforeach
        <li class="shoppingcart">
            <a href="/shoppingcart">{{$Cart::count()}}</a>
        </li>
    </ul>
</div>