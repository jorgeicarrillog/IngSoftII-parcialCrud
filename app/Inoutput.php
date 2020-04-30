<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inoutput extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['date', 'type', 'user_id', 'vehicle_id'];
    
    /**
     * Get the user associated with the visit.
     */
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    
    /**
     * Get the vehicle associated with the visit.
     */
    public function vehicle()
    {
        return $this->hasOne('App\Vehicle','id','user_id');
    }
}
