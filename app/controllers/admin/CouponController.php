<?php

namespace app\controllers\admin;

use Illuminate\Database\Capsule\Manager as DB;

use \Response;
use app\helpers\Utils;

use app\models\Coupon;
use app\models\DiscountType;
use app\models\Order;
use app\models\CouponOrder;
use app\models\User;


class CouponController {

  
    public function actionIndex(){
        Utils::isAdmin();

        $discount_types = DiscountType::all();

        $include = 'app/views/admin/coupons/index.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'coupon_menu_active' => 'active menu_open',
            'coupon_index_active' => 'active',
            'discount_types' => $discount_types
        ]);
        
    }



    public function actionStore(){
        Utils::isAdmin();

        //dd($_POST);

        if(isset($_POST)){

            $code = isset($_POST['code']) ? $_POST['code'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $discount_type_id = isset($_POST['discount_type_id']) ? $_POST['discount_type_id'] : false;
            $discount = isset($_POST['discount']) ? $_POST['discount'] : false;
            $expiration_date = implode("-", array_reverse(explode("/", $_POST['expiration_date'])));
            $limit_usage = isset($_POST['limit_usage']) ? $_POST['limit_usage'] : false;
            $min_value = isset($_POST['min_value']) ? $_POST['min_value'] : 0;
            $min_item = isset($_POST['min_item']) ? $_POST['min_item'] : 0;

            if($code && $description && $discount_type_id && $discount && $expiration_date  && $limit_usage){
                
                $coupon = new Coupon();

                $coupon->code = $code;
                $coupon->description = $description;
                $coupon->discount_type_id = $discount_type_id;
                $coupon->discount = $discount;
                $coupon->expiration_date = $expiration_date;
                $coupon->limit_usage = $limit_usage;
                $coupon->min_value = $min_value;
                $coupon->min_item = $min_item;

                $save_coupon = $coupon->save();
 
                if($save_coupon){
                    die('saved');
                } else {

                    die('error');
                }
 
            } else {

                die('error');
            }
        } else {
            
            die('error');
        }
    }



    public function actionShow($id){
        Utils::isAdmin();

        $coupon = Coupon::find($id);
       
        $coupons_orders = CouponOrder::where('coupon_id', $coupon->id)->get();

        $orders = Order::where('id', $coupon->order_id)
                        ->orderBy('created_at', 'asc')
                        ->get();

        //dd($orders);

        //dd($coupons_orders);

        $coupons_confirmed = CouponOrder::where('coupon_id', $coupon->id)
                                        ->where('confirmed', 1)
                                        ->get();
        
        $include = 'app/views/admin/coupons/show.php';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'coupon_menu_active' => 'active menu_open',
            'coupon' => $coupon,
            'orders' => $orders,
            'coupons_orders' => $coupons_orders,
            'coupons_confirmed' => $coupons_confirmed
        ]);
    }



    public function actionEdit(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $coupon = Coupon::with('discount_type')->find($id);


            if($coupon){
                die($coupon);

            } else {

                die('error');
            }
        } else {

            die('error');
        }

        die('error');
    }



    public function actionUpdate(){
        Utils::isAdmin();

        if(isset($_POST)){

            $id = isset($_POST['id']) ? $_POST['id'] : false;
            $code = isset($_POST['code']) ? $_POST['code'] : false;
            $description = isset($_POST['description']) ? $_POST['description'] : false;
            $discount_type_id = isset($_POST['discount_type_id']) ? $_POST['discount_type_id'] : false;
            $discount = isset($_POST['discount']) ? $_POST['discount'] : 0;
            $expiration_date = implode("-", array_reverse(explode("/", $_POST['expiration_date'])));
            $limit_usage = isset($_POST['limit_usage']) ? $_POST['limit_usage'] : false;
            $min_value = isset($_POST['min_value']) ? $_POST['min_value'] : 0;
            $min_item = isset($_POST['min_item']) ? $_POST['min_item'] : 0;

            if($id && $code && $description && $discount_type_id && $expiration_date  && $limit_usage){
                $coupon = Coupon::find($id);
                $coupon->code =  $code;
                $coupon->description = $description;
                $coupon->discount_type_id = $discount_type_id;
                $coupon->discount = $discount;
                $coupon->expiration_date = $expiration_date;
                $coupon->limit_usage = $limit_usage;
                $coupon->min_value = $min_value;
                $coupon->min_item = $min_item;
                
                $update = $coupon->update();

                if($update){
                    
                    die($id);
                } else {
                    
                    die('error');
                }

            } else {

                die('error');
            }
            
        } else {

            die('error');
        }

    }


    
    public function actionDestroy(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $coupon = Coupon::find($id);
            $coupon->is_active = 0;
            $update = $coupon->update();

            if($update){

                die('deleted');
                
            } else {

                die('error');
            }

        } else {

            die('error');
        }

        die('error');
    }



    public function actionRestore(){
        Utils::isAdmin();

        $id = isset($_POST['id']) ? $_POST['id'] : false;

        if($id){
            $coupon = Coupon::find($id);
            $coupon->is_active = 1;
            $restored = $coupon->update();

            if($restored){
                die('restored');

            } else {
                die('error');
                
            }

        } else {
            die('error');

        }

        die('error');
    }



    public function actionList(){
        Utils::isAdmin();
        
        $coupons = Coupon::with('discount_type')->get();

    
        echo '{"data": '.$coupons.'}';
    }


}