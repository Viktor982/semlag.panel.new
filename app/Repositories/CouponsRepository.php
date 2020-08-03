<?php


namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\Customer;
use NPDashboard\Models\User;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Coupon;
use NPCore\AppCapsule;
use Illuminate\Database\Capsule\Manager as DB;

class CouponsRepository extends Repository
{
    /**
     * @return Coupon
     */
    public function getModel()
    {
        return (new Coupon());
    }

    /**
     * @param $code
     * @return mixed
     */
    public function findByCode($code)
    {
        return $this->getModel()
            ->where('cupom', $code)
            ->paginate(10);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findBySaleId($id)
    {
        return $this->getModel()
            ->where('venda_id', $id)
            ->paginate(10);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByUser($id)
    {
        return $this->getModel()
            ->where('vendedor', $id)
            ->paginate(10);
    }

    public function findByUserApi($id)
    {
        return $this->getModel()
            ->where('vendedor', $id)
            ->get();
    }

    /**
     * @param $method
     * @param $value
     * @return mixed
     */
    public function search($method, $value)
    {
        if (empty($method) || empty($value)){
            return $this->coupounTables();
        }

        switch($method){

            case 'email':
                $customer = (new CustomersRepository())->findByEmail($value);
                return $this->findByUser($customer->id);
                break;

            case 'coupon':
                return $this->findByCode($value);
                break;

            case 'sale':
                return $this->findBySaleId($value);
                break;

            default:
                return $this->coupounTables();
                break;
        }
    }

    /**
     * @return mixed
     */
    public function coupounTables()
    {
        return $this->getModel()
            ->select('id', 'venda_id', 'plano_id', 'data_cadastro', 'data_utilizacao', 'cupom', 'vendedor', 'user_activated', 'disabled')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function coupounInfoTables()
    {
        $query = "SELECT * FROM (
            (SELECT c.id, c.venda_id, c.plano_id, c.data_cadastro, c.data_utilizacao, c.cupom, c.vendedor, c.user_activated, c.disabled, ci.reason, ci.destiny, ci.ad_user_ip
                    FROM cupom c 
                    INNER JOIN cupom_info ci WHERE ci.coupon_id = c.id
                    ORDER BY c.id DESC)
                    
                    UNION ALL 
                    
                    (SELECT c2.id, c2.venda_id, c2.plano_id, c2.data_cadastro, c2.data_utilizacao, c2.cupom, c2.vendedor, c2.user_activated, c2.disabled,  null as reason, null as destiny, null as ad_user_ip
                    FROM cupom c2
                    WHERE c2.id NOT IN (
                        SELECT c3.id
                        FROM cupom c3 
                        INNER JOIN cupom_info ci3 WHERE ci3.coupon_id = c3.id)
                    ORDER BY c2.id DESC
                    ) ORDER BY id DESC 
            ) z_q ORDER BY z_q.id DESC";

        $result = DB::table(DB::raw("($query) as a"))->paginate(10);
        return $result;
    }

    /**
     * @param array $plan
     * @param $id
     * @return mixed
     */
    public function create($data)
    {
        $options = [
            "plano_id" => $data['plan'],
            "vendedor" => $data['id'],
            "cupom" => str_random(20)
        ];

        $coupon = parent::create($options);

        np_log('store' , [
            'type' => "Cupom",
            'id' => $coupon->id
        ]);

        return $coupon;
    }
}