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
<!--                    <h1 class="m-0">Dashboard</h1>-->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">home</a></li>
                        <li class="breadcrumb-item"><a href="/articles">articles</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $article['id'] ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="font-family: 'DejaVu Math TeX Gyre'">
        <div class="card mb-3">
            <img  src="<?= $image ?>" class="card-img-top w-50 h-50 mb-3 mx-auto">
            <div class="card-body">
                <h5 class="card-title mb-3"><strong><?= $article['title'] ?></strong></h5>
                <p class="card-text mb-3"><?= $article['content'] ?></p>
                <h5 class="card-title mt-3 mb-2"><strong>Summary</strong></h5>
                <p class="card-text"><p class="text-body-secondary"><?= $article['summary'] ?></p>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


<?php require base_path('views/partials/footer.php') ?>
