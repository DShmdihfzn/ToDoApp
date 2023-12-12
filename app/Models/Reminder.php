<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ToDoList;

class Reminder extends Model
{
    use HasFactory;

    protected $table = 'reminders';

    protected $fillable = [
        'to_do_list_id',
        'remind_date',
        'remind_time'
    ];

    public function list(): BelongsTo
    {
        return $this->belongsTo(ToDoList::class, 'to_do_list_id', 'id');
    }
}
