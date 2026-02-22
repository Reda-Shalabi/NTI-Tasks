<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CommentController extends Controller
{
    use AuthorizesRequests;

    /**
     * إضافة comment جديد على article
     */
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $validated['article_id'] = $article->id;
        $validated['user_id'] = $request->user()->id;

        Comment::create($validated);

        return redirect()->route('articles.show', $article)->with('success', 'تم إضافة التعليق بنجاح!');
    }

    /**
     * حذف comment
     */
    public function destroy(Comment $comment)
    {
        $article = $comment->article;
        
        // تحقق من الصلاحيات
        $this->authorize('delete', $comment);

        $comment->delete();

        return redirect()->route('articles.show', $article)->with('success', 'تم حذف التعليق بنجاح!');
    }
}
