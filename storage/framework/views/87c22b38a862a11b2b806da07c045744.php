<div class="col-md-7">
    <div class="box p-3">
        <div class="alert alert-success pb-1 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-center text-uppercase">2nd innings squad</h5>
            <a class="btn btn-outline-danger btn-sm fw-bold mb-2 text-uppercase"
                href="<?php echo e(route('update.live.match.innings', ['matchId' => $match->id])); ?>">
                <i class="fas fa-external-link-alt me-1"></i>end match
            </a>
        </div>
        <div id="secondInnings">
            <div class="row">
                <div class="col-md-6">
                    <?php if($secondBattingSquad && count($secondBattingSquad) > 0): ?>
                        <h6 class="fw-bold btn btn-primary w-100 btn-sm">
                            <?php echo e($secondBattingSquad[0]['team_name']); ?> Batting XI
                        </h6>
                        <?php $__currentLoopData = $secondBattingSquad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex">
                                <small
                                    class="me-2 fw-bold"><?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></small>
                                <div class="form-check">
                                    <input class="form-check-input batsman-checkbox" type="checkbox"
                                        name="batsman_id[]" value="<?php echo e($player['player_id']); ?>"
                                        <?php if(in_array($player['player_id'], old('batsman_id', [])) || in_array($player['player_id'], $outBatsmanList)): ?> disabled <?php endif; ?>
                                        onclick="handleCheckboxClick(this, 'batsman', <?php echo e(json_encode($outBatsmanList)); ?>)">
                                    <input type="checkbox" value="<?php echo e($player['team_id']); ?>" hidden
                                        name="battingTeamId[]">
                                    <small><?php echo e($player['player_name']); ?>

                                        <span style="color: red; font-size:14px; font-weight:bold">
                                            <?php if(in_array($player['player_id'], $outBatsmanList)): ?>
                                                (out)
                                            <?php endif; ?>
                                        </span>
                                    </small>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <small class="squad">2nd innings - no batsman found!</small>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <?php if($secondBowlingSquad && count($secondBowlingSquad) > 0): ?>
                        <h6 class="fw-bold btn btn-primary w-100 btn-sm">
                            <?php echo e($secondBowlingSquad[0]['team_name']); ?> Bowling
                            XI
                        </h6>
                        <?php $__currentLoopData = $secondBowlingSquad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex">
                                <small
                                    class="me-2 fw-bold"><?php echo e(str_pad($index + 1, 2, '0', STR_PAD_LEFT)); ?></small>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="bowler_id[]"
                                        value="<?php echo e($player['player_id']); ?>"
                                        <?php if(in_array($player['player_id'], old('bowler_id', []))): ?> checked <?php endif; ?>
                                        onclick="handleCheckboxClick(this, 'bowler')">
                                    <input type="checkbox" value="<?php echo e($player['team_id']); ?>" hidden
                                        name="bowlingTeamId[]">
                                    <small><?php echo e($player['player_name']); ?></small>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <small class="squad">2nd innings - no bowler found!</small>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\Downloads\cricket-scorecard\resources\views/components/squad/secondinnings.blade.php ENDPATH**/ ?>