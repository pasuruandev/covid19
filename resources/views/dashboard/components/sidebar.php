<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= route('dashboard.index') ?>">
        <div class="sidebar-brand-text mx-3">
            <small>Pasuruan TANGGAP</small>
            Covid<sup>19</sup>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php
        foreach($MENUS as $key => $menu):
    ?>

    <?php if(sizeof($menu) <= 0): ?>
        <?php if (($key+1) == sizeof($MENUS)) break; ?>
        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php continue;endif; ?>

    <?php if(!@$menu['key']): ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            <?= $menu['name'] ?>
        </div>
    <?php continue;endif; ?>

    <?php if(@$menu['sub']): ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $menu['key'] ?>" aria-expanded="true"
                aria-controls="collapse<?= $menu['key'] ?>">
                <i class="<?= $menu['icon'] ?>"></i>
                <span><?= $menu['name'] ?></span>
            </a>
            <div id="collapse<?= $menu['key'] ?>" class="collapse" aria-labelledby="heading<?= $menu['key'] ?>" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header"><?= $menu['name'] ?>:</h6>
                    <?php foreach($menu['sub'] as $key => $submenu): ?>
                    <a class="collapse-item" href="<?= route($submenu['url']) ?>"><?= $submenu['name'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </li>
    <?php continue;endif; ?>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= route($menu['url']) ?>">
            <i class="<?= $menu['icon'] ?>"></i>
            <span><?= $menu['name'] ?></span>
        </a>
    </li>

    <?php endforeach; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>