<?php


namespace NPDashboard\Models;


class TicketTopics extends Model
{
    public $timestamps = true;
    protected $table = 'ticket_topics';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(TicketCategories::class,'id','category_id');
    }

    public function translations()
    {
        return $this->hasMany(TicketTopicTranslation::class,'topic_id','id');
    }

}