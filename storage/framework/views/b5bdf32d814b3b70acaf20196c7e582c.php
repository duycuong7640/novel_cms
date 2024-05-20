<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <form method="post" action="" class="forms-sample" id="form-edit">
            <?php echo csrf_field(); ?>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <h4 class="mb-md-0 mb-4 mr-4"><?php echo e(!empty($data['common']['title']) ? $data['common']['title'] : ''); ?></h4>
                        <div
                            class="wrapper ml-md-auto d-flex flex-column flex-md-row kanban-toolbar ml-n2 ml-md-0 mt-4 mt-md-0">
                            <div class="d-flex mt-4 mt-md-0">
                                <button type="submit" class="btn btn-success">
                                    <?php echo e(adminForm::FORM_HEAD['SAVE']); ?>

                                </button>
                                <a href="<?php echo e(route('admin.category.index')); ?>">
                                    <button type="button" class="btn btn-inverse-dark">
                                        <?php echo e(adminForm::FORM_HEAD['CANCEL']); ?>

                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input type="text" name="title" value="<?php echo e($data['detail']->title); ?>"
                                       class="form-control" placeholder=""/>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="form-group">
                                <label>Vị trí</label>
                                <input type="text" name="rank" value="<?php echo e($data['detail']->rank); ?>"
                                       class="form-control" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <label>Thuộc danh mục</label>
                                <select name="parent_id" class="form-control col-md-3">
                                    <?php echo $data['category']['select']; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại danh mục</label>
                                <select name="type" class="form-control col-md-3">
                                    <option value="">Loại danh mục</option>
                                    <?php $__currentLoopData = dataCategory::TYPE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($data['detail']->type == $row): ?> selected
                                                <?php endif; ?> value="<?php echo e($row); ?>"><?php echo e(dataCategory::TYPE_NAME[$row]); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Icon Fontawesome --> <a target="_blank" href="https://fontawesome.com/v6/search">Link</a></label>
                                <input type="text" name="fontawesome_icon" class="form-control" value="<?php echo e($data['detail']->fontawesome_icon); ?>" placeholder="<?php echo e('<i class="fa-solid fa-house"></i>'); ?>"/>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status"
                                                       value="1" <?php echo e(($data['detail']->status == 1) ? 'checked' : ''); ?>>
                                                <?php echo e(adminForm::FIELD['ACTIVE']); ?>

                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="status"
                                                       value="0" <?php echo e(($data['detail']->status == 0) ? 'checked' : ''); ?>>
                                                <?php echo e(adminForm::FIELD['NON_ACTIVE']); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($errors->has('error')): ?>
                                <p class="alert alert-danger"><?php echo e($errors->first('error')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title seo</label>
                            <textarea type="text" name="title_seo" class="form-control"
                                      placeholder=""><?php echo e($data['detail']->title_seo); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta des</label>
                            <textarea type="text" name="meta_des" class="form-control"
                                      placeholder=""><?php echo e($data['detail']->meta_des); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta key</label>
                            <textarea type="text" name="meta_key" class="form-control"
                                      placeholder=""><?php echo e($data['detail']->meta_key); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex flex-column flex-md-row align-items-center">
                        <div
                            class="wrapper ml-md-auto d-flex flex-column flex-md-row kanban-toolbar ml-n2 ml-md-0 mt-4 mt-md-0">
                            <div class="d-flex mt-4 mt-md-0">
                                <button type="submit" class="btn btn-success">
                                    <?php echo e(adminForm::FORM_HEAD['SAVE']); ?>

                                </button>
                                <a href="<?php echo e(route('admin.category.index')); ?>">
                                    <button type="button" class="btn btn-inverse-dark">
                                        <?php echo e(adminForm::FORM_HEAD['CANCEL']); ?>

                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('validate'); ?>
    <?php echo JsValidator::formRequest('Modules\Admins\Http\Requests\Category\EditRequest','#form-edit'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admins::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Admins/Resources/views/categories/edit.blade.php ENDPATH**/ ?>