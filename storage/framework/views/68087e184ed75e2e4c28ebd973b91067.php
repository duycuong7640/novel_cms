<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item navbar-brand-mini-wrapper">
            <a class="nav-link navbar-brand brand-logo-mini" href="<?php echo e(route('admin.index')); ?>">
                <img src="<?php echo e(asset('/static/admin/assets/images/logo-mini.svg')); ?>" alt="logo"/>
            </a>
        </li>
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="profile-image">
                    <img class="img-xs rounded-circle" src="<?php echo e(asset('/static/admin/assets/images/faces/face8.jpg')); ?>"
                         alt="profile image">
                    <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                    <p class="profile-name"><?php echo e(substr($admin->name, 0, 15)); ?></p>
                    <p class="designation"><?php echo e(substr($admin->username, 0, 15)); ?></p>
                </div>
                
                
                
                
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link"><?php echo e(adminSidebar::SIDEBAR["CLIENT"]); ?></span>
        </li>
        <li class="nav-item <?php echo e(Request::routeIs('client.home') ? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('client.home')); ?>" target="_blank">
                <span class="menu-title"><?php echo e(adminSidebar::SIDEBAR["HOME"]); ?></span>
                <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link"><?php echo e(adminSidebar::SIDEBAR["ADMIN"]); ?></span>
        </li>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <li class="nav-item <?php echo e(Request::routeIs('admin.category.*')? 'active' : ''); ?> <?php echo e(Request::routeIs('admin.post.*')? 'active' : ''); ?> <?php echo e(Request::routeIs('admin.product.*')? 'active' : ''); ?>">
            <a class="nav-link" data-toggle="collapse" href="#basic-ui1" aria-expanded="false"
               aria-controls="basic-ui1">
                <span class="menu-title"><?php echo e(adminSidebar::SIDEBAR["MANAGER_CONTENT"]); ?></span>
                <i class="icon-layers menu-icon"></i>
            </a>
            <div
                class="collapse <?php echo e(Request::routeIs('admin.category.*')? 'show' : ''); ?> <?php echo e(Request::routeIs('admin.post.*')? 'show' : ''); ?> <?php echo e(Request::routeIs('admin.product.*')? 'show' : ''); ?>"
                id="basic-ui1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::routeIs('admin.category.*')? 'active' : ''); ?>"
                           href="<?php echo e(route('admin.category.index')); ?>"><?php echo e(adminSidebar::SIDEBAR["CATEGORY"]["INDEX"]); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::routeIs('admin.post.*')? 'active' : ''); ?>"
                           href="<?php echo e(route('admin.post.index')); ?>"><?php echo e(adminSidebar::SIDEBAR["POST"]["INDEX"]); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Request::routeIs('admin.product.*')? 'active' : ''); ?>"
                           href="<?php echo e(route('admin.product.index')); ?>"><?php echo e(adminSidebar::SIDEBAR["PRODUCT"]["INDEX"]); ?></a>
                    </li>
                </ul>
            </div>
        </li>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
                <li class="nav-item <?php echo e(Request::routeIs('admin.photo.*')? 'active' : ''); ?>">
                    <a class="nav-link" href="<?php echo e(route('admin.photo.index')); ?>">
                        <span class="menu-title">Logo</span>
                        <i class="icon-doc menu-icon"></i>
                    </a>
                </li>
        
        
        
        
        
        
        
        
        
        
        
        
        <li class="nav-item <?php echo e(Request::routeIs('admin.point.*')? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.point.index')); ?>">
                <span class="menu-title">Point</span>
                <i class="icon-layers menu-icon"></i>
            </a>
        </li>
        <li class="nav-item <?php echo e(Request::routeIs('admin.setting.*')? 'active' : ''); ?>">
            <a class="nav-link" href="<?php echo e(route('admin.setting.update',["id" => 1])); ?>">
                <span class="menu-title">Cấu hình</span>
                <i class="mdi mdi-settings-box menu-icon"></i>
            </a>
        </li>
        
        
        
        
        
        
    </ul>
</nav>
<?php /**PATH /Users/duycuong/Documents/Projects/duycuong/php/novel_cms/Modules/Admins/Resources/views/elements/sitebar.blade.php ENDPATH**/ ?>