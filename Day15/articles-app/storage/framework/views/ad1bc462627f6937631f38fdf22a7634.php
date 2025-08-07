<!DOCTYPE html>
<html>
<head>
    <title><?php echo $__env->yieldContent('title', 'Laravel App'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
    <?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html><?php /**PATH C:\xampp\htdocs\Day15\articles-app\resources\views/layouts/app.blade.php ENDPATH**/ ?>