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
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/articles">articles</a></li>
                        <li class="breadcrumb-item"><a href="#"><?= $article['id'] ?></a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container d-flex flex-column">
            <h2 class="col-12 fw-bold text-center"><strong><?= $article['title'] ?></strong></h2>
            <div class="text-center">
                <img src="<?= $article['image'] ?>" class="img-fluid my-3">
            </div>
            <div>
                <h4><strong>Content</strong></h4>
                <p class="fs-4"><?= $article['content'] ?></p>
            </div>
            <div>
                <h4><strong>Summary</strong></h4>
                <p class="lead"><?= $article['summary'] ?></p>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


<?php require base_path('views/partials/footer.php') ?>
