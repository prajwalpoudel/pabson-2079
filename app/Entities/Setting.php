<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Setting extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
}
