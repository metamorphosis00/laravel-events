<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRequest extends Model
{
    protected $guarded = ['id'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_participation_requests';

    /**
     * Get event for participation request
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

}
