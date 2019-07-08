<?php

namespace App\Models;

use A17\Twill\Models\Model;
use App\Traits\UserTrait;

class DashboardUser extends Model
{
    use UserTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dashboard_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'published',
        'email',
        'name',
        'user_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // add checkbox fields names here (published toggle is itself a checkbox)
    public $checkboxes = [
        'published'
    ];
}
