<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">BLOG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= \Core\Authentication::user()["name"]?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="fa fa-home fa-fw nav-icon " aria-hidden="true"></i>
                        <p>Home</p>
                    </a>
                </li>

                <?php if(has_role('admin')):?>
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="fa fa-users fa-fw nav-icon " aria-hidden="true"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/groups" class="nav-link">
                        <i class="fa fa-users fa-fw nav-icon " aria-hidden="true"></i>
                        <p>Groups</p>
                    </a>
                </li>
                <?php endif?>

                <?php if(has_role('admin') || has_role('editor')):?>

                <li class="nav-item">
                    <a href="/articles" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Articles</p>
                    </a>
                </li>

                <?php endif?>

                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
