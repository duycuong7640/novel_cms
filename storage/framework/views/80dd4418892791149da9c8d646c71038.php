<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex flex-column flex-md-row align-items-center">
                    <h4 class="mb-md-0 mb-4 mr-4"><?php echo e(!empty($data['common']['title']) ? $data['common']['title'] : ''); ?></h4>
                    <div class="wrapper d-flex align-items-center">
                        <form class="form-inline">
                            <input type="text" name="title"
                                   value="<?php echo e(request()->has('title') ? request()->get('title') : ''); ?>"
                                   class="form-control mb-0 mr-sm-2"
                                   placeholder="Title">
                            <button type="submit"
                                    class="btn btn-primary mb-0"><?php echo e(adminForm::FORM_HEAD['SEARCH']); ?></button>
                        </form>
                    </div>
                    <div
                        class="wrapper ml-md-auto d-flex flex-column flex-md-row kanban-toolbar ml-n2 ml-md-0 mt-4 mt-md-0">
                        <div class="d-flex mt-4 mt-md-0">
                            <a href="<?php echo e(route('admin.photo.create')); ?>">
                                <button type="button" class="btn btn-success">
                                    <?php echo e(adminForm::FORM_HEAD['CREATE']); ?>

                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(Session::has('success')): ?>
            <p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
        <?php endif; ?>
        <?php if(Session::has('error')): ?>
            <p class="alert alert-danger"><?php echo e(Session::get('error')); ?></p>
        <?php endif; ?>
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th width="50">STT</th>
                                    <th width="100">Thumbnail</th>
                                    <th>Title</th>
                                    <th>Sort</th>
                                    <th>Type</th>
                                    <th width="100">Author</th>
                                    <th width="40">Status</th>
                                    <th width="50">Created</th>
                                    <th width="50">Modified</th>
                                    <th width="50">ID</th>
                                    <th width="95"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $data['list']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(\Helpers::renderSTT($k + 1, $data['list'])); ?></td>
                                        <td>
                                            <?php if(!empty($row->thumbnail)): ?>
                                                <img src="<?php echo e(asset($row->thumbnail)); ?>" class="mw-100">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($row->title); ?></td>
                                        <td><?php echo e($row->sort); ?></td>
                                        <td><?php echo e(dataPhoto::TYPE_NAME[$row->type]); ?></td>
                                        <td><?php echo e(!empty($row->user->email) ? $row->user->email : ''); ?></td>
                                        <td><?php echo e(\Helpers::renderStatus($row->status)); ?></td>
                                        <td><?php echo e(\Helpers::formatDate($row->created_at)); ?></td>
                                        <td><?php echo e(\Helpers::formatDate($row->updated_at)); ?></td>
                                        <td><?php echo e($row->id); ?></td>
                                        <td>
                                            <a class="icon-form" title="edit"
                                               href="<?php echo e(route('admin.photo.edit', ['id' => $row->id, 'page' => $data['list']->currentPage(), 'parent_id' => (request()->has('parent_id') ? request()->get('parent_id') : '')])); ?>">
                                                <i class="icon-note"></i>
                                            </a>
                                            <a class="icon-form status active"
                                               href="<?php echo e(route('admin.photo.status', ['id' => $row->id, 'field' => 'status'])); ?>">
                                                <?php echo (($row->status == 1) ? '<i class="icon-check"></i>' : '<i class="icon-close"></i>'); ?>

                                            </a>
                                            <a class="icon-form"
                                               href="javascript:confirmDelete('<?php echo e(route('admin.photo.destroy', ['id' => $row->id])); ?>', '<?php echo e(adminNotify::CONFIRM_DELETE); ?>')">
                                                <i class="icon-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($data['list']->links('admins::elements.extend.pagination')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Admins/Resources/views/photos/index.blade.php ENDPATH**/ ?>