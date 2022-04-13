<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'permission_role',
            'role_id',
            'permission_id'
        );
    }

    public function attachPermission($permissionId)
    {
        return  $this->permissions()->attach($permissionId);
    }

    public function syncPermission($permissionId)
    {
        return  $this->permissions()->sync($permissionId);
    }

    public function detachPermission()
    {
        return  $this->permissions()->detach();
    }

    public function hasPermissions($permission)
    {
        return $this->permissions->contains('name', $permission);
    }

    public function scopeWithName($query, $name)
    {
        return $name ? $query->where('name', 'like', '%' . $name . '%') : null;
    }
}
