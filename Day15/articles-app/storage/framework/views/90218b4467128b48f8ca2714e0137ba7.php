<?php $__env->startSection('content'); ?>
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
  }

  .glass-box {
    max-width: 450px;
    margin: 80px auto;
    padding: 30px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #fff;
  }

  .form-control {
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: #fff;
  }

  .form-control::placeholder {
    color: #ddd;
  }

  .btn-primary {
    width: 100%;
    border: none;
  }

  label {
    color: #fff;
  }
</style>

<div class="glass-box">
  <h3 class="text-center mb-4"> Forgot Your Password?</h3>

  <?php if(session('status')): ?>
    <div class="alert alert-success"><?php echo e(session('status')); ?></div>
  <?php endif; ?>

  <form method="POST" action="<?php echo e(route('password.email')); ?>">
    <?php echo csrf_field(); ?>

    <div class="mb-3">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required autofocus value="<?php echo e(old('email')); ?>">
      <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <small class="text-danger"><?php echo e($message); ?></small>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Day15\articles-app\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>