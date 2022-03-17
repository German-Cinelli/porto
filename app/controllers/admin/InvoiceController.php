<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use Illuminate\Database\Capsule\Manager as DB;

use app\models\Invoice;
use app\models\InvoiceProduct;
use app\models\Provider;
use app\models\Product;
use app\models\Notification;
use app\models\PaymentHistory;


class InvoiceController {


    public function actionIndex(){
        Utils::isAdmin();

        $invoices = Invoice::all();

        $include = 'app/views/admin/invoices/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'provider_menu_active' => 'active menu_open', 
            'invoice_menu_active' => 'active menu_open',
            'invoice_index_active' => 'active',
            'invoices' => $invoices
        ]);

    }

    /* Mostrar items del carrito */
    public function actionPending(){
        Utils::isAdmin();

        $orders = Order::all();

        $include = 'app/views/admin/orders/pending.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'order_menu_active' => 'active menu_open',
            'order_pending_active' => 'active',
            'orders' => $orders
        ]);

    }

    public function actionShow($id){
        Utils::isAdmin();

        $invoice = Invoice::find($id);
        $provider = Provider::find($invoice->provider_id);
        $items = InvoiceProduct::where('invoice_id', '=', $id)->get();

        $payments = PaymentHistory::where('invoice_id', $id)->orderBy('id', 'DESC')->get();
        

        $include = 'app/views/admin/invoices/show.php';
        $invoice_index_active = 'active';

        Response::render('admin/dashboard', [
            'include' => $include,
            'provider_menu_active' => 'active menu_open', 
            'invoice_menu_active' => 'active menu_open',
            'items' => $items,
            'invoice' => $invoice,
            'provider' => $provider,
            'payments' => $payments
        ]);
        
    }


    public function actionCreate(){
        Utils::isAdmin();

        $products = Product::all();
        $providers = Provider::all();
        
        $include = 'app/views/admin/invoices/create.php';
        
                   
        Response::render('admin/dashboard', [
            'include' => $include,
            'provider_menu_active' => 'active menu_open', 
            'invoice_menu_active' => 'active menu_open',
            'invoice_create_active' => 'active',
            'products' => $products,
            'providers' => $providers
        ]);
    }


    public function actionStore(){
        Utils::isAdmin();
        
        $provider_id = isset($_POST['provider_id']) ? $_POST['provider_id'] : false;
        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : false;
        $items = isset($_POST['items']) ? $_POST['items'] : false;
        $quantity = $_POST['quantity'];
        //$old_date = ;
        $date = implode("-", array_reverse(explode("/", $_POST['date'])));
        $sub_total = isset($_POST['sub_total']) ? $_POST['sub_total'] : false;
        $payment_amount = isset($_POST['payment_amount']) ? $_POST['payment_amount'] : 0;
        $payment_type_id = isset($_POST['payment_type']) ? $_POST['payment_type'] : 0;
       

        
        if($provider_id && $product_id && $items && $date && $payment_type_id){

            //$quantity = $_POST['quantity'];
            $unit_price = $_POST['price'];
            $post_subtotal = $_POST['subtotal'];
            $post_total = $_POST['total'];
            $sub_total = 0;
                
            for ($i = 0; $i < $items; $i++) { 
                $sub_total += ($quantity[$i] * $unit_price[$i]); // Calculamos el subtotal
            }

            $total_amount = $sub_total;

            $invoice = new Invoice();
            $invoice->provider_id = $provider_id;
            $invoice->payment_type_id = $payment_type_id;
            $invoice->date = $date;
            $invoice->sub_total = $sub_total;
            $invoice->total_amount = $total_amount;

            $status = 10; // Pago
            $debt = 0;

            if($payment_type_id == 3 && $payment_amount < $total_amount){

                $debt = ($total_amount - $payment_amount);
                $status = 11;
                
            }

            $invoice->status_id = $status;
            $invoice->debt = $debt;

            $save = $invoice->save();

            if($save){

                /* Nos traemos la factura recien creada */
                $invoice = Invoice::where('provider_id', '=', $provider_id)->latest()->first();

                /**
                 * Dado el caso que quede en 'pendiente de pago' debemos 
                 * registrar ese pago en el historial de pagos
                 * Siempre y cuando payment_amount (monto abonado) sea mayor a cero
                 */
                if($payment_amount > 0){
                    $payment = new PaymentHistory();
                    $payment->payment = $payment_amount;
                    $payment->invoice_id = $invoice->id;
                    $payment->debt = $debt;
                    $save_payment = $payment->save();
                }
                        
                for($i = 0; $i < $items; $i++){

                    $invoice_product = new InvoiceProduct();

                    $invoice_product->invoice_id = $invoice->id;
                    $invoice_product->product_id = $product_id[$i];
                    $invoice_product->unit_price = $unit_price[$i];
                    $invoice_product->quantity = $quantity[$i];
                    $invoice_product->amount = ($quantity[$i] * $unit_price[$i]);

                    $save_invoice_product = $invoice_product->save();

                    /* Actualizar stock del producto */
                    $product = Product::find($product_id[$i]);
                    
                    /**
                     * Comprobamos si el producto maneja stock, se suma
                     * Por lo contrario, si el producto es a contrapedido el stock no se modifica, queda siempre en Cero.
                     */
                    if($product->delivery_delay == 0){
                        $product->stock = ($product->stock + $quantity[$i]);
                        $update_stock_product = $product->update();

                        /* New Notification */
                        $notification = new Notification();
                        $notification->image = $product->image;
                        $notification->message = 'Se agregó stock <strong>(' . $quantity[$i] . ')</strong>';
                        $notification->icon = 'fa fa-check-circle text-green';
                        $notification->path = '/admin/product/show/' . $product->id;
                        $save_notification = $notification->save();

                        if(!$save_notification){
                            die('error');
                        }
                    }
                    


                    if(!$save_invoice_product){
                        die('error');
                    }

                }
                //Response::redirect('/admin/order/show/' . $order->id);
                $invoice = Invoice::where('provider_id', '=', $provider_id)->latest()->first();
                die(json_encode($invoice));
                    
            } else {

                die('error');
            }

        } else {

            die('error');
        }


    }


    public function actionPrint($id){
        Utils::isAdmin();
        $invoice = Invoice::find($id);
        $items = InvoiceProduct::where('invoice_id', '=', $id)->get();
        $provider = provider::find($invoice->provider_id);

        $include = 'app/views/admin/invoices/print.php';
        
        Response::render('admin/empty-html', [
            'include' => $include,
            'provider_index_active' => 'active',
            'invoice' => $invoice,
            'items' => $items,
            'provider' => $provider
        ]);
        
    }


    public function actionPay_debt($invoice_id){
        Utils::isAdmin();
        
        $payment_amount = isset($_POST['amount']) ? $_POST['amount'] : false;

        if($payment_amount){
            $invoice = Invoice::find($invoice_id);

            $status = 10; // Pago
            $debt = 0;

            if($payment_amount < $invoice->debt){
                $debt = ($invoice->debt - $payment_amount);
                $status = 11;
            }
            $invoice->status_id = $status;
            $invoice->debt = $debt;

            $update = $invoice->update();

            if($update){
                $payment = new PaymentHistory();
                $payment->payment = $payment_amount;
                $payment->invoice_id = $invoice->id;
                $payment->debt = $debt;
                $save_payment = $payment->save();

                if($save_payment){
                    Response::redirect('/admin/invoice/show/' . $invoice->id);
                } else {
                    die('error');
                }
                
            }
            
        } else {
            Response::redirect('/admin/invoice');
        }
        

    }


    public function actionPayment_history(){
        Utils::isAdmin();

        $payments = PaymentHistory::all();

        $include = 'app/views/admin/invoices/payment_history.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'provider_menu_active' => 'active menu_open', 
            'invoice_menu_active' => 'active menu_open',
            'invoice_payment_history_active' => 'active',
        ]);

    }


    public function actionList_payments_history(){
        Utils::isAdmin();

        $payments = PaymentHistory::with('invoice')->orderBy('id', 'desc')->get();
        

        echo '{"data": '.$payments.'}';
    }


}