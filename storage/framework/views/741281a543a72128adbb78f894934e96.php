<div class="col-md-6">
    <div class="box p-3" style="min-height: 1500px">
        <div class="alert alert-success text-center fw-bold text-uppercase">First Innings</div>
        <div class="box p-3 my-3">
            <div class=" d-flex justify-content-between align-items-end">
                <div style="font-size:14px">
                    <h6 style="font-size:14px" class="fw-bold text-uppercase">
                        <span class="text-primary"><?php echo e(substr($firstBattingTeamName, 0, 3)); ?></span>
                        <?php echo e($innings1BattingScore['totalRuns']); ?>/<?php echo e($innings1BattingScore['totalWickets']); ?>

                    </h6>
                    <h6 style="font-size:14px" class="fw-bold"><span class="text-primary">Over
                        </span><?php echo e($innings1BattingScore['totalOvers']); ?>

                        (<?php echo e($match->over); ?>)
                    </h6>
                </div>
                <div>
                    <h6 style="font-size:14px" class="fw-bold">
                        <span class="text-primary">RR</span> <?php echo e($innings1BattingScore['runRate']); ?>

                    </h6>
                    <h6 style="font-size:14px" class="fw-bold"><span class="text-primary">Extra
                        </span><?php echo e($innings1BattingScore['totalExtraRuns']); ?>

                    </h6>
                </div>
                <div>
                    <h6 style="font-size:14px" class="fw-bold "><span class="text-primary">Total
                            4S</span>
                        <?php echo e($innings1BattingScore['totalFours']); ?></h6>
                    <h6 style="font-size:14px" class="fw-bold "><span class="text-primary">Total 6S
                        </span><?php echo e($innings1BattingScore['totalSixes']); ?></h6>
                </div>
            </div>
            <div class="hr-style"></div>
            <div class="row">
                <div class="col-md-6">
                    <h6 style="font-size:14px" class="fw-bold"> Highest Run <span
                            class="text-primary"><?php echo e($firstHighestRunScorer['batsmanName']); ?></span></h6>
                    <h6 style="font-size:14px" class="fw-bold">(R <?php echo e($firstHighestRunScorer['runs']); ?>, B
                        <?php echo e($firstHighestRunScorer['balls']); ?>,
                        SR <?php echo e($firstHighestRunScorer['strike_rate']); ?> )</h6>
                    <h6 style="font-size:14px" class="fw-bold">(4S <?php echo e($firstHighestRunScorer['fours']); ?>,
                        6S
                        <?php echo e($firstHighestRunScorer['sixes']); ?>) </h6>
                </div>
                <div class="col-md-6">
                    <h6 style="font-size:14px" class="fw-bold">Most ECO Bowler
                        <span class="text-primary"><?php echo e($firstMostEconomicalBowler['bowlerName']); ?></span>
                    </h6>
                    <h6 style="font-size:14px" class="fw-bold">(R
                        <?php echo e($firstMostEconomicalBowler['runs']); ?>, O
                        <?php echo e($firstMostEconomicalBowler['totalOvers']); ?>, ECO
                        <?php echo e($firstMostEconomicalBowler['economyRate']); ?>)</h6>
                    <h6 style="font-size:14px" class="fw-bold">(EXT
                        <?php echo e($firstMostEconomicalBowler['totalExtra']); ?>, NB
                        <?php echo e($firstMostEconomicalBowler['totalNoCount']); ?>, WD
                        <?php echo e($firstMostEconomicalBowler['totalWideCount']); ?>)</h6>
                </div>
            </div>
        </div>
        <h6 class="btn btn-primary w-100 fw-bold text-uppercase">Batting summary</h6>
        <table class="table table-striped">
            <thead class="bg-success text-white">
            <tr>
                <th>#</th>
                <th>BATSMAN</th>
                <th class="text-center">RUN</th>
                <th class="text-center">BALL</th>
                <th class="text-center">4s</th>
                <th class="text-center">6s</th>
                <th class="text-center">SR</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $firstTeamIndividualScore; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->index + 1); ?></td>
                    <td>
                        <?php echo e($score['batsmanName']); ?>

                        <?php if($score['outByBowlerName']): ?>
                            <span style="font-size:12px">
                                    <span style="color:red">(out</span>
                                    <span class="text-dark"> - <?php echo e($score['outByBowlerName']); ?>)</span>
                                </span>
                        <?php else: ?>
                            <span style="color:blue;font-size:12px">(not out)</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center"><?php echo e($score['runs']); ?></td>
                    <td class="text-center"> <?php echo e($score['balls']); ?></td>
                    <td class="text-center"><?php echo e($score['fours']); ?></td>
                    <td class="text-center"><?php echo e($score['sixes']); ?></td>
                    <td class="text-center"><?php echo e($score['strike_rate']); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <h6 class="btn btn-primary w-100 fw-bold text-uppercase mt-3">Bowling summary</h6>
        <table class="table table-striped">
            <thead class="bg-success text-white">
            <tr>
                <th>#</th>
                <th>BOWLER</th>
                <th class="text-center">RUN</th>
                <th class="text-center">OVER</th>
                <th class="text-center">WICKET</th>
                <th class="text-center">4s</th>
                <th class="text-center">6s</th>
                <th class="text-center">NB</th>
                <th class="text-center">WIDE</th>
                <th class="text-center">EXTRA</th>
                <th class="text-center">ECO</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $firstBowlingIndividualScore; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->index + 1); ?></td>
                    <td><?php echo e($score['bowlerName']); ?></td>
                    <td class="text-center"><?php echo e($score['runs']); ?></td>
                    <td class="text-center"><?php echo e($score['totalOvers']); ?></td>
                    <td class="text-center"><?php echo e($score['wickets']); ?></td>
                    <td class="text-center"><?php echo e($score['fours']); ?></td>
                    <td class="text-center"><?php echo e($score['sixes']); ?></td>
                    <td class="text-center"><?php echo e($score['totalNoCount']); ?></td>
                    <td class="text-center"><?php echo e($score['totalWideCount']); ?></td>
                    <td class="text-center"><?php echo e($score['totalExtra']); ?></td>
                    <td class="text-center"><?php echo e($score['economyRate']); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="score-line my-3">
            <h6 class="fw-bold text-uppercase text-primary mb-3">Score Line</h6>
            <div class="d-flex flex-wrap">
                <?php
                    $ballCount = 0;
                    $overCount = 0;
                ?>
                <span style="font-size: 10px" class="w-100 text-uppercase my-1 fw-bold text-dark">over
                    <?php echo e($overCount + 1); ?></span>
                <?php $__currentLoopData = $firstTeamScoreLine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(strpos($score->score_line, 'NB') === 0): ?>
                    <?php elseif(strpos($score->score_line, 'WD') === 0): ?>
                    <?php else: ?>
                        <?php
                            $ballCount++;
                        ?>
                    <?php endif; ?>
                    <span class="text-dark fw-bold my-1 score-box ">
                        <small
                            style="font-size: 10px; color:<?php echo e($score->score_line == 'W' || strpos($score->score_line, 'NB') === 0 || strpos($score->score_line, 'WD') === 0 || strpos($score->score_line, 'LB') === 0 || strpos($score->score_line, 'B') === 0 ? 'red' : 'black'); ?>">
                            <?php echo e($score->score_line); ?>

                        </small>
                    </span>
                    <?php if($ballCount == 6): ?>
                        <?php
                            $overCount++;
                            $ballCount = 0;
                        ?>
                        <div class="w-100 my-1 fw-bold text-uppercase  ">
                            <span class="text-dark" style="font-size: 10px">Over
                                <?php echo e($overCount + 1); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\Downloads\cricket-scorecard\resources\views/components/summary/firstInnings.blade.php ENDPATH**/ ?>