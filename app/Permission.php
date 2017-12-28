<?php

namespace App;

use App\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
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
            $this->attributes['name'] = title_case($input);
            $this->attributes['slug'] = str_slug($this->attributes['name']);
        }
    }

    /**
     * Find a permission by its slug.
     *
     * @param string $slug
     *
     * @return Permission|False
     */
    public function findBySlug(string $slug)
    {
        $permission = Permission::where('slug', $slug)->first();
        if (! $permission) {
            return false;
        }

        return $permission;
    }

    /**
     * Get all roles associated with this permission (n:n relationship).
     *
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
