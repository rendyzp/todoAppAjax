<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tasks';
    protected $primaryKey = 'id_task';

    public function Subtask()
    {
        return $this->hasMany(Subtask::class, 'id_task', 'id_task');
    }
}
