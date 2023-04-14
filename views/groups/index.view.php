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
    <a class="btn btn-app" href="/groups/create"><i class="fas fa-plus-circle"></i></a> 
        <div class="container-fluid">
        <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($groups as $group){ ?>
                        <tr>
                            <td><?=$group["id"]?></td>
                            <td><?=$group["name"]?></td>
                            <td><?=$group["description"]?></td>
                            <td><i class="fa <?=$group["icon"]?>"></i></td>
                            <td>
                                <a class="btn" href="group/edit?id=<?=$group["id"]?>"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <form action="group?id=<?=$group["id"]?>" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $group['id'] ?>">
                                <button class="btn " type="submit"><i class="fas fa-trash-alt"></i></button> 
                                </form>
                            </td>
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