<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Список товаров</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список товаров</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Категория</th>
                                    <th>Наименование</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($products as $product): ?>
                                    <tr>
                                        <td><?=$product['id'];?></td>
                                        <td><?=$product['cat'];?></td>
                                        <td><?=$product['title'];?></td>
                                        <td><?=$product['price'];?> $</td>
                                        <td><?=$product['status'] ? 'On' : 'Off';?></td>
                                        <td>
                                            <a href="<?=ADMIN;?>/product/edit?id=<?=$product['id'];?>">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a href="<?=ADMIN;?>/product/edit-modification?id=<?=$product['id'];?>">
                                                <i class="fas fa-file-invoice ml-3"></i>
                                            </a>
                                            <a href="<?=ADMIN;?>/product/edit-detail?id=<?=$product['id'];?>">
                                                <i class="fas fa-binoculars ml-3"></i>
                                            </a>
                                            <a class="delete" href="<?=ADMIN;?>/product/delete?id=<?=$product['id'];?>">
                                                <i class="fas fa-times text-danger ml-3"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            <p>(<?=count($products);?> товаров из <?=$count;?>)</p>
                            <div class="d-flex justify-content-center">
                                <?php if($pagination->countPages > 1): ?>
                                    <?=$pagination;?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

