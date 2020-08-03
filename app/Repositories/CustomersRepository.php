<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Customer;

class CustomersRepository extends Repository
{
    /**
     * @return Customer
     */
    public function getModel()
    {
        return (new Customer());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->getModel()
            ->where('id', $id)
            ->get()
            ->first();
    }

    /**
     * @param array $ids
     * @param array $fields
     * @return mixed
     */
    public function findByIds(array $ids, array $fields = ['id', 'usuario', 'nome'])
    {
        return $this->databaseManager()
            ->table('usuario')
            ->select(...$fields)
            ->whereIn('id', $ids)
            ->get();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function findByEmail($email)
    {
        return $this->getModel()
            ->where('usuario', $email)
            ->get()
            ->first();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function findByName($name)
    {
        return $this->getModel()
            ->where('nome', 'like', '%' . $name . '%')
            ->get()
            ->first();
    }

    /**
     * @param $code
     * @return mixed
     */
    public function findByRefCode($code)
    {
        return $this->getModel()
            ->where('ref', $code)
            ->get()
            ->first();
    }

    /**
     * @param $code
     * @return mixed
     */
    public function findByRefMeterCode($code)
    {
        return $this->getModel()
            ->where('ref_meter', $code)
            ->get()
            ->first();
    }

    public function findUsersCountry()
    {
        return $this->getModel()
            ->select('country')
            ->where('country', '!=', "NULL")
            ->where('country', '!=', null)
            ->where('country', '!=', '')
            ->groupBy('country')
            ->get();
    }

    public function findUsersCountrySubs()
    {
        return $this->getModel()
            ->select('country')
            ->join('venda', 'venda.usuario_id', '=', 'usuario.id')
            ->groupBy('country')
            ->get();
    }

    /**
     * @param $method
     * @param $value
     * @return mixed
     */
    public function search($method, $value)
    {
        if (empty($method) || empty($value)) {
            return $this->customersTable();
        }

        switch ($method) {
            case 'id':
                return $this->findById($value);
                break;

            case 'email':
                return $this->findByEmail($value);
                break;

            case 'nome':
                return $this->findByName($value);
                break;

            case 'refcode':
                return $this->findByRefCode($value);
                break;

            case 'refmeter':
                return $this->findByRefMeterCode($value);
                break;
        }
    }

    /**
     * @return mixed
     */
    public function customersTable()
    {
        return $this->getModel()
            ->select('id', 'nome', 'usuario', 'nivel', 'status', 'points', 'days', 'vip_time_premium')
            ->paginate(20);
    }

    /**
     * @return mixed
     */

    public function affiliatesTable()
    {
        return $this->getModel()
            ->select('id', 'nome', 'usuario', 'affiliated_percentage', 'status')
            ->paginate(20);
    }

    /**
     * @return mixed
     */
    public function resellersTable()
    {
        return $this->getModel()
            ->select('id', 'nome', 'usuario', 'reseller')
            ->where('reseller', 1)
            ->paginate(20);
    }

    /**
     * @return mixed
     */
    public function affiliatesPanelTable()
    {
        return $this->getModel()
            ->select('id', 'nome', 'usuario', 'affiliated_percentage', 'npcoins')
            ->paginate(20);
    }

    /**
     * @return mixed
     */
    public function affiliatesAccessesTable()
    {
        return $this->getModel()
            ->select('id', 'nome', 'usuario')
            ->paginate(20);
    }

    /**
     * @return mixed
     */
    public function affiliatesSalesTable()
    {
        return $this->getModel()
            ->select('id', 'nome', 'usuario')
            ->paginate(20);
    }

    /**
     * @return mixed
     */
    public function fakeSortableCustomer()
    {
        return $this->getModel()
            ->select('id', 'nome')
            ->get();
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getIdAndEmailIfExists($email)
    {
        return $this->getModel()
            ->select('id', 'usuario')
            ->where('usuario', $email)
            ->get()
            ->first();
    }

    public function findByToken(array $tokens = [])
    {
        return $this->databaseManager()
            ->table('usuario')
            ->select('id', 'usuario', 'utoken', 'pc_uid', 'affiliated_reference_id')
            ->whereIn('utoken', $tokens)
            ->get();
    }


    /**
     * @return mixed
     */
    public function getUserWithouCountry()
    {
        return $this->getModel()
            ->select('usuario.*')
            ->join('venda', 'venda.usuario_id', 'usuario.id')
            ->where('country', null)
            ->whereNotNull('last_login_ip_site')
            ->groupBy('usuario.id')
            ->get();
    }
}
