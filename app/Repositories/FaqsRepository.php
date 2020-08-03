<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\NPFaq;

class FaqsRepository extends Repository
{
    /**
     * @return NPFaq
     */
    public function getModel()
    {
        return (new NPFaq());
    }

    /**
     * @return mixed
     */
    public function faqsTable()
    {
        return $this->getModel()
            ->select('id','lang','question','answer', 'order')
            ->paginate(10);
    }

    public function resetMutiplesIds($id)
    {
        return $this->getModel()
            ->where('multiple_question_id', $id)
            ->delete();
    }
}