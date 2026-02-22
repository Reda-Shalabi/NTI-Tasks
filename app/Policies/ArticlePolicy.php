<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    /**
     * تحقق إذا كان اليوزر يقدر يعدّل الـ article
     * فقط صاحب الـ article أو الـ admin
     */
    public function update(User $user, Article $article): bool
    {
        return $user->id === $article->user_id || $user->isAdmin();
    }

    /**
     * تحقق إذا كان اليوزر يقدر يحذف الـ article
     * فقط صاحب الـ article أو الـ admin
     */
    public function delete(User $user, Article $article): bool
    {
        return $user->id === $article->user_id || $user->isAdmin();
    }

    /**
     * أي user مسجّل يقدر ينشئ article
     */
    public function create(User $user): bool
    {
        return true;
    }
}
