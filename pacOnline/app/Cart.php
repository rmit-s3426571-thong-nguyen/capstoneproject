<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Cart extends Model
{
    public $products = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($origCart)
    {
        if ($origCart){
            $this->products = $origCart->products;
            $this->totalQty = $origCart->totalQty;
            $this->totalPrice = $origCart->totalPrice;
        }
    }

    public function add($product, $id){
        $addedProduct = ['qty' => 0, 'price' => $product->price, 'product' =>$product];

        // check if product is exist in the cart
        if ($this->products)
        {
            if (array_key_exists($id, $this->products)){
                $addedProduct = $this->products[$id];
            }
        }

        $addedProduct['qty']++;
        $addedProduct['price'] = $product->price * $addedProduct['qty'];
        $this->products[$id] = $addedProduct;
        $this->totalQty++;
        $this->totalPrice += $product->price;

    }

    public function remove($product, $id){

        $removedProduct = $this->products[$id];

        if ($removedProduct['qty'] > 1){
            $removedProduct['qty'] -= 1;
            $removedProduct['price'] = $product->price * $removedProduct['qty'];
            $this->totalQty--;
            $this->totalPrice -= $product->price;
            $this->products[$id] = $removedProduct;
        }elseif($removedProduct['qty'] <= 1){
            $removedProduct['qty'] = 0;
            $this->totalQty--;
            $this->totalPrice -= $product->price;
            unset($this->products[$id]);
        }
    }
}
