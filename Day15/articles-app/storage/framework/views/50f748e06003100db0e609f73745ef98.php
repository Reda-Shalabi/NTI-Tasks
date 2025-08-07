

<?php $__env->startSection('content'); ?>
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    font-family: 'Segoe UI', sans-serif;
  }

  .create-glass-box {
    max-width: 800px;
    margin: 60px auto;
    padding: 30px 40px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.12); /* شفافية أقل */
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    color: #fff;
  }

  .create-glass-box h2 {
    font-weight: bold;
    font-size: 2rem;
    margin-bottom: 1.5rem;
  }

  .form-label {
    font-weight: 600;
    color: #fff;
  }

  .form-control {
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .form-control::placeholder {
    color: rgba(255, 255, 255, 0.6);
  }

  .btn-primary {
    background-color: rgba(255, 255, 255, 0.2);
    border: none;
    color: #fff;
    backdrop-filter: blur(2px);
    transition: all 0.3s ease;
  }

  .btn-primary:hover {
    background-color: rgba(255, 255, 255, 0.35);
    color: #fff;
  }
</style>

<div class="create-glass-box">
    <h2>Create New Article</h2>

    <form method="POST" action="<?php echo e(route('articles.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter title..." required>
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control" rows="5" placeholder="Write your article..." required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Day15\articles-app\resources\views/articles/create.blade.php ENDPATH**/ ?>