<?php


namespace NPDashboard\Models;


class NPCoinTransaction extends Model
{
    protected $table = "npcoin_transactions";

    protected $fillable = [
        'user_id',
        'operation',
        'information',
        'balance',
        'converted',
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(Customer::class);
    }
}