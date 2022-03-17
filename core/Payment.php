<?php

use app\models\Product;
use app\models\Order;

class Payment {

   public function Mercadopago($order){

      MercadoPago\SDK::setAccessToken('APP_USR-3864496586351125-091415-756a283c872880cdb05917e7fbda9187-19482779');

      // Crea un objeto de preferencia
      $preference = new MercadoPago\Preference();

      //...
      $preference->back_urls = array(
            "success" => URL_PATH . '/checkout/success',
            "failure" => URL_PATH . '/checkout/failure',
            "pending" => URL_PATH . '/checkout/pending'
      );
      $preference->auto_return = "approved";

      //Modo binario
      $preference->binary_mode = true;

      $array_items = [];

      foreach($order->items as $key => $product){
            //dd($product);

            $p = Product::find($product->product_id);
                                                    
            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->id = $p->id;
            $item->title = $p->name;
            $item->description = $p->description;
            $item->category_id = "others";
            $item->quantity = $product->quantity;
            $item->picture_url = URL_PATH . $p->image;
            $item->unit_price = $product->unit_price;
            $item->currency_id = "UYU";
            //dd($item);
            array_push($array_items, $item);
            $preference->items = $array_items;

            //dd($preference->items);

                                                    
            //dd($array_items);
            //dd($preference->items);
                                                    
      }

                                                

      // Añadir costo de envío
      if($order->shipping_cost > 0){
         $item = new MercadoPago\Item();
         $item->id = 9999;
         $item->title = 'Envío';
         $item->description = 'Costo de envío';
         $item->category_id = "services";
         $item->quantity = 1;
         $item->unit_price = $order->shipping_cost;
         $item->currency_id = "UYU";
         array_push($array_items, $item);
         $preference->items = $array_items;
         //dd($preference);
      }


      /** Añadir descuento */
      if($order->dto > 0){
         $item = new MercadoPago\Item();
         $item->id = 9999;
         $item->title = 'Descuento';
         $item->description = 'Descuento';
         $item->category_id = "services";
         $item->quantity = 1;
         $item->unit_price = -($order->dto);
         $item->currency_id = "UYU";
         array_push($array_items, $item);
         $preference->items = $array_items;
      }
      


      // Guarda la preferencia
      $preference->save();
      //dd($preference);

      /**
      * Luego de generar la preferencia modificamos el preference_id de la order
      */
      $order->preference_id = $preference->id;
      $update_order_preference_id = $order->save();
      if(!$update_order_preference_id){
         Response::redirect('/');
         //die('error');
      }

      return $preference;

   }

}