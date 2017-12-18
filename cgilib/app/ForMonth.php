<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForMonth extends Model
{
    protected $table = "for_month";
	protected $fillable = [
        'id', 'for_month', 'created_at', 'updated_at'
    ];
}
