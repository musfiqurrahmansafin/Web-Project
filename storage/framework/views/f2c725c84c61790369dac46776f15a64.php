<?php $__env->startSection('title', 'score card dashboard'); ?>
<?php $__env->startSection('style'); ?>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-DXfcGqN3qylE6/Ikic1wzHxBvKx6pR/6LOaDyAGoUbHvAJEMqGksQPe6UZwONAYf" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/CGpa8F98W47Qc7lhNn1/VdVryGnwSSZbi2eZnMIBaHyfLg8fKThj9n1z4pQiJKR" crossorigin="anonymous">
    </script>

    <style>
        .score-card {
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 2px 5px;
            width: 250px;
        }

        .extra,
        .score,
        .wkt,
        .run {
            font-size: 12px;
            font-weight: bold;
            border-radius: 100%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 1px 2px;
            height: 24px;
            width: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            transition: 0.3s;
            border: 0;
        }

        .score-box {
            border-radius: 100%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 1px 2px;
            height: 24px;
            width: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            transition: 0.3s;
            border: 0;
        }

        .extra:hover,
        .run:hover,
        .score:hover,
        .wkt:hover,
        .score-box:hover {
            cursor: pointer;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 8px;
        }

        span {
            font-weight: bold;
            color: red;
        }

        .squad {
            font-size: 12px;
            font-weight: bold;
            color: red;
            display: flex;
        }

        .run-box {
            box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 3px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .run-box:hover {
            box-shadow: rgba(0, 0, 0, 0.7) 0px 1px 3px;
        }

        .box {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 3px 8px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .box:hover {
            box-shadow: rgba(0, 0, 0, 0.7) 0px 3px 8px;
        }

        #firstInnings,
        #secondInnings {
            font-size: 16px;
            font-weight: bold;
        }

        table {
            font-size: 14px;
            font-weight: bold;
        }

        .hr-style {
            background-color: #fff;
            border-top: 3px dashed #8c8b8b;
            margin: 20px 0;
        }

        .batsman-checkbox[disabled] {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container py-5">
        <div class="message">
            <?php if(session('success')): ?>
                <div class="alert alert-success w-100 fw-bold text-center"><?php echo e(session('success')); ?></div>
            <?php elseif(session('danger')): ?>
                <div class="alert alert-danger w-100 fw-bold text-center"><?php echo e(session('danger')); ?></div>
            <?php endif; ?>
        </div>
        <form action="<?php echo e(route('post.live.match.score', ['id' => $match->id])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="number" hidden name="matchId" value="<?php echo e($match->id); ?>">
            <div class="row mb-5">
                <?php if($inningsStatus['inningsOne'] == 1): ?>
                    <?php echo $__env->make('components.squad.firstInnings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif($inningsStatus['inningsTwo'] == 1): ?>
                   <?php echo $__env->make('components.squad.secondinnings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php else: ?>
                    <div class="col-md-12">
                        <div class="btn btn-danger w-100 fw-bold py-2">match end!</div>
                        <?php if($innings1BattingScore['totalRuns'] > $innings2BattingScore['totalRuns']): ?>
                            <div class="alert alert-success mt-3 text-center fw-bold">
                                <?php echo e($firstBattingSquad[0]['team_name']); ?> won by
                                <?php echo e($innings1BattingScore['totalRuns'] - $innings2BattingScore['totalRuns']); ?> runs
                            </div>
                        <?php elseif($firstTeamTotalRuns < $secondTeamTotalRuns): ?>
                            <div class="alert alert-success mt-3 text-center fw-bold">
                                <?php echo e($secondBattingSquad[0]['team_name']); ?> won by <?php echo e(10 - $innings2BattingScore['totalWickets']); ?> wickets
                            </div>
                        <?php else: ?>
                            <div class="alert alert-success mt-3 text-center fw-bold">
                                match draw!
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <?php if($inningsStatus['inningsOne'] == 1 || $inningsStatus['inningsTwo'] == 1): ?>
                    <?php echo $__env->make('components.score.scoreBoard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
            <div class="row">
                <?php echo $__env->make('components.summary.firstInnings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('components.summary.secondInnings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                
            </div>
        </form>
    </div>
    </form>
    </div>
    <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('#toggle-btn').click(function() {
                $('#firstInnings').toggle();
                $('#secondInnings').toggle(!$('#firstInnings').is(':visible'));
                let inningsTitle = $('#innings-title').text() === "2nd innings squad" ?
                    "1st innings squad" : "2nd innings squad";
                $('#innings-title').text(inningsTitle);
                $(this).text(buttonText);
            });
        });
    </script>

    <script>
        function checkOtherFields(checkbox) {
            const formCheck = checkbox.parentNode;
            const otherCheckboxes = formCheck.querySelectorAll(
                'input[type="checkbox"]:not([name="bastman_id[]"]):not([name="bowler_id[]"])');
            otherCheckboxes.forEach((cb) => {
                if (checkbox.checked) {
                    // cb.disabled = false;
                    cb.checked = true;
                } else {
                    // cb.disabled = true;
                    cb.checked = false;
                }
            });
        }
        // remain check when add new score
        function saveSelection(checkbox, type) {
            var key = type + '_' + checkbox.value;
            if (checkbox.checked) {
                localStorage.setItem(key, 'true');

                let battingTeamId = checkbox.parentNode.querySelector('input[name="battingTeamId[]"]').value;
                localStorage.setItem(key + '_battingTeamId', battingTeamId);

                let bowlingTeamId = checkbox.parentNode.querySelector('input[name="bowlingTeamId[]"]').value;
                localStorage.setItem(key + '_bowlingTeamId', bowlingTeamId);
            } else {
                localStorage.removeItem(key);
                localStorage.removeItem(key + '_battingTeamId');
                localStorage.removeItem(key + '_bowlingTeamId');
            }
        }
        window.addEventListener('load', function() {
            let checkboxes = document.getElementsByName('batsman_id[]');
            for (let i = 0; i < checkboxes.length; i++) {
                let key = 'batsman_' + checkboxes[i].value;
                if (localStorage.getItem(key)) {
                    checkboxes[i].checked = true;
                    let battingTeamId = localStorage.getItem(key + '_battingTeamId');
                    let battingTeamIdCheckbox = checkboxes[i].parentNode.querySelector(
                        'input[name="battingTeamId[]"]');
                    battingTeamIdCheckbox.checked = true;
                    localStorage.setItem('battingTeamId_' + battingTeamId, 'true');
                }
            }
            checkboxes = document.getElementsByName('bowler_id[]');
            for (let i = 0; i < checkboxes.length; i++) {
                let key = 'bowler_' + checkboxes[i].value;
                if (localStorage.getItem(key)) {
                    checkboxes[i].checked = true;
                    let bowlingTeamId = localStorage.getItem(key + '_bowlingTeamId');
                    let bowlingTeamIdCheckbox = checkboxes[i].parentNode.querySelector(
                        'input[name="bowlingTeamId[]"]');
                    bowlingTeamIdCheckbox.checked = true;
                    localStorage.setItem('bowlingTeamId_' + bowlingTeamId, 'true');
                }
            }
        });

        // Check if at least one bowler and one batsman are selected
        // function validateSelection() {
        //     if (!$('input[name="bowler_id[]"]:checked').length && !$('input[name="batsman_id[]"]:checked').length) {
        //         swal({
        //             title: "warning",
        //             text: "Please select one bowler and one batsman",
        //             icon: "warning",
        //             button: "Ok",
        //         });
        //         return false;
        //     } else if (!$('input[name="bowler_id[]"]:checked').length) {
        //         swal({
        //             title: "warning",
        //             text: "Please select a bowler",
        //             icon: "warning",
        //             button: "Ok",
        //         });
        //         return false;
        //     } else if (!$('input[name="batsman_id[]"]:checked').length) {
        //         swal({
        //             title: "warning",
        //             text: "Please select a batsman",
        //             icon: "warning",
        //             button: "Ok",
        //         });
        //         return false;
        //     }
        //     return true;
        // }
        // $('form').on('submit', function(e) {
        //     if (!validateSelection()) {
        //         e.preventDefault();
        //     }
        // });

        function handleCheckboxClick(checkbox, type) {
            checkOtherFields(checkbox);
            saveSelection(checkbox, type);
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/scores/scoreDashboard.blade.php ENDPATH**/ ?>