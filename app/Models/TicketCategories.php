<?php


namespace NPDashboard\Models;


class TicketCategories extends Model
{
    public $timestamps = true;
    protected $table = 'ticket_categories';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics()
    {
        return $this->hasMany(TicketTopics::class,'category_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translations()
    {
        return $this->hasMany(TicketCategoryTranslation::class,'category_id','id');
    }

}