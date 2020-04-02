<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'menu', 'actions'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public static function get_from_menu($user, $key_menu)
    {
        $obj = new SELF;
        $data = $obj->where('username', $user->username)->where('menu', $key_menu)->first();
        if ($data) return json_decode($data->actions, true);
        return null;
    }
}
