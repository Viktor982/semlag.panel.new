<?php


namespace NPDashboard\Models;


class BannerForCountry extends Model
{
    /**
     * @var string
     */
    protected $table = 'banner_for_countries';
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(Image::class, 'id', 'image_id');
    }

}