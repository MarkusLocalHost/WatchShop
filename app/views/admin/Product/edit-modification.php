<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Модификации товара</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/product">Список товаров</a></li>
                    <li class="breadcrumb-item active">Модификации товара</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Добавление модификации
                        </div>
                    </div>

                    <form action="<?= ADMIN; ?>/product/edit-modification" method="post" class="needs-validation" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название модификации</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Название модификации" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Стоимость модификации</label>
                                <input type="text" name="price" class="form-control" id="price" placeholder="Цена" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым!
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <input type="hidden" name="product_id" value="<?=$id;?>">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>

                </div>

                <?php if ($modifications): ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Редактирование модификаций
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Название модификации</th>
                                    <th>Цена</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($modifications as $modification): ?>
                                    <tr>
                                        <td><?=$modification['title'];?></td>
                                        <td><?=$modification['price'];?></td>
                                        <td>
<!--                                            <a href="--><?//=ADMIN;?><!--/product/edit-modification-single?id=--><?//=$modification['id'];?><!--">-->
<!--                                                <i class="fas fa-file-invoice"></i>-->
<!--                                            </a>-->
                                            <button data-toggle="modal" data-target="#exampleModalCenter<?=$modification['title'];?>">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <a class="delete" href="<?=ADMIN;?>/product/delete-modification?id=<?=$modification['id'];?>">
                                                <i class="fas fa-times text-danger ml-3"></i>
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter<?=$modification['title'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <form action="<?= ADMIN; ?>/product/edit-modification-single" method="post" class="needs-validation" novalidate>
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Редактирование модификации</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="title">Название модификации</label>
                                                                        <input type="text" name="title" class="form-control" id="title" value="<?=h($modification['title']);?>" required>
                                                                        <div class="invalid-feedback">
                                                                            Поле не должно быть пустым!
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="title">Стоимость модификации</label>
                                                                        <input type="text" name="price" class="form-control" id="price" value="<?=h($modification['price']);?>" required>
                                                                        <div class="invalid-feedback">
                                                                            Поле не должно быть пустым!
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                                                    <input type="hidden" name="product_id" value="<?=$id;?>">
                                                                    <input type="hidden" name="id" value="<?=$modification['id'];?>">
                                                                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                                                </div>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <h3 class="pt-3">Модификаций пока нет..</h3>
                <?php endif;?>


            </div>
        </div>
    </div>
</section>
<!-- /.content -->

