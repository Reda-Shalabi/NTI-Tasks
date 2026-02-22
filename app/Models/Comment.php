<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'user_id', 'parent_id', 'body'];

    /**
     * كل comment ينتمي لـ article
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    /**
     * كل comment ينتمي لـ user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * كل comment يقدر يكون له replies (nested comments)
     * بستخدم recursion للحصول على جميع الردود
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('user', 'replies');
    }

    /**
     * Parent comment
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
