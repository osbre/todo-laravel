<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','description','user_id'];

    public function updateTask($data)
    {
        $task = $this->find($data['id']);
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->save();
        return 1;
    }
}
