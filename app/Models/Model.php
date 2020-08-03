<?php

namespace NPDashboard\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    /**
     * @var array
     */
    protected $guarded = [];
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function find($id)
    {
        $instance = new static;
        return $instance->where('id', '=', $id)
            ->get()
            ->first();
    }
}