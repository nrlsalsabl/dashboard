<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['name'];

    // public function intern()
    // {
    //     return $this->hasMany(Intern::class);
    // }

    // public function staff()
    // {
    //     return $this->hasMany(Staff::class);
    // }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }
    
        if (isset($filters['name'])) {
            $query->where('name', $filters['name']);
        }
    }

}
