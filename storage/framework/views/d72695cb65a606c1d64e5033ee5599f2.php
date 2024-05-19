<?php $__env->startSection('title', 'add match'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .match-form .form {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .match-form .form:hover {
            box-shadow: rgba(0, 0, 0, 0.7) 0px 5px 15px;
        }

        span {
            font-size: 12px;
            color: red;
            font-weight: bold;
        }

        a {
            text-decoration: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <div class="match-form d-flex justify-content-center align-items-center" style="min-height: 90vh">
            <div class="form p-4">
                <div class="mb-3 d-flex justify-content-between align-items-center alert alert-primary">
                    <h6 class="fw-bold text-primary text-uppercase">Add new match</h6>
                    <a href="<?php echo e(route('matches')); ?>" class="fw-bold text-danger">
                        <i class="fas fa-angle-double-left" style="font-size: 24px"></i>
                    </a>
                </div>
                <div id="message">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success fw-bold my-2"> <?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                </div>
                <form method="post" action="<?php echo e(route('add-match')); ?>">
                    <?php echo csrf_field(); ?>



                    <div class="d-flex justify-content-between">
                        <div class="px-2">
                            <div class="mb-3">
                                <label for="team_a" class="fw-bold my-1">Team A</label>
                                <select style="width: 300px" id="team-a" name="team_a_id" class="form-select">
                                    <option value="" disabled selected>Select team A</option>
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($team->id); ?>"
                                            <?php if($team->id == old('team_a_id')): ?> selected <?php endif; ?>>
                                            <?php echo e($team->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['team_a_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="team_b" class="fw-bold my-1">Team B</label>
                                <select id="team-b" name="team_b_id" class="form-select">
                                    <option value="" disabled selected>Select team B</option>
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($team->id); ?>"
                                            <?php if($team->id == old('team_b_id')): ?> selected <?php endif; ?>>
                                            <?php echo e($team->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['team_b_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-3">
                                <label for="venue" class="fw-bold my-1">Match Veune</label>
                                <select name="venue" class="form-select">
                                    <option value="" disabled selected>Select venue</option>
                                    <?php $__currentLoopData = $venues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $venue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($venue->name); ?>"
                                            <?php if($venue->name == old('venue')): ?> selected <?php endif; ?>>
                                            <?php echo e($venue->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['venue'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="px-2">
                            <div class="mb-3">
                                <label for="format" class="fw-bold my-1">Match Format</label>
                                <select name="format" class="form-select">
                                    <option value="" disabled selected>Select format</option>
                                    <?php $__currentLoopData = $formats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $format): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($format); ?>"
                                            <?php if($format == old('format')): ?> selected <?php endif; ?>>
                                            <?php echo e($format); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['format'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="mb-4">
                                <label for="time" class="fw-bold my-1">Match Time</label>
                                <input style="width: 300px" type="datetime-local" class="form-control" name="time"
                                    value="<?php echo e(old('time', isset($time) ? \Carbon\Carbon::parse($time)->format('Y-m-d\TH:i') : '')); ?>"
                                    placeholder="time">
                                <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <input type="submit" class="btn btn-primary w-100 fw-bold mt-4" value="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        const teamA = document.querySelector('#team-a');
        const teamB = document.querySelector('#team-b');
        teamA.addEventListener('change', () => {
            const selectedTeam = teamA.value;
            if (selectedTeam) {
                const option = teamB.querySelector(`option[value="${selectedTeam}"]`);
                if (option) {
                    option.style.display = 'none';
                }
            }
        });
        teamB.addEventListener('change', () => {
            const selectedTeam = teamB.value;
            if (selectedTeam) {
                const option = teamA.querySelector(`option[value="${selectedTeam}"]`);
                if (option) {
                    option.style.display = 'none';
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/matches/addMatch.blade.php ENDPATH**/ ?>