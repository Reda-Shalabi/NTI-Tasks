

<?php $__env->startSection('content'); ?>
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    font-family: 'Segoe UI', sans-serif;
  }

  .article-glass-box {
    max-width: 800px;
    margin: 60px auto;
    padding: 30px 40px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #000;
  }

  .article-glass-box h3 {
    font-weight: bold;
    font-size: 2rem;
    margin-bottom: 1rem;
  }

  .article-glass-box p {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #222;
  }

  .article-glass-box .text-muted {
    font-size: 0.9rem;
    margin-top: 20px;
  }

  .btn-secondary {
    margin-top: 20px;
  }
</style>

<div class="article-glass-box">
    <h3><?php echo e($article->title); ?></h3>
    <p><?php echo e($article->body); ?></p>
    <p class="text-muted">✍️ By <?php echo e($article->user->name ?? 'Unknown'); ?></p>
    <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-secondary">⬅ Back to Articles</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Day15\articles-app\resources\views/articles/show.blade.php ENDPATH**/ ?>