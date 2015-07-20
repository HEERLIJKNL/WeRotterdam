<?php namespace App\Http\ViewComposers;


use App\NavigationItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;

class NavigationComposer
{

    /**
     * @var
     */
    protected $NavigationItems;

    /**
     *
     */
    public function __construct(){
        $this->NavigationItems = NavigationItem::active()->get();
    }

    /**
     * @param View $view
     */
    public function compose(View $view, Cart $cart){
        $view->with(['NavigationItems' => $this->NavigationItems,'Cart' => $cart]);
    }

}