<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'pic',
        'staff_id',
        'brand_id',
        'month_year',
        'talent_id',
        'agency_id',
        'scope_id',
        'qty',
        'rate_brand',
        'rate_talent',
        'payment_to_talent_date',
        'payment_from_brand_date',
        'description',
    ];

    public function pic()
    {
        return $this->belongsTo(Staff::class, 'pic');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function talent()
    {
        return $this->belongsTo(Talent::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function scope()
    {
        return $this->belongsTo(Scope::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }


    public function scopeSearch($query, array $filters)
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
        ->when($filters['pic'] ?? null, function ($query, $pic) {
            // Menyaring berdasarkan PIC (staff)
            $query->whereHas('staff', function ($q) use ($pic) {
                $q->where('name', 'like', "%{$pic}%");  // Menyesuaikan nama dengan kolom yang ada di model Staff
            });
        });
    }
}
