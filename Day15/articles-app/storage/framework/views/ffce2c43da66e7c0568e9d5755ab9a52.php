

<?php $__env->startSection('content'); ?>
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    font-family: 'Segoe UI', sans-serif;
  }

  .articles-glass-box {
    max-width: 800px;
    margin: 60px auto;
    padding: 30px 40px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #dfdddd;
  }

  .article-card {
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 20px;
    margin-bottom: 20px;
    color: #000;
    transition: all 0.3s ease-in-out;
  }

  .article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 0.9);
  }

  .article-card h4 {
    color: #000;
  }

  .article-card p {
    color: #333;
  }

  .article-card .btn {
    margin-right: 5px;
  }

  .btn-success,
  .btn-info,
  .btn-warning,
  .btn-danger {
    color: white !important;
    border: none;
  }

  .alert {
    border-radius: 8px;
    font-weight: bold;
  }
</style>

<div class="articles-glass-box">

    <?php if(session('success')): ?>
        <div class="alert alert-success text-center">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"> All Articles</h2>
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('articles.create')); ?>" class="btn btn-success shadow">+ Create Article</a>
        <?php endif; ?>
    </div>

    <?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="article-card">
            <h4><?php echo e($article->title); ?></h4>
            <p><?php echo e(Str::limit($article->body, 120)); ?></p>
            <p style="font-size: 0.9rem;" class="text-muted">
                ✍️ By <?php echo e($article->user->name ?? 'Unknown'); ?>

            </p>

            <div class="d-flex">
                <a href="<?php echo e(route('articles.show', $article)); ?>" class="btn btn-info btn-sm">View</a>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $article)): ?>
                    <a href="<?php echo e(route('articles.edit', $article)); ?>" class="btn btn-warning btn-sm">Edit</a>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $article)): ?>
                    <form method="POST" action="<?php echo e(route('articles.destroy', $article)); ?>" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-info text-center">
            No articles found.
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Day15\articles-app\resources\views/articles/index.blade.php ENDPATH**/ ?>