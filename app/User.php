<?php

namespace App;

use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Hash password before save into database.
     *
     * @param mixed $input The input value
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    /**
     * Make user name first character uppercase.
     *
     * @param string $input
     * @return void
     */
    protected function setNameAttribute($input)
    {
        if ($input) {
            $this->attributes['name'] = title_case($input);
        }
    }

    /**
     * The Role this user belongs to.
     *
     * @return object
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Check if current user has an Admin role.
     * Admin role(s) can be defined in `.env` file.
     *
     * @return boolean
     */
    public function isAdmin()
    {
        $admin_roles = explode(',', env('ADMIN_ROLES'));
        $admin_roles = empty($admin_roles[0]) ? [1] : $admin_roles;

        return in_array($this->role_id, $admin_roles);
    }

    /**
     * Check if the user has the given permission.
     *
     * @param string|int $permission Permission to check.
     *
     * @return boolean
     */
    public function hasPermission($permission = '')
    {
        if ($this->isAdmin()) {
            return true;
        }

        if (is_integer($permission)) {
            $permission = Permission::findOrFail($permission)->slug;
        }

        // Get all permission associated with user's role.
        $role_permission = optional($this->role->permissions)->pluck('slug')->all();
        if (empty($role_permission)) {
            return false;
        }

        return in_array($permission, $role_permission);
    }
}
