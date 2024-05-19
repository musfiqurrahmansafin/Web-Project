<?php $__env->startSection('title', 'live matches'); ?>
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
            animation: pulse 1.5s ease-in-out infinite;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5">
        <div class="message">
            <?php if(session('danger')): ?>
                <div class="alert alert-danger fw-bold my-2"> <?php echo e(session('danger')); ?></div>
            <?php elseif(session('success')): ?>
                <div class="alert alert-success fw-bold my-2"> <?php echo e(session('success')); ?></div>
            <?php endif; ?>
        </div>
        <div class="live py-5">
            <?php if(count($liveMatches) > 0): ?>
                <?php $__currentLoopData = $liveMatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $match): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="live-card">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold text-primary"><?php echo e($match->teamA->name); ?> vs <?php echo e($match->teamB->name); ?></h6>
                            <small class="fw-bold text-success ms-3"><?php echo e($match->format); ?></small>
                            <div class="dot me-1"></div>
                        </div>

                        <span class="text-dark"><?php echo e($match->venue); ?> national cricket stadium</span>
                        <div class="d-flex justify-content-between text-dark">
                            <span class="fw-bold">Local time</span>
                            <span><?php echo e(date('g:i A', strtotime($match->time))); ?> (+06 GTM)</span>
                        </div>

                        <div class="mt-2 d-flex justify-content-between align-items-baseline">
                            <?php switch($match->status):
                                case ('ongoing'): ?>
                                    <h6 class="fw-bold text-dark">status <span style="color:green"><?php echo e($match->status); ?></span></h6>
                                <?php break; ?>

                                <?php case ('upcoming'): ?>
                                    <h6 class="fw-bold text-dark">status <span style="color:blue"><?php echo e($match->status); ?></span></h6>
                                <?php break; ?>

                                <?php default: ?>
                                    <h6 class="fw-bold text-dark">status <span style="color:red"><?php echo e($match->status); ?></span></h6>
                            <?php endswitch; ?>
                            <?php if($match->status != 'upcoming'): ?>
                                <a class="btn btn-outline-success btn-sm"
                                    href="<?php echo e(route('live', ['id' => $match->id])); ?>">score card</a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div>
                    <h4 class="text-primary fw-bold">No live match available!</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/home/matchList.blade.php ENDPATH**/ ?>