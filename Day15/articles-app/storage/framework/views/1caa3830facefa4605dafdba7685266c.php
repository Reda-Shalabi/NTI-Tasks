<?php $__env->startSection('content'); ?>
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    font-family: 'Segoe UI', sans-serif;
  }

  .dashboard-card {
    max-width: 600px;
    margin: 80px auto;
    padding: 40px 30px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #000000;
    text-align: center;
  }

  .dashboard-card h1 {
    font-weight: 600;
    font-size: 2.5rem;
    margin-bottom: 1.5rem;
  }

  .dashboard-card p {
    color: #d4d4d4;
    font-size: 1.2rem;
    margin-bottom: 2rem;
  }

  .dashboard-card .btn {
    padding: 10px 30px;
    font-size: 1.1rem;
    font-weight: 500;
  }
</style>

<div class="dashboard-card">
  <h1>📊 Dashboard</h1>
  <p class="lead">Welcome back, <strong><?php echo e(auth()->user()->name); ?></strong>!</p>
  <a href="<?php echo e(route('articles.index')); ?>" class="btn btn-primary">📝 Manage Articles</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Day15\articles-app\resources\views/dashboard.blade.php ENDPATH**/ ?>