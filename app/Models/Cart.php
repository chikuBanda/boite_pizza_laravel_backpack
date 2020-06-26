<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;
    public $n = 0;

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
            $this->n = $oldCart->n;
        }
    }

    public function addProduit($item, $id){
        $storedItem = [
            'quantity' => 0,
            'prix' => $item->prix,
            'item' => $item
        ];

        if($this->items)
        {
            if(array_key_exists($id, $this->items))
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['prix'] = $item->prix * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->prix;
    }

    public function addFormule($item, $id, $produits){
        $cles = $id;
        $storedItem = [
            'quantity' => 0,
            'prix' => $item->prix,
            'item' => $item,
            'produits' => $produits
        ];

        if($this->items)
        {
            $itemExists = false;
            $existKey = -1;
            foreach($this->items as $key => $value)
            {
                if($key[1] == $id[1])
                {
                    $itemExists = true;
                    $existKey = $key;
                }
            }

            if($itemExists && $existKey >= 0)
            {
                $different = false;
                for($i = 0; $i < $storedItem['produits']->count(); $i++)
                {
                    if(($storedItem['produits'][$i])->codeProduit != $this->items[$existKey]['produits'][$i]->codeProduit)
                    {
                        $different = true;
                    }
                }
                if(!$different)
                {
                    $storedItem = $this->items[$existKey];
                    $cles = $existKey;
                }
            }
        }

        $storedItem['quantity']++;
        $storedItem['prix'] = $item->prix * $storedItem['quantity'];
        $this->items[$cles] = $storedItem;
        $this->totalQuantity++;
        $this->n++;
        $this->totalPrice += $item->prix;
    }
}
