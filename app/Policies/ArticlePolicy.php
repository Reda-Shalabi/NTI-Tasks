<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
   // app/Policies/ArticlePolicy.php
public function update(User $user, Article $article)
{
    return $user->id === $article->user_id;
}

public function delete(User $user, Article $article)
{
    return $user->id === $article->user_id;
}

public function create(User $user)
{
    return true;
}

}
