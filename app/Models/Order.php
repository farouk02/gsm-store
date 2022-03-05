<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'activity_id',
        'track_number',
        'mobile',
        'description'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function activities(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }
}
