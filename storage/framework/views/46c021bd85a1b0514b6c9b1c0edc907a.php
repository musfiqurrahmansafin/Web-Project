<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('style'); ?>
    
    <style>
        .login span {
            font-size: 12px;
            font-weight: bold;
        }

        .login #box {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            transition: box-shadow .3s ease-in-out;
        }

        .login #box:hover {
            box-shadow: rgba(0, 0, 0, 0.7) 0px 5px 15px;
            border-radius: 10px;
            cursor: pointer;
        }

        .login #box.active {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .login .password-area {
            position: relative;
        }

        .login .password-eye {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="login d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <div class="p-4 box" id="box">
                <h5 class="fw-bold my-4 alert alert-primary">Login</h5>
                <div id="message">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success fw-bold my-2"> <?php echo e(session('success')); ?></div>
                    <?php elseif(session('danger')): ?>
                        <div class="alert alert-danger fw-bold my-2"> <?php echo e(session('danger')); ?></div>
                    <?php endif; ?>
                </div>
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mt-3 mb-2">
                        <label class="mb-2 fw-bold">Your Email</label>
                        <input style="width: 250px" class="form-control" type="text" placeholder="Email" name="email"
                            value="<?php echo e(old('email')); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color: #ff0000"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mt-3 mb-2">
                        <label class="mb-2 fw-bold">Your Password</label>
                        <div class="password-area">
                            <input style="width: 250px" class="form-control" id="password" type="password"
                                placeholder="Password" name="password" value="<?php echo e(old('password')); ?>">
                            <div class="password-eye top-50 end-10 translate-middle-y">
                                <i id="password-toggle" style="cursor: pointer" class="fas fa-eye"></i>
                            </div>
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color: #ff0000"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button type="submit" id="submit" class="w-100 btn btn-primary mt-3 mb-2">Login</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        const passwordToggle = document.getElementById("password-toggle");
        const passwordInput = document.getElementById("password");
        passwordToggle.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.classList.remove("fa-eye");
                passwordToggle.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                passwordToggle.classList.remove("fa-eye-slash");
                passwordToggle.classList.add("fa-eye");
            }
        });
        const box = document.getElementById("box");
        const myButton = document.getElementById("submit");
        myButton.addEventListener("click", function() {
            box.classList.add("active");
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/auth/login.blade.php ENDPATH**/ ?>