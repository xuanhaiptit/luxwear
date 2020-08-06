<?php $__env->startComponent('mail::message'); ?>
# Introduction

The body of your message.

<?php $__env->startComponent('mail::button', ['url' => '']); ?>
Button Text
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH G:\xampp_7\htdocs\ismart\resources\views/emails/welcome.blade.php ENDPATH**/ ?>