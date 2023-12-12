<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Reminder;
use App\Models\User;

class ToDoList extends Model
{
    use HasFactory;

    protected $table = 'todolists';

    protected $fillable = [
        'user_id',
        'title',
        'type',
        'notes',
        'reminder',
        'pinned',
        'status',
        'filename'
    ];

    public function reminder(): HasOne
    {
        return $this->hasOne(Reminder::class, 'id', 'to_do_list_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
