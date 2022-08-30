<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use DataTables;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = 'users';
    protected $guarded = [];


    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public static function datatables($data_user)
    {
        $datatables = Datatables::of($data_user)
            ->editColumn('created_at', function(User $data_user) {
                if (!empty($data_user->created_at)) {
                    $result = date("d M Y", strtotime($data_user->created_at));
                } else {
                    $result = NULL;
                }

                return $result;
            })
            ->orderColumns(['name'], '-:column $1')
            ->make(true);

        return $datatables;
    }


    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}
