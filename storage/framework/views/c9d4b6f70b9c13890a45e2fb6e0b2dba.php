<?php $__env->startSection('title', 'team ' . $team->name . 'players list'); ?>
<?php $__env->startSection('style'); ?>
    <style>
        a {
            text-decoration: none;
            font-weight: bold;
        }

        a i {
            font-size: 24px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container py-5">
        <div>
            <div class="d-flex justify-content-between mb-3 alert alert-primary">
                <h5 class="fw-bold text-uppercase text-primary"> player <?php echo e(count($players)); ?></h5>
                <h5 class="fw-bold text-primary"><?php echo e($team->name); ?> player list</h5>
                <a class="h5 fw-bold d-flex justify-content-center align-items-center text-danger"
                    href="<?php echo e(route('teams')); ?>">
                    <span class="text-uppercase"></span><i class="fas fa-angle-double-left" style="font-size: 24px"></i>
                </a>

            </div>
            <div id="message">
                <?php if(session('success')): ?>
                    <div class="alert alert-success fw-bold text-center"> <?php echo e(session('success')); ?></div>
                <?php elseif(session('danger')): ?>
                    <div class="alert alert-danger fw-bold text-center"> <?php echo e(session('danger')); ?></div>
                <?php endif; ?>
            </div>
            <table id="data" class="pt-3 table table-hover table-striped table-borderless">
                <thead class="bg-primary">
                    <tr class="text-center text-white">
                        <th>ID</th>
                        <th>Player Name</th>
                        <th>Team</th>
                        <th>Role</th>
                        <th>Batting Style</th>
                        <th>Bowling Style</th>
                        <th>Born</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('#data').DataTable({
                ajax: '<?php echo e(route('get.team-players', $team->id)); ?>',
                processing: true,
                serverSide: true,
                language: {
                    "processing": "<div class='my-5' style='height: 25vh'></div>"
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        className: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center'
                    },
                    {
                        data: 'team_name',
                        name: 'team_name',
                        className: 'text-center'
                    },
                    {
                        data: 'role',
                        name: 'role',
                        className: 'text-center',
                    },
                    {
                        data: 'batting_style',
                        name: 'batting_style',
                        className: 'text-center',
                    },
                    {
                        data: 'bowling_style',
                        name: 'bowling_style',
                        className: 'text-center',
                    },
                    {
                        data: 'born',
                        name: 'born',
                        className: 'text-center',
                        render: (data) => {
                            return (data.split(' ')[0]).split('-').reverse().join("-")
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center',
                        render: (data) => {
                            if (data === 0) {
                                return '<span style="color: red;">Inactive</span>';
                            } else {
                                return "Active"
                            }
                        }
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        className: 'text-center'
                    }
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/teams/teamPlayers/teamPlayerList.blade.php ENDPATH**/ ?>