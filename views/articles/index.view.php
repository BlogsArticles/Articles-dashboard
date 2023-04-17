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
                    <h1 class="m-0">Articles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">home</a></li>
                        <li class="breadcrumb-item">articles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container d-flex justify-content-end">
            <a href="/article/create" class="btn btn-dark mr-2 mb-2">Add article</a>
        </div>
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Published At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= $article['id'] ?></td>
                            <td style="width: 20em; max-width: 20em; overflow: hidden; text-overflow: ellipsis;"><?= $article['title'] ?></td>
                            <td style="width: 20em; max-width: 20em; overflow: hidden; text-overflow: ellipsis;"><?= $article['summary'] ?></td>
                            <td><?= $article['publish_at'] ?></td>
                            <td class="d-flex">
                                <a <?= "href='article?id={$article['id']}'"; ?> class="btn btn-dark mr-2">Show</a>
                                <form action="/article" method="post">
                                    <input name="_method" value="DELETE" type="hidden">
                                    <input name="id" value=<?= $article['id'] ?> type="hidden">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>




<?php require base_path('views/partials/footer.php') ?>
