<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
        protected $fillable = ['name', 'description', 'icon', 'route', 'parent_id', 'order', 'is_active'];
    
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    
    public function parent()
    {
        return $this->belongsTo(Module::class, 'parent_id');
    }
    
    public function children()
    {
        return $this->hasMany(Module::class, 'parent_id');
    }
}
