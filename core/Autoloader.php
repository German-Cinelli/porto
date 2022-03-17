<?php

class Autoloader {


    public function __construct(){
        $this->loadVendor();
        $this->loadAppClasses();
        $this->loadAppHelpers();
        $this->loadAppModels();
        $this->loadDatabase();
    }


    private function loadVendor(){
        require_once 'vendor/autoload.php';
    }


    private function loadAppClasses(){
        spl_autoload_register(function($className){

            $var = preg_replace("/\\\\/", "/", $className) . ".php";
            //print_r($var);
            $className = CORE_PATH . $var;
            

            if(file_exists($className)){
                //$filename = APP_PATH.$var; if(file_exists($filename)) require_once($filename);
                require_once $className;
            }

        });
    }


    private function loadAppModels(){
        require_once(APP_PATH . 'models/Attribute.php');
        require_once(APP_PATH . 'models/AttributeValue.php');
        require_once(APP_PATH . 'models/CanceledOrder.php');
        require_once(APP_PATH . 'models/Category.php');
        require_once(APP_PATH . 'models/Combo.php');
        require_once(APP_PATH . 'models/ComboCustomer.php');
        require_once(APP_PATH . 'models/ComboItem.php');
        require_once(APP_PATH . 'models/Config.php');
        require_once(APP_PATH . 'models/Coupon.php');
        require_once(APP_PATH . 'models/CouponOrder.php');
        //require_once(APP_PATH . 'models/Currency.php');
        require_once(APP_PATH . 'models/DiscountType.php');
        require_once(APP_PATH . 'models/Favorite.php');
        require_once(APP_PATH . 'models/FeaturedProduct.php');
        require_once(APP_PATH . 'models/Image.php');
        require_once(APP_PATH . 'models/ImageProduct.php');
        require_once(APP_PATH . 'models/Inbox.php');
        require_once(APP_PATH . 'models/Invoice.php');
        require_once(APP_PATH . 'models/InvoiceProduct.php');
        require_once(APP_PATH . 'models/Item.php');
        require_once(APP_PATH . 'models/Newsletter.php');
        require_once(APP_PATH . 'models/Notification.php');
        require_once(APP_PATH . 'models/Order.php');
        require_once(APP_PATH . 'models/PasswordReset.php');
        require_once(APP_PATH . 'models/PaymentHistory.php');
        require_once(APP_PATH . 'models/PaymentMethod.php');
        require_once(APP_PATH . 'models/PaymentType.php');
        require_once(APP_PATH . 'models/Plan.php');
        require_once(APP_PATH . 'models/Post.php');
        require_once(APP_PATH . 'models/PostUser.php');
        require_once(APP_PATH . 'models/Product.php');
        require_once(APP_PATH . 'models/ProductAttributeValue.php');
        require_once(APP_PATH . 'models/ProductType.php');
        require_once(APP_PATH . 'models/ProductTypeAttributeValue.php');
        require_once(APP_PATH . 'models/ProductUser.php');
        require_once(APP_PATH . 'models/Provider.php');
        require_once(APP_PATH . 'models/Review.php');
        require_once(APP_PATH . 'models/Role.php');
        require_once(APP_PATH . 'models/ShippingCost.php');
        require_once(APP_PATH . 'models/ShippingMethod.php');
        require_once(APP_PATH . 'models/Status.php');
        require_once(APP_PATH . 'models/User.php');
    }


    private function loadAppHelpers(){
        require_once(APP_PATH . 'helpers/Utils.php');
    }

    private function loadDatabase(){
        require_once(CORE_PATH . 'database.php');
    }

}

new Autoloader();
