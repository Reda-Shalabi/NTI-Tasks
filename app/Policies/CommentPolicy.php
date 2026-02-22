<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    /**
     * تحقق إذا كان اليوزر يقدر يحذف الـ comment
     * فقط صاحب الـ comment أو الـ admin يقدر يحذف
     */
    public function delete(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id || $user->isAdmin();
    }

    /**
     * تحقق إذا كان اليوزر يقدر يعدّل الـ comment
     */
    public function update(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id || $user->isAdmin();
    }
}
