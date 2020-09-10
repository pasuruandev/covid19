<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Map extends Model
{

    public const PREFIX_KAB = "kab";
    public const PREFIX_KOTA = "kota";

    protected $table = 'map';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prefix', 'kecamatan_id', 'tanggal', 'suspek', 'konfirmasi'
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
        return $this->where('prefix', SELF::PREFIX_KAB);
    }

    public static function getkab()
    {
        $obj = new SELF;
        return $obj->where('prefix', SELF::PREFIX_KAB);
    }

    public function kota()
    {
        return $this->where('prefix', SELF::PREFIX_KOTA);
    }

    public static function getkota()
    {
        $obj = new SELF;
        return $obj->where('prefix', SELF::PREFIX_KOTA);
    }

    public function kecamatan()
    {
        return $this->hasOne(Kecamatan::class, 'id', 'kecamatan_id');
    }
}
