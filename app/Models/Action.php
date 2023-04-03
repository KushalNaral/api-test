<?php

namespace App\Models;

use App\Observers\ActionObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'type',
        'status',
        'priority',
        'due_date',
        'user_id',
    ];

    protected static function boot() {

        parent::boot();

        Action::observe(ActionObserver::class);
    }
}
