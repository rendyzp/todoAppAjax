<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtask extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'subtasks';
    protected $primaryKey = 'id_subtask';

    public function Task()
    {
        return $this->belongsTo(Task::class, 'id_task');
    }
}
