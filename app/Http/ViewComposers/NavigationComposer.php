<?php namespace App\Http\ViewComposers;


use App\NavigationItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;

/**
 * Class NavigationComposer
 * @package App\Http\ViewComposers
 */
class NavigationComposer
{

    /**
     * @var
     */
    protected $NavigationItems;


    /**
     * @var Cart
     */
    protected $Cart;

    /**
     * @param Cart $cart
     */
    public function __construct(Cart $cart){
        $this->NavigationItems = NavigationItem::active()->get();
        $this->Cart = $cart;
    }

    /**
     * @param View $view
     */
    public function compose(View $view){
        $view->with(['NavigationItems' => $this->NavigationItems,'Cart' => $this->Cart]);
    }

}