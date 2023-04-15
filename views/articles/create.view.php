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
                        <label for="content">Content</label>
                        <textarea class="form-control" cols="10"  rows="4" name="content" id="content" placeholder="Enter article content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="summary">Summary</label>
                        <textarea class="form-control" cols="10"  rows="2" name="summary" id="summary" placeholder="Enter article summary"></textarea>
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
