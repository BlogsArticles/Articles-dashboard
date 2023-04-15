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
                        echo "<tr>";
                        echo " <td>$user[id]</td>";
                        echo  "<td>$user[name]</td>";
                        echo  "<td>$user[email]</td>";
                        echo "<td>$user[phone]</td>";
                        echo "<td>$user[group_name]</td>";
                        echo "<td> <a href='/edit' class='nav-link active'><i class='fas fa-edit'></i></a> </td>";
                        echo "<td> <a href='/edit' class='nav-link active'><i class='fas fa-trash-alt'></i></a></td>";
                        echo " </tr>";
                    }

                    ?>

                </tbody>
            </table>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



<?php require base_path('views/partials/footer.php') ?>