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
            <a href="/article/create" class="btn btn-dark mr-2 mb-2"><i class="fas fa-plus-circle text-light"> 
            </i> Add Article</a>
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
                                <th>show</th>
                                <th>delete</th>
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
                                        <a <?= "href='article?id={$article['id']}'"; ?> class="btn  mr-2"><i class="far fa-eye"></i></a>
                                        </td>
                                        <td>
                                        <form action="/article" method="post">
                                            <input name="_method" value="DELETE" type="hidden">
                                            <input name="id" value=<?= $article['id'] ?> type="hidden">
                                            <button type="submit" class="btn" id="btnDelete" onclick="modalShow(event)" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="col d-flex justify-content-end mt-2">
                            <nav aria-label="Page navigation example col-10">
                                <ul class="pagination pagination-md">
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page-1<1?1:$page-1;?>">Previous</a></li>
                                    <?php for($i=1; $i<=$max; $i++){?>
                                        <li class="page-item <?php echo $page==$i?'active':''?>"><a class="page-link" href="?page=<?=$i?>"><?=$i?></a></li>
                                    <?php }?>
                                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page+1>$max?$max:$page+1;?>">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
        </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>

<div class="modal fade" id="exampleModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Article</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Article?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="modalNo">no</button>
                <button type="button" class="btn btn-danger" id="modalYes">yes</button>
            </div>
        </div>
    </div>
</div>


<?php require base_path('views/partials/footer.php') ?>
