<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * Get all of the models that own schedule.
     */
    public function scheduleable()
    {
        return $this->morphTo();
    }
}
