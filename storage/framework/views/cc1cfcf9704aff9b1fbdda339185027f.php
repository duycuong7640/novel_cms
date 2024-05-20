<?php $__env->startSection('content'); ?>
    <div class="container-scroller" id="app">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <h2>Admin Login</h2>
                            </div>
                            <form action="" class="pt-3" id="form-login" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password">
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="remember_token" class="form-check-input">
                                            <i class="input-helper"></i>
                                            Remember
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Đăng nhập</button>
                                </div>
                                <?php if($errors->has('accountNotFound')): ?>
                                    <p class="alert alert-danger"><?php echo e($errors->first('accountNotFound')); ?></p>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('validate'); ?>
    <?php echo JsValidator::formRequest('Modules\Admins\Http\Requests\LoginRequest','#form-login'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins::layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Admins/Resources/views/auth/login.blade.php ENDPATH**/ ?>