<?php

namespace app\controllers\admin;

use \Response;
use app\helpers\Utils;

use Illuminate\Database\Capsule\Manager as DB;

use app\models\User;
use app\models\Product;
use app\models\Category;
use app\models\Order;
use app\models\Item;
use app\models\Favorites;

use Carbon\Carbon;


class AdminController {

    public function actionIndex(){

        Utils::isAdmin();

        /**
         * Cantidad de clientes registrados
         */
        $customers = User::where('role_id', '=', '2')->where('confirmed', '=', 1)->count();

        /**
         * Cantidad de pedidos
         */
        $orders_delivered = Order::count(); // Cantidad de ventas totales

        /**
         * Cantidad de pedidos pendientes
         */
        $orders_pending = Order::where(
            'status_id', 4)
            ->orWhere('status_id', 5)
            ->orWhere('status_id', 6)
            ->orWhere('status_id', 7)
            ->orWhere('status_id', 8)
            ->orWhere('status_id', 9)
            ->count(); // Cantidad de pedidos pendientes

        /**
         * Cantidad de productos vendidos
         */
        $quantity_of_products_sold = 0;
        $items = Item::where('sold', 1)->get();
        foreach($items as $item){
            $quantity_of_products_sold += $item->quantity;
        }

        /**
         * Últimos 7 pedidos
         */
        $orders = Order::orderBy(
            'created_at', 'DESC'
            )
            ->with([
                'status' => function ($query) {
                    $query->withTrashed();
                }
            ])
            ->with([
                'payment_method' => function ($query) {
                    $query->withTrashed();
                }
            ])
            ->take(15)->get(); // 7 ultimos pedidos
        

        /* Ingresos este mes */
        $earnings_this_month = DB::select("SELECT SUM(total_amount) AS TotalAmount 
            FROM orders
            WHERE status_id <> 1
            AND status_id <> 2
            AND status_id <> 3
            AND status_id <> 5
            AND status_id <> 6
            AND status_id <> 9
            AND MONTH(created_at) = MONTH(NOW());
        ");
        $earnings_this_month = $earnings_this_month[0]->TotalAmount;

        /* Ingresos mes anterior */
        $earnings_previous_month = DB::select("SELECT SUM(total_amount) AS TotalAmount 
            FROM orders
            WHERE status_id <> 1
            AND status_id <> 2
            AND status_id <> 3
            AND status_id <> 5
            AND status_id <> 6
            AND status_id <> 9
            AND MONTH(created_at) = MONTH(NOW()) - 1;
        ");
        $earnings_previous_month = $earnings_previous_month[0]->TotalAmount;



        /* Gastos este mes */
        $expenses_this_month = DB::select("SELECT SUM(total_amount) AS TotalAmount 
            FROM invoices
            WHERE MONTH(created_at) = MONTH(NOW());
        ");
        $expenses_this_month = $expenses_this_month[0]->TotalAmount;

        /* Gastos mes anterior */
        $expenses_previous_month = DB::select("SELECT SUM(total_amount) AS TotalAmount 
            FROM invoices
            WHERE MONTH(created_at) = MONTH(NOW()) - 1;
        ");
        $expenses_previous_month = $expenses_previous_month[0]->TotalAmount;

        /* Deudas pendientes */
        $outstanding_debts= DB::select("SELECT SUM(debt) AS OutstandingDebts 
            FROM invoices;
        ");
        $outstanding_debts = $outstanding_debts[0]->OutstandingDebts;



        $now = Carbon::now();

        /* Cantidad productos vendidos éste mes */
        $qty_product_sold_this_month = 0;
      
        $product_sold_this_month = Item::where('sold', 1)
                                ->whereMonth('created_at', $now->month)
                                ->whereYear('created_at', $now->year)
                                ->get();
        foreach($product_sold_this_month as $item){
            $qty_product_sold_this_month += $item->quantity;
        }


        /* Cantidad productos vendidos el mes anterior */
        $qty_product_sold_previous_month = 0;
      
        $product_sold_previous_month = Item::where('sold', 1)
                                            ->whereMonth('created_at', '<', $now->subMonth())
                                            ->get();
        //dd($product_sold_previous_month);
        foreach($product_sold_previous_month as $item){
            $qty_product_sold_previous_month += $item->quantity;
        }


        /* Usuarios registrados éste mes */
        $registered_users_this_month = DB::select("SELECT COUNT(users.id) AS Users FROM users
            WHERE MONTH(created_at) = MONTH(NOW());
        ");
        $registered_users_this_month = $registered_users_this_month[0]->Users;

        /* Usuarios registrados el mes anterior */
        $registered_users_previous_month = DB::select("SELECT COUNT(users.id) AS Users FROM users
            WHERE MONTH(created_at) = MONTH(NOW()) - 1;
        ");
        $registered_users_previous_month = $registered_users_previous_month[0]->Users;
    
       
      



        // Los 5 productos más vendidos
        $most_selling_products = DB::select("SELECT products.*, 
            categories.name AS category_name, 
            SUM(quantity) AS TotalQuantity 
            FROM items

            INNER JOIN products ON products.id = items.product_id
            INNER JOIN categories ON products.category_id = categories.id
            WHERE items.sold = 1
            GROUP BY product_id
            ORDER BY SUM(quantity) DESC
            LIMIT 5
        ");
        //dd($most_selling_products);

        //WHERE items.deleted_at = NULL

        // 5 productos favoritos por los clientes
        $favorites = DB::select("SELECT COUNT(product_id) as fav, products.*, categories.name AS category_name
            FROM favorites
            INNER JOIN products ON products.id = favorites.product_id
            INNER JOIN categories ON products.category_id = categories.id
            
            GROUP BY product_id
            ORDER BY fav DESC
            LIMIT 5;
        ");
        //dd($favorites);


        $best_customers = DB::select("SELECT users.*, 
            max(orders.created_at) AS LastOrderDate, 
            COUNT(orders.id) AS OrderQuantity, 
            COUNT(items.id) AS ItemQuantity, 
            SUM(total_amount) AS TotalAmount 
            FROM orders 

            INNER JOIN users ON users.id = orders.user_id 
            INNER JOIN items ON orders.id = items.order_id 
            WHERE users.role_id = 2
            AND orders.deleted_at IS NULL
            GROUP BY user_id 
            ORDER BY COUNT(orders.id) 
            DESC LIMIT 5
        ");
        

        $include = 'app/views/admin/index.php';
        $home_active = 'active';
        
        Response::render('admin/dashboard', [
            'include' => $include,
            'home_active' => $home_active,
            'customers' => $customers,
            'orders_delivered' => $orders_delivered,
            'orders_pending' => $orders_pending,
            'orders' => $orders,
            'quantity_of_products_sold' => $quantity_of_products_sold,
            'most_selling_products' => $most_selling_products,
            'best_customers' => $best_customers,
            'earnings_this_month' => $earnings_this_month,
            'earnings_previous_month' => $earnings_previous_month,
            'qty_product_sold_this_month' => $qty_product_sold_this_month,
            'qty_product_sold_previous_month' => $qty_product_sold_previous_month,
            'registered_users_this_month' => $registered_users_this_month,
            'registered_users_previous_month' => $registered_users_previous_month,
            'favorites' => $favorites
        ]);

    }

}