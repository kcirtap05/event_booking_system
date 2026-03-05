<?php

namespace App\Models\EventBooking;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id', 
        'title', 
        'date',
        'location',
        'created_by'
    ];

    protected $cast = [
        'date' => 'date'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by', 'uuid');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        return $query->where(function($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%")
                ->orWhere('location', 'like', "%{$keyword}%")
                ->orWhereDate('date', "%{$keyword}%")
                ->orWhere(function ($q2) use ($keyword) {
                    $q2->where('date', '<=', $keyword)
                        ->where('date', '>=', $keyword);
                });
        });
    }
}
