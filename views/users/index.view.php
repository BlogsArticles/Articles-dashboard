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
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-end mb-2">
                <form class="search-form col-4" action="/users" method="GET">
                    <div class="input-group ">
                        <input type="text" name="search" class="form-control" placeholder="search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a class="btn btn-dark" href="/users/create"><i class="fas fa-plus-circle text-light"></i></a>
            </div>


            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>email</th>
                        <th>Contacts</th>
                        <th>Group Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['name'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['phone'] ?></td>
                            <td><?= $user['group_name'] ?></td>
                            <td> <a href='/users/edit?id=<?= $user["id"] ?>' class='nav-link active'><i class='fas fa-edit'></i></a> </td>

                            <td>
                                <form action="destroy?id=<?= $user["id"] ?>" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <button class="btn " type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>



                </tbody>
            </table>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



<?php require base_path('views/partials/footer.php') ?>