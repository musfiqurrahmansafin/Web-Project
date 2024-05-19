<?php $__env->startSection('title', 'venue list'); ?>
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
    <div class="container">
        <div>
            <div class="d-flex justify-content-between mt-5 mb-3 alert alert-primary">
                <h5 class="fw-bold text-uppercase text-primary">Total <?php echo e($venues); ?></h5>
                <h5 class="text-uppercase fw-bold text-primary">venue list</h5>
                <a class="h5 fw-bold d-flex justify-content-center align-items-center text-primary"
                    href="<?php echo e(route('get.add-venue')); ?>">
                    <span class="text-uppercase">add </span><i class="fas fa-plus ms-2"></i>
                </a>
            </div>
            <div class="message">
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
                        <th>Venue Name</th>
                        <th>Venue Location</th>
                        <th>Venue Capacity</th>
                        <th>Created At</th>
                        <th>Updated At</th>
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
                ajax: '<?php echo e(route('venues')); ?>',
                processing: true,
                serverSide: true,
                language: {
                    "processing": "<div class='my-5' style='height: 25vh'></div>"
                },
                lengthMenu: [10, 25, 50, 100],
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
                        data: 'location',
                        name: 'location',
                        className: 'text-center'
                    },
                    {
                        data: 'capacity',
                        name: 'capacity',
                        className: 'text-center'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        className: 'text-center',
                        render: function(data) {
                            let date = new Date(data);
                            let year = date.getFullYear();
                            let month = ('0' + (date.getMonth() + 1)).slice(-2);
                            let day = ('0' + date.getDate()).slice(-2);
                            return year + '-' + month + '-' + day;
                        }
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        className: 'text-center',
                        render: function(data) {
                            let date = new Date(data);
                            let year = date.getFullYear();
                            let month = ('0' + (date.getMonth() + 1)).slice(-2);
                            let day = ('0' + date.getDate()).slice(-2);
                            return year + '-' + month + '-' + day;
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Downloads\cricket-scorecard\resources\views/pages/venues/venueList.blade.php ENDPATH**/ ?>