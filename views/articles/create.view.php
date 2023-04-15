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
                    <h1 class="m-0">Create articles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">home</a></li>
                        <li class="breadcrumb-item"><a href="/articles">articles</a></li>
                        <li class="breadcrumb-item">create article</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/article" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" value="" class="form-control" name="title" id="title" placeholder="Enter article title here">
                    </div>
                    <div class="form-group">
                        <label for="building-number">Building number</label>
                        <input type="text" value="" class="form-control" name="building_number" id="building-number" placeholder="Enter Building number">
                    </div>
                    <div class="form-group">
                        <label for="floor-number">Floor number</label>
                        <input type="text" value="" class="form-control" name="floor_number" id="floor-number" placeholder="Enter floor number">
                    </div>
                    <div class="form-group">
                        <label for="flat_number">Flat number</label>
                        <input type="text" value="" class="form-control" name="flat_number" id="flat-number" placeholder="Enter Flat number">
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-dark w-100">Submit</button>
                </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php require base_path('views/partials/footer.php') ?>
