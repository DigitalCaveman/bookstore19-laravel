<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class State extends Model
{
    protected $fillable = [
        'order_id', 'state', 'stage', 'state_comment'
    ];

    public function Order() : BelongsTo {
        return $this->belongsTo(Order::class);
    }
}
