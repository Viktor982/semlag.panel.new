<?php
namespace NPDashboard\Models;

use NPDashboard\Models\Model;

class Toasts extends Model
{
    protected $connection = 'bd_alias';
    public $timestamps = true;
    protected $table = 'toasts';
}