<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/sidebar.php') ?>
<?php require base_path('views/partials/banner.php') ?>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">groups</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item">Groups</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
        <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end">
                <form class="search-form col-4" action="/groups">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a class="btn btn-dark" href="/groups/create"><i class="fas fa-plus-circle text-light"></i></a> 
            </div>
        <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Group Name</th>
                            <th>Subscribe at</th>
                            <th>Last visit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user){ ?>
                        <tr>
                            <td><?=$user["id"]?></td>
                            <td><?=$user["username"]?></td>
                            <td><?=$user["name"]?></td>
                            <td><?=$user["email"]?></td>
                            <td><?=$user["phone"]?></td>
                            <td><?=$user["group_name"]?></td>
                            <td><?=$user["subscribe_at"]?></td>
                            <td><?=$user["last_vist"]??""?></td>
                        </tr>
                        <?php }?>

                    </tbody>
                </table>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php require base_path('views/partials/footer.php') ?>