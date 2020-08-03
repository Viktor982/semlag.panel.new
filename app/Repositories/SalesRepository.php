<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Sale;

class SalesRepository extends Repository
{
    /**
     * @return Sale
     */
    public function getModel()
    {
        return (new Sale());
    }

    /**
     * @param $date
     * @return mixed
     */

    public function findByDate($date)
    {
        return $this->getModel()
            ->where('data_vigencia', $date)
            ->get();
    }

    /**
     * @return mixed
     */
    public function salesTables()
    {
        return $this->getModel()
            ->select('id', 'usuario_id', 'plano_id','affiliated_id', 'data_vigencia', 'valor', 'status', 'metodo', 'currency_id', 'vezes', 'assinatura_id', 'first_recurring')
            ->orderByDesc('id')
            ->paginate(20);
    }

    public function affiliatedSales($toDate, $fromDate)
    {
        return $this->getModel()
            ->select('usuario_id', 'affiliated_id', 'data_vigencia', 'status')
            ->whereBetween('data_vigencia', [$toDate, $fromDate])
            ->where('status' ,2)
            ->whereNotNull('affiliated_id')
            ->orderBy('usuario_id')
            ->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->getModel()
            ->where('id', $id)
            ->orderByDesc('id')
            ->paginate(20);
    }

    /**
     * @param $email
     * @param null $to_date
     * @param null $from_date
     * @return mixed
     */
    public function findByEmail($email, $to_date = null, $from_date = null)
    {
        $customer = (new CustomersRepository())->findByEmail($email);

        if (is_null($to_date)) {
            return $this->getModel()
                ->where('usuario_id', $customer->id)
                ->orderByDesc('id')
                ->paginate(20);
        } else {
            return $this->getModel()
                ->where('usuario_id', $customer->id)
                ->whereBetween('data_vigencia', [strval($from_date), strval($to_date)])
                ->orderBy('data_vigencia', 'asc')
                ->paginate(20);
        }
    }

    /**
     * @param $status
     * @param null $to_date
     * @param null $from_date
     * @return mixed
     */
    public function findByStatus($status, $to_date = null, $from_date = null)
    {
        if (is_null($to_date)) {
            return $this->getModel()
                ->where('status', $status)
                ->orderByDesc('id')
                ->paginate(20);
        } else {
            return $this->getModel()
                ->where('status', $status)
                ->whereBetween('data_vigencia', [strval($from_date), strval($to_date)])
                ->orderBy('data_vigencia', 'asc')
                ->paginate(20);
        }
    }

    /**
     * @param $to_date
     * @param $from_date
     * @return mixed
     */
    public function findBetweenDates($to_date, $from_date)
    {
        return $this->getModel()
            ->whereBetween('data_vigencia', [strval($from_date), strval($to_date)])
            ->orderBy('data_vigencia', 'asc')
            ->paginate(10);
    }

    /**
     * @param $trackCode
     * @return mixed
     */
    public function findByTrackCode($trackCode)
    {
        return $this->getModel()
            ->where('pag_seguro', $trackCode)
            ->orWhere('op_code', $trackCode)
            ->orderByDesc('id')
            ->paginate(20);
    }

    /**
     * @param $gatewayCode
     * @param $to_date
     * @param $from_date
     * @return mixed
     */
    public function findByGateway($gatewayCode, $to_date, $from_date)
    {
        if (is_null($to_date)) {
            return $this->getModel()
                ->where('metodo', $gatewayCode)
                ->orderByDesc('id')
                ->paginate(20);
        } else {
            return $this->getModel()
                ->where('metodo', $gatewayCode)
                ->whereBetween('data_vigencia', [strval($from_date), strval($to_date)])
                ->orderBy('data_vigencia', 'asc')
                ->paginate(20);
        }
    }

    /**
     * @param $planCode
     * @param $to_date
     * @param $from_date
     * @return mixed
     */
    public function findByPlan($planCode, $to_date, $from_date)
    {
        if (is_null($to_date)) {
            return $this->getModel()
                ->where('plano_id', $planCode)
                ->orderByDesc('id')
                ->paginate(20);
        } else {
            return $this->getModel()
                ->where('plano_id', $planCode)
                ->whereBetween('data_vigencia', [strval($from_date), strval($to_date)])
                ->orderBy('data_vigencia', 'asc')
                ->paginate(20);
        }
    }

    /**
     * @param $method
     * @param $value
     * @param null $to_date
     * @param null $from_date
     * @return mixed
     */
    public function search($method, $value, $to_date = null, $from_date = null)
    {

        switch ($method) {
            case 'customer':
                return $this->findByEmail($value, $to_date, $from_date);
                break;

            case 'id':
                return $this->findById($value);
                break;

            case 'track-code':
                return $this->findByTrackCode($value);
                break;

            case 'gateway':
                return $this->findByGateway($value, $to_date, $from_date);
                break;

            case 'status':
                return $this->findByStatus($value, $to_date, $from_date);
                break;

            case 'date':
                return $this->findBetweenDates($to_date, $from_date);
                break;

            case 'plan':
                return $this->findByPlan($value, $to_date, $from_date);
                break;

            default:
                return $this->findByEmail($value, $to_date, $from_date);
                break;
        }
    }

    /**
     * @param bool $approved
     * @return mixed
     */
    public function dailySales($approved = false)
    {
        $today = date("Y-m-d");
        if ($approved) {
            $count = Sale::where('date_approved', '>=', "{$today} 00:00:00")
                ->where('date_approved', '<=', "{$today} 23:59:59")
                ->where('status', 2)
                ->count();
        } else {
            $count = Sale::where('data_vigencia', '>=', "{$today} 00:00:00")
                ->where('data_vigencia', '>=', "{$today} 00:00:00")
                ->where('data_vigencia', '<=', "{$today} 23:59:59")
                ->where('status', '!=', 2)
                ->count();
        }
        return $count;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findByDiscountCoupon($id)
    {
        return $this->getModel()
            ->where('discount_id', $id)
            ->get();
    }

    public function findApprovedSaleDatesByCustomerId($ids = [])
    {
        return $this->databaseManager()
            ->table('venda')
            ->select('status', 'data_vigencia', 'usuario_id')
            ->where('status', 2)
            ->whereIn('usuario_id', $ids)
            ->get();
    }
}