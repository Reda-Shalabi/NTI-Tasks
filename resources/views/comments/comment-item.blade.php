{{-- Component لعرض التعليق مع الردود بطريقة Recursive --}}
<div class="comment-item">
  <div class="comment-header">
    <span class="comment-author">{{ $comment->user->name }}</span>
    <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
  </div>
  <div class="comment-body">
    {!! nl2br(e($comment->body)) !!}
  </div>
  
  <div class="comment-actions">
    @auth
      <button onclick="toggleReplyForm({{ $comment->id }})" class="reply-btn">↩️ رد</button>
      @can('delete', $comment)
        <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" onclick="return confirm('هل تريد حذف هذا التعليق؟')">🗑️ حذف</button>
        </form>
      @endcan
    @endauth
  </div>

  {{-- عرض الردود بشكل Recursive --}}
  @if($comment->replies()->count() > 0)
    <div class="replies">
      @foreach($comment->replies() as $reply)
        @include('comments.comment-item', ['comment' => $reply, 'article' => $article])
      @endforeach
    </div>
  @endif

  {{-- نموذج الرد --}}
  @auth
    <div id="reply-form-{{ $comment->id }}" class="reply-form" style="display: none;">
      <form action="{{ route('comments.store', $article) }}" method="POST">
        @csrf
        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
        <textarea name="body" placeholder="اكتب ردك..." required></textarea>
        <div>
          <button type="submit">إرسال الرد</button>
          <button type="button" onclick="toggleReplyForm({{ $comment->id }})" style="background: #95a5a6; margin-left: 5px;">إلغاء</button>
        </div>
      </form>
    </div>
  @endauth
</div>
