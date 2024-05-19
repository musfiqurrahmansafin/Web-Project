<?php $__env->startSection('title', 'live match'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .box {
            width: 60%;
            min-height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-content {
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 3px 8px;
            transition: 0.3s;
        }

        .box-content:hover {
            box-shadow: rgba(0, 0, 0, 0.7) 0px 3px 8px;
        }

        span {
            font-size: 12px;
            font-weight: bold;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container box">
        <div class="box-content p-5">
            <div class="message">
                <?php if(session('danger')): ?>
                    <div class="alert alert-danger fw-bold my-2"> <?php echo e(session('danger')); ?></div>
                <?php endif; ?>
            </div>
            <div>
                <form class="row" action="<?php echo e(route('post.live.match.squad', ['id' => $match->id])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="squad col-md-7">
                        <div class="row">
                            
                            <div class="col-md-6 squad-list">
                                <small class="fw-bold mb-3 btn btn-success w-100"><?php echo e($match->teamA->name); ?> playing
                                    XI</small>
                                <?php if($match->teamA->teamPlayers && count($match->teamA->teamPlayers) > 0): ?>
                                    <?php $__currentLoopData = $match->teamA->teamPlayers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex">
                                            <span class="me-2"><?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                                            <div class="form-check">
                                                <input class="form-check-input batting" type="checkbox" name="player_id[]"
                                                    value="<?php echo e($player->id); ?>" onclick="checkOtherFields(this)"
                                                    <?php if(old('player_id') && in_array($player->id, old('player_id'))): ?> checked <?php endif; ?>>
                                                <?php echo e($player->name); ?>

                                                <?php if(old('player_id') && in_array($player->id, old('player_id'))): ?>
                                                    <input type="checkbox" hidden checked name="teamA[]"
                                                        value="<?php echo e($player->id); ?>">
                                                    <input type="checkbox" hidden checked name="player_name[]" hidden
                                                        value="<?php echo e($player->name); ?>">
                                                    <input type="checkbox" checked name="team_id[]" hidden
                                                        value="<?php echo e($player->team_id); ?>">
                                                    <input type="checkbox" checked name="team_name[]" hidden
                                                        value="<?php echo e($match->teamA->name); ?>">
                                                <?php else: ?>
                                                    <input type="checkbox" hidden name="teamA[]"
                                                        value="<?php echo e($player->id); ?>">
                                                    <input type="checkbox" hidden name="player_name[]"
                                                        value="<?php echo e($player->name); ?>">
                                                    <input type="checkbox" hidden name="team_id[]"
                                                        value="<?php echo e($player->team_id); ?>">
                                                    <input type="checkbox" hidden name="team_name[]"
                                                        value="<?php echo e($match->teamA->name); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="message">
                                        <?php $__errorArgs = ['teamA'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="pb-1 px-3 mt-3"
                                                style="color: white; background: red; border-radius: 5px">
                                                <span><?php echo e($message); ?> for <?php echo e($match->teamA->name); ?></span>
                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            
                            <div class="col-md-6 squad-list">
                                <h6 class="fw-bold mb-3 btn btn-success w-100"><?php echo e($match->teamB->name); ?> playing XI</h6>
                                <?php if($match->teamB->teamPlayers && count($match->teamB->teamPlayers) > 0): ?>
                                    <?php $__currentLoopData = $match->teamB->teamPlayers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="d-flex">
                                            <span class="me-2"><?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></span>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="player_id[]"
                                                    value="<?php echo e($player->id); ?>" onclick="checkOtherFields(this)"
                                                    <?php if(old('player_id') && in_array($player->id, old('player_id'))): ?> checked <?php endif; ?>>
                                                <?php echo e($player->name); ?>

                                                <?php if(old('player_id') && in_array($player->id, old('player_id'))): ?>
                                                    <input type="checkbox" checked name="teamB[]" hidden
                                                        value="<?php echo e($player->team_id); ?>">
                                                    <input type="checkbox" checked name="player_name[]" hidden
                                                        value="<?php echo e($player->name); ?>">
                                                    <input type="checkbox" checked name="team_id[]" hidden
                                                        value="<?php echo e($player->team_id); ?>">
                                                    <input type="checkbox" checked name="team_name[]" hidden
                                                        value="<?php echo e($match->teamB->name); ?>">
                                                <?php else: ?>
                                                    <input type="checkbox" hidden name="teamB[]"
                                                        value="<?php echo e($player->team_id); ?>">
                                                    <input type="checkbox" hidden name="player_name[]"
                                                        value="<?php echo e($player->name); ?>">
                                                    <input type="checkbox" hidden name="team_id[]"
                                                        value="<?php echo e($player->team_id); ?>">
                                                    <input type="checkbox" hidden name="team_name[]"
                                                        value="<?php echo e($match->teamB->name); ?>">
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="message">
                                        <?php $__errorArgs = ['teamB'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="pb-1 px-3 mt-3"
                                                style="color: white; background: red; border-radius: 5px">
                                                <span><?php echo e($message); ?> for <?php echo e($match->teamB->name); ?></span>
                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="team col-md-5 d-flex flex-column justify-content-between">
                        <input type="number" name="match_id" hidden value=<?php echo e($match->id); ?>>
                        <div>
                            <div class="btn btn-success fw-bold text-center w-100">First Innings</div>
                            <div class="d-flex justify-content-between py-3">
                                <div>
                                    <h6 class="fw-bold">Select Batting Team</h6>
                                    <div>
                                        <input class="form-check-input" type="radio" name="firstBattingTeamId"
                                            value="<?php echo e($match->teamA->id); ?>"
                                            <?php if(old('firstBattingTeamId') == $match->teamA->id): ?> checked <?php endif; ?>>
                                        <?php echo e($match->teamA->name); ?>

                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="firstBattingTeamId"
                                            value="<?php echo e($match->teamB->id); ?>"
                                            <?php if(old('firstBattingTeamId') == $match->teamB->id): ?> checked <?php endif; ?>>
                                        <?php echo e($match->teamB->name); ?>

                                    </div>
                                    <div class="message">
                                        <?php $__errorArgs = ['firstBattingTeamId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="pb-1 px-3 mt-3"
                                                style="color: white; background: red; border-radius: 5px">
                                                <span><?php echo e($message); ?></span>
                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div>
                                    <h6 class="fw-bold">Select Bowling Team</h6>
                                    <div>
                                        <input class="form-check-input" type="radio" name="firstBowlingTeamId"
                                            value="<?php echo e($match->teamA->id); ?>"
                                            <?php if(old('firstBowlingTeamId') == $match->teamA->id): ?> checked <?php endif; ?>>
                                        <?php echo e($match->teamA->name); ?>

                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="firstBowlingTeamId"
                                            value="<?php echo e($match->teamB->id); ?>"
                                            <?php if(old('firstBowlingTeamId') == $match->teamB->id): ?> checked <?php endif; ?>>
                                        <?php echo e($match->teamB->name); ?>

                                    </div>
                                    <div class="message">
                                        <?php $__errorArgs = ['firstBowlingTeamId'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="pb-1 px-3 mt-3"
                                                style="color: white; background: red; border-radius: 5px">
                                                <span><?php echo e($message); ?></span>
                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h1 class="fw-bold" style="color: red; font-size: 12px">(Batting and Bowling teams will be
                                automatically reversed for the second innings)</h1>
                            <input type="submit" class="btn btn-primary w-100 fw-bold mt-2" value="submit">
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
        // for check hidden checkbok (squad)
        function checkOtherFields(checkbox) {
            const formCheck = checkbox.parentNode;
            const otherCheckboxes = formCheck.querySelectorAll('input[type="checkbox"]:not([name="player_id[]"])');
            otherCheckboxes.forEach((cb) => {
                if (checkbox.checked) {
                    cb.disabled = false;
                    cb.checked = true;
                } else {
                    cb.disabled = true;
                    cb.checked = false;
                }
            });
        }


       
        
        // for innings (prevent to select same team for batting and bowling)
        $(document).ready(function() {
            const $battingTeams = $('input[name="firstBattingTeamId"]');
            const $bowlingTeams = $('input[name="firstBowlingTeamId"]');
            $battingTeams.change(function() {
                const battingTeam = $('input[name="firstBattingTeamId"]:checked').val();
                const bowlingTeam = $('input[name="firstBowlingTeamId"]:checked').val();
                if (battingTeam === bowlingTeam) {
                    swal({
                        title: "warning",
                        text: "You can't select the same team for batting and bowling!",
                        icon: "warning",
                        button: "Ok",
                    });
                    $(this).prop('checked', false);
                    return false;
                }
            });
            $bowlingTeams.change(function() {
                const battingTeam = $('input[name="firstBattingTeamId"]:checked').val();
                const bowlingTeam = $('input[name="firstBowlingTeamId"]:checked').val();

                if (battingTeam === bowlingTeam) {
                    swal({
                        title: "warning",
                        text: "You can't select the same team for batting and bowling!",
                        icon: "warning",
                        button: "Ok",
                    });
                    $(this).prop('checked', false);
                    return false;
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/matches/live/liveMatchSquadForm.blade.php ENDPATH**/ ?>