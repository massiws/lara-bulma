<?php

namespace App;

use App\User;
use App\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug',
    ];

    /**
     * Make name Title Case and build slug.
     *
     * @param string $input
     * @return void
     */
    protected function setNameAttribute($input)
    {
        if ($input) {
            $this->attributes['name'] = Str::title($input);
            $this->attributes['slug'] = Str::slug($this->attributes['name']);
        }
    }

    /**
     * Get all users associated with this role (1:n relationship).
     *
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get all permissions for this role (n:n relationship).
     *
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
}
