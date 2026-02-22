<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Enable factory functionality for creating test data
    use HasFactory;
    
    // Fields that can be mass assigned (filled from forms)
    protected $fillable = ['title', 'body', 'user_id'];

    /**
     * كل article ينتمي لـ user (الكاتب)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * كل article يقدر يكون له كتير top-level comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->with('user', 'replies');
    }

    /**
     * اجيب جميع الـ top-level comments فقط
     */
    public function topLevelComments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}