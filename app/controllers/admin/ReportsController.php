<?php

namespace app\controllers\admin;

use Illuminate\Database\Capsule\Manager as DB;

use app\models\Order;
use app\models\Invoice;

use app\helpers\Utils;
use \Response;


class ReportsController {

    
    
    /**
     * Método para obtener los ingresos agrupados por mes
     * para luego pintarlos en una grafica de barras
     */
    public function actionGraph_orders(){
        Utils::isAdmin();

        $income_per_month = DB::select("SELECT MONTH(created_at) AS month, SUM(total_amount) AS income
        FROM orders
        WHERE status_id <> 1
        AND status_id <> 2
        AND status_id <> 3
        AND status_id <> 5
        AND status_id <> 6
        AND status_id <> 9
        AND created_at > DATE_SUB(now(), INTERVAL 6 MONTH)
        GROUP BY MONTH(created_at)
        LIMIT 6;
            ;");


        die(json_encode($income_per_month));
        
    }

    /**
     * Método para obtener los gastos agrupados por mes
     * para luego pintarlos en una grafica de barras
     */
    public function actionGraph_invoices(){
        Utils::isAdmin();

        $expenses_per_month = DB::select("SELECT MONTH(created_at) AS month, SUM(total_amount) AS expenses
            FROM invoices
            WHERE created_at > DATE_SUB(now(), INTERVAL 6 MONTH)
            GROUP BY MONTH(created_at)
            LIMIT 6;
        ");

        die(json_encode($expenses_per_month));
        
    }


    /**
     * Método para obtener una grafica anual de ingresos
     */
    public function actionAnnual_sales_report(){
        Utils::isAdmin();

        $income_per_month = DB::select("SELECT MONTH(created_at) AS month, SUM(total_amount) AS income
        FROM orders
        WHERE created_at > DATE_SUB(now(), INTERVAL 6 MONTH)
        GROUP BY MONTH(created_at)
        LIMIT 12;
            ;");


        die(json_encode($income_per_month));
        
    }


    

}