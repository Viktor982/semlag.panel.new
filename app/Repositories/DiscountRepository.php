<?php

namespace NPDashboard\Repositories;

use NPDashboard\Repositories\Repository;
Use Illuminate\Database\Eloquent\Model;
Use NPDashboard\Models\Discount;
use Illuminate\Database\Capsule\Manager as DB;

class DiscountRepository extends Repository
{
    /**
     * @return Discount
     */

    public function getModel()
    {
        return (new Discount());
    }

    /**
     * @return mixed
     */
    public function discountsTable()
    {
        return $this->getModel()
            ->select('id', 'name', 'plans_affected', 'percentage', 'code', 'expire_date')
            ->get();
    }

    public function allDiscounts()
    {
        return $this->getModel()
            ->select('id','name')
            ->get();
    }

    public function allDiscountsJoin()
    {
        $query = 
        "SELECT     cd.name, COUNT(v.id) AS sales,
                    COUNT(CASE
                            WHEN v.status = 2 THEN v.id
                          END)
                    AS salesApproved

        FROM        cupom_desconto cd

        INNER JOIN  venda v WHERE v.discount_id = cd.id

        GROUP BY    cd.id

        ORDER BY    sales DESC";
        
        $result = DB::table(DB::raw("($query) as a"))->get();
        return $result;
    }
}