<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Подробное описание</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/product">Список товаров</a></li>
                    <li class="breadcrumb-item active">Подробное описание</li>
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
                            Подробное описание
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
            </div>
        </div>
    </div>
</section>
<!-- /.content -->


