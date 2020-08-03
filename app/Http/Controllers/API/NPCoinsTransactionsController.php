<?php


namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\NPCoinsTransactionsRepository;

class NPCoinsTransactionsController extends Controller
{
    /**
     * @param NPCoinsTransactionsRepository $repository
     * @return array
     */
    public function getTransactions(NPCoinsTransactionsRepository $repository)
    {
        $id = $this->request->all()['id'];
        $transactions = $repository->getTransactions($id)
        ->map(function($transaction){
            $arr =$transaction->getAttributes();
            $arr['operation'] = ($arr['operation'] = 1) ? "Venda":"Saque";
            $arr['status'] = ($arr['converted']) ? "Liberado":"Bloqueado";
            $arr['created'] = brDate($arr['created_at']);
            $arr['updated'] = brDate($arr['updated_at']);
            return $arr;
        });

        return [
            'data' => $transactions
        ];
    }

    /**
     * @param NPCoinsTransactionsRepository $repository
     * @return array
     */
    public function releaseBalance(NPCoinsTransactionsRepository $repository)
    {
        $id = $this->request->all()['id'];
        $transaction = $repository->find($id);
        $npcoinBalance = $transaction->balance + $transaction->user->npcoins;
        $transaction->update(['converted' => 1]);
        $transaction->user->update(['npcoins' => $npcoinBalance]);
        return [
            'success' => true,
            'npcoins' => $npcoinBalance
        ];
    }

    /**
     * @param NPCoinsTransactionsRepository $repository
     * @return array
     */
    public function releaseBalanceAll(NPCoinsTransactionsRepository $repository)
    {
        $ids = $this->request->all()['ids'];
        foreach ($ids as $key => $id) {
            $transaction = $repository->find($id);
            $npcoinBalance = $transaction->balance + $transaction->user->npcoins;
            $transaction->update(['converted' => 1]);
            $transaction->user->update(['npcoins' => $npcoinBalance]);
        }

        return [
            'success' => true,
            'ids' => $ids
        ];
    }
}