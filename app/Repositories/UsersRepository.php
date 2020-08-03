<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Support\Collection;
use NPCore\AppCapsule;
use NPDashboard\Models\User;
use NPDashboard\Repositories\Repository;

class UsersRepository extends Repository
{
    /**
     * @return User
     */
    public function getModel()
    {
        return new User();
    }

    /**
     * @param $user
     * @param $password
     * @return Collection
     */
    public function findByUserAndPassword($user, $password)
    {
        return $this->getModel()
            ->where('username', $user)
            ->where('password', md5($password))
            ->get();
    }

    /**
     * @return mixed
     */
    public function usersTable()
    {
        return $this->getModel()
            ->select('id', 'username', 'superadmin')
            ->paginate(15);
    }

    public function getUserTime()
    {
        $invalidUserTime =
            AppCapsule::database()
            ->table('usuario')
            ->select(DB::raw("usuario.id, usuario.nome,
                usuario.usuario, SUM(plano.frequency) AS plan_days, usuario.days AS user_days,
                (IF(usuario.days < SUM(plano.frequency), 'OK', 'Não condizente')) as ghost_day_confirmation"))
            ->join('venda', 'venda.usuario_id', '=', 'usuario.id')
            ->join('plano', 'venda.plano_id', '=', 'plano.id')
            ->where('usuario.vip_time', '>', date("Y-m-d"))
            ->where('venda.status', '=', 2)
            ->groupBy('usuario.id')
            ->orderBy('ghost_day_confirmation', 'ASC')
            ->get();
        return $invalidUserTime;
    }

}
