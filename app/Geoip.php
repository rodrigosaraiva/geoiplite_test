<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geoip extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'geoips';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_ip', 'end_ip', 'start_number_ip', 'end_number_ip', 'country_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }
}
