<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .dashboard {
            min-width: 100%;
            min-height: 50vh;
            align-items: center;
            display: grid;
            column-gap: 25px;
            grid-template-columns: auto auto auto auto;

        }

        .dashboard a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 300px;
            height: 120px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 2px 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            border-radius: 5px;
        }

        .dashboard a:hover {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 10px;
        }

        span {
            text-transform: uppercase;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <div class="container">
        
        <div class="message pt-5">
            <?php if(session('success')): ?>
                <div class="alert alert-success fw-bold"> <?php echo e(session('success')); ?></div>
            <?php elseif(session('danger')): ?>
                <div class="alert alert-danger fw-bold"> <?php echo e(session('danger')); ?></div>
            <?php endif; ?>
        </div>
        <div>
            <h3 class="py-5 fw-bold text-primary">Dashboard</h3>
            <div class="dashboard">
                <a class="h5" href="<?php echo e(route('teams')); ?>">
                    <i class="me-1 fas fa-cog"></i>
                    <span>teams</span>
                </a>
                <a class="h5" href="<?php echo e(route('players')); ?>">
                    <i class="me-1 fas fa-cog"></i>
                    <span>players</span>
                </a>
                <a class="h5" href="<?php echo e(route('matches')); ?>">
                    <i class="me-1 fas fa-cog"></i>
                    <span>matches</span>
                </a>
                <a class="h5" href="<?php echo e(route('get.live.matches')); ?>">
                    <i class="me-1 fas fa-cog"></i>
                    <span>live matches</span>
                </a>
                <a class="h5" href="<?php echo e(route('venues')); ?>">
                    <i class="me-1 fas fa-cog"></i>
                    <span>venus</span>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/dashboard/dashboard.blade.php ENDPATH**/ ?>