<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeLockdown extends Model
{
    protected $table = 'time_lockdown';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'lockdown_id', 'tipe', 'hari', 'tgl_awal', 'tgl_akhir', 'jam_awal', 'jam_akhir'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function lockdown()
    {
        return $this->belongsTo(Lockdown::class, 'lockdown_id');
    }
    
}
