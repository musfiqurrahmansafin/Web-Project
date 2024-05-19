<?php $__env->startSection('title', 'add player'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .player-form .form {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .player-form .form:hover {
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
        <div class="player-form d-flex justify-content-center align-items-center" style="min-height: 90vh">
            <div class="form px-4 py-4">
                <div class="mb-3 d-flex justify-content-between align-items-center alert alert-primary">
                    <h6 class="fw-bold text-primary text-uppercase">Add new player</h6>
                    <a href="<?php echo e(route('players')); ?>" class="fw-bold text-danger">
                        <i class="fas fa-angle-double-left" style="font-size: 24px"></i>
                    </a>
                </div>
                <div id="message">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success fw-bold my-2"> <?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                </div>
                <form method="post" action="<?php echo e(route('add-player')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="d-flex justify-content-around">
                        <div class="px-2">
                            <div class="mb-1">
                                <label for="name" class="fw-bold my-1">Player name</label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="name"
                                    class="form-control" style="width: 300px">
                                <?php $__errorArgs = ['name'];
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

                            <div class="mb-1">
                                <label for="team_id" class="fw-bold my-1">Team</label>
                                <select name="team_id" class="form-select">
                                    <option value="" disabled selected>select a team</option>
                                    <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($team->id); ?>"
                                            <?php if($team->id == old('team_id')): ?> selected <?php endif; ?>>
                                            <?php echo e($team->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['team_id'];
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

                            <div class="mb-1">
                                <label for="role" class="fw-bold my-1">Player role</label>
                                <select name="role" class="form-select">
                                    <option value="" disabled selected>select a role</option>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($role); ?>"
                                            <?php if($role == old('role')): ?> selected <?php endif; ?>>
                                            <?php echo e($role); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['role'];
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

                            <div class="mb-1">
                                <label for="batting_style" class="fw-bold my-1">Batting style</label>
                                <select name="batting_style" class="form-select">
                                    <option value="" disabled selected>select batting style</option>
                                    <?php $__currentLoopData = $battingStyle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($bat); ?>"
                                            <?php if($bat == old('batting_style')): ?> selected <?php endif; ?>>
                                            <?php echo e($bat); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['batting_style'];
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

                            <div class="mb-1">
                                <label for="bowling_style" class="fw-bold my-1">BowlingS style</label>
                                <select name="bowling_style" class="form-select">
                                    <option value="" disabled selected>select bowling style</option>
                                    <?php $__currentLoopData = $bowlingStyle; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ball): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ball); ?>"
                                            <?php if($ball == old('bowling_style')): ?> selected <?php endif; ?>>
                                            <?php echo e($ball); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['bowling_style'];
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
                           
                            <div class="mb-1">
                                <label for="born" class="fw-bold my-1">Birth date</label>
                                <input type="date" name="born" value="<?php echo e(old('born')); ?>" placeholder="born"
                                    class="form-control" style="width: 300px">
                                <?php $__errorArgs = ['born'];
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

                            <div class="mb-1">
                                <label for="image" class="fw-bold my-1">Profile image</label>
                                <input type="file" name="image" placeholder="image" class="form-control"
                                    style="width: 300px">
                                <?php $__errorArgs = ['image'];
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

                            <div class="mb-1">
                                <label for="biography" class="fw-bold my-1">Biography</label>
                                <textarea name="biography" style="width: 300px" placeholder="write biography" rows="7" cols="50" type="text"
                                class="form-control"><?php echo e(old('biography')); ?></textarea>
                                <?php $__errorArgs = ['biography'];
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
                    </div>
                    <input type="submit" class="btn btn-primary w-100 fw-bold mt-3" value="submit">
                </form>
            </div>
        </div>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                let message = document.getElementById('message');
                message.parentNode.removeChild(message);
            }, 3000);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/players/addPlayer.blade.php ENDPATH**/ ?>