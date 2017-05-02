<?php
/**
 * Created by PhpStorm.
 * User: biao
 * Date: 17/1/24
 * Time: 下午2:25
 */
namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository{
    /**
     * Get all of the tasks for a given user.
     *
     * @param User $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}