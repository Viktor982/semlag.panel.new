<?php

namespace NPDashboard\Models;

class AffiliateEmailRequest extends Model
{
    protected $table = "affiliate_email_requests";
    public $timestamps = true;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->HasOne(Customer::class, 'id', 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function affiliate()
    {
        return $this->HasOne(Customer::class, 'id', 'affiliate_id');
    }
}