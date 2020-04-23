<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Новый товар</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/product">Список товаров</a></li>
                    <li class="breadcrumb-item active">Новый товар</li>
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
                    <form class="needs-validation" id="add" action="<?= ADMIN; ?>/product/add" method="post" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Наименование товара</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Наименование товара" value="<?php isset($_SESSION['form_data']['title']) ? h($_SESSION['form_data']['title']) : null;?>" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым!
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Родительская категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cackeKey' => 'admin_select',
                                    'attrs' => [
                                        'name' => 'category_id',
                                        'id' => 'category_id'
                                    ],
                                    'class' => 'form-control',
                                    'prepend' => '<option value>Выберите категорию</option>',
                                ]);?>
                            </div>

                            <div class="form-group">
                                <label for="brand_id">ID бренда</label>
                                <input type="text" name="brand_id" class="form-control" id="brand_id"
                                       placeholder="ID бренда" value="<?php isset($_SESSION['form_data']['brand_id']) ? h($_SESSION['form_data']['brand_id']) : null;?>">
                            </div>

                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords"
                                       placeholder="Ключевые слова" value="<?php isset($_SESSION['form_data']['keywords']) ? h($_SESSION['form_data']['keywords']) : null;?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание товара</label>
                                <input type="text" name="description" class="form-control" id="description"
                                       placeholder="Описание товара" value="<?php isset($_SESSION['form_data']['description']) ? h($_SESSION['form_data']['description']) : null;?>">
                            </div>

                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input type="text" name="price" class="form-control" id="price"
                                       placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?php isset($_SESSION['form_data']['price']) ? h($_SESSION['form_data']['price']) : null;?>" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым! Допускаются только цифры!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="old_price">Старая цена</label>
                                <input type="text" name="old_price" class="form-control" id="old_price"
                                       placeholder="Старая цена" pattern="^[0-9.]{1,}$" value="<?php isset($_SESSION['form_data']['old_price']) ? h($_SESSION['form_data']['old_price']) : null;?>">
                            </div>

                            <div class="form-group">
                                <label for="content">Контент</label>
                                <textarea name="content" id="editor1" cols="180" rows="10"
                                          value="<?php isset($_SESSION['form_data']['old_price']) ? $_SESSION['form_data']['old_price'] : null;?>">

                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" checked> Статус
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hit"> Хит
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="related">Связанные товары</label>
                                <select name="related[]" class="form-control select2 select2-blue" id="related" multiple></select>
                            </div>

                            <?php new \app\widgets\filter\Filter(null, WWW . '/filter/admin_filter_tpl.php');?>

                            <div class="form-group pt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-danger file-upload">
                                            <div class="card-header">
                                                <h3 class="card-title">Картинки галереи</h3>
                                            </div>
                                            <div class="card-body pt-3 pb-1">
                                                <div id="multi" class="btn btn-success" data-url="/product/add-image" data-name="multi">Выбрать файл</div>
                                                <p><small>Рекомендуемые размеры: 700x1000</small></p>
                                                <div class="multi"></div>
                                            </div>
                                            <div class="overlay dark">
                                                <i class="fas fa-sync fa-spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <div class="card card-primary file-upload ">
                                            <div class="card-header">
                                                <h3 class="card-title">Базовое изображение</h3>
                                            </div>
                                            <div class="card-body pt-3 pb-1">
                                                <div id="single" class="btn btn-success" data-url="/product/add-image" data-name="single">Выбрать файл</div>
                                                <p><small>Рекомендуемые размеры: 125x200</small></p>
                                                <div class="single"></div>
                                            </div>
                                            <div class="overlay dark">
                                                <i class="fas fa-sync fa-spin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Добавить</button>
                        </div>
                    </form>

                <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>

                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</section>
<!-- /.content -->

<script src="plugins/ckeditor5/ckeditor.js"></script>
<script src="plugins/ckfinder/ckfinder.js"></script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor1' ), {
            language: 'ru',
            ckfinder: {
                uploadUrl: '/public/adminLTE/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            },
            toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
        } )
        .catch( error => {
            console.error( error );
        } );
</script>




