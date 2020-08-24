<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{

    public const PREFIX_KAB = "3514";
    public const PREFIX_KOTA = "3575";

    protected $table = 'kecamatan';
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kabupaten_id', 'nama', 'latitude', 'longitude'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function kab()
    {
        return $this->where('kabupaten_id', SELF::PREFIX_KAB);
    }

    public static function getkab()
    {
        $obj = new SELF;
        return $obj->where('kabupaten_id', SELF::PREFIX_KAB);
    }

    public function kota()
    {
        return $this->where('kabupaten_id', SELF::PREFIX_KOTA);
    }

    public static function getkota()
    {
        $obj = new SELF;
        return $obj->where('kabupaten_id', SELF::PREFIX_KOTA);
    }

    public function maps()
    {
        return $this->hasMany(Map::class, 'kecamatan_id', 'id');
    }
}
