<?php $__env->startSection('title', 'all live match'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .live {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            column-gap: 25px;
        }
        .live-card {
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 2px 5px;
            margin: 0px 0 25px 0;
            border-radius: 5px;
            transition: 0.3s;
            text-decoration: none;
        }
        .live-card:hover {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 10px;
        }
        .dot {
            height: 20px;
            width: 20px;
            background: green;
            border-radius: 100%;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="message">
            <?php if(session('success')): ?>
                <div class="alert alert-success fw-bold"> <?php echo e(session('success')); ?></div>
            <?php elseif(session('danger')): ?>
                <div class="alert alert-danger fw-bold"> <?php echo e(session('danger')); ?></div>
            <?php endif; ?>
        </div>
        <h3 class="py-5 fw-bold text-primary text-uppercase">Live match <?php echo e(count($liveMatches)); ?></h3>
        <div class="live">
            <?php $__currentLoopData = $liveMatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="live-card" href="<?php echo e(route('get.live.match.squad', ['id' => $match->id])); ?>">
                    <div class="d-flex justify-content-between">
                        <h6 class="fw-bold"><?php echo e($match->teamA->name); ?> vs <?php echo e($match->teamB->name); ?></h6>
                        <small class="fw-bold text-success ms-3"><?php echo e($match->format); ?></small>
                        <div class="dot me-1"></div>
                    </div>
                    <span class="text-dark"><?php echo e($match->venue); ?> national cricket stadium</span>
                    <div class="d-flex justify-content-between text-dark">
                        <span class="fw-bold">Local time</span>
                        <span><?php echo e(date('g:i A', strtotime($match->time))); ?> (+06 GTM)</span>
                        <i style="font-size: 20px" class="me-1 fas fa-cog"></i>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/matches/live/liveMatchList.blade.php ENDPATH**/ ?>