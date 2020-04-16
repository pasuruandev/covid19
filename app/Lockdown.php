<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lockdown extends Model
{
    protected $table = 'lockdown';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'tipe_lokasi', 'lokasi', 'alamat', 'deskripsi'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function waktu()
    {
        return $this->hasMany(TimeLockdown::class, 'lockdown_id');
    }
    
}
