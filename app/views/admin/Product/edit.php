<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Редактирование товара <?=$product->title;?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/product">Список товаров</a></li>
                    <li class="breadcrumb-item active">Редактирование товара</li>
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
                    <form class="needs-validation" action="<?= ADMIN; ?>/product/edit" method="post" novalidate>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Наименование товара</label>
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Наименование товара" value="<?=h($product->title);?>" required>
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
                                ]);?>
                            </div>

                            <div class="form-group">
                                <label for="brand_id">ID бренда</label>
                                <input type="text" name="brand_id" class="form-control" id="brand_id"
                                       placeholder="ID бренда" value="<?=h($product->brand_id);?>">
                            </div>

                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords"
                                       placeholder="Ключевые слова" value="<?=h($product->keywords);?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание товара</label>
                                <input type="text" name="description" class="form-control" id="description"
                                       placeholder="Описание товара" value="<?=h($product->description);?>">
                            </div>

                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input type="text" name="price" class="form-control" id="price"
                                       placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?=h($product->price);?>" required>
                                <div class="invalid-feedback">
                                    Поле не должно быть пустым! Допускаются только цифры!
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="old_price">Старая цена</label>
                                <input type="text" name="old_price" class="form-control" id="old_price"
                                       placeholder="Старая цена" pattern="^[0-9.]{1,}$" value="<?=h($product->old_price);?>">
                            </div>

                            <div class="form-group">
                                <label for="content">Контент</label>
                                <textarea name="content" id="editor1" cols="180" rows="10">
                                    <?=$product->content;?>
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="status" <?=$product->status ? ' checked' : null;?>> Статус
                                </label>
                            </div>

                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hit" <?=$product->hit ? ' checked' : null;?>> Хит
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="related">Связанные товары</label>
                                <select name="related[]" class="form-control select2 select2-blue" id="related" multiple>
                                    <?php if (!empty($related_product)): ?>
                                        <?php foreach ($related_product as $item): ?>
                                            <option value="<?=$item['related_id'];?>" selected><?=$item['title'];?></option>
                                        <?php endforeach;?>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <?php new \app\widgets\filter\Filter($filter, WWW . '/filter/admin_filter_tpl.php');?>

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
                                                <div class="multi">
                                                    <?php if(!empty($gallery)): ?>
                                                        <?php foreach ($gallery as $item): ?>
                                                            <img src="/images/<?=$item;?>" alt="" style="max-height: 150px; cursor: pointer;"
                                                                 data-id="<?=$product->id;?>" data-src="<?=$item;?>" class="del-item">
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
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
                                                <div class="single">
                                                    <img src="/images/<?=$product->img;?>" alt="" style="max-height: 150px;">
                                                </div>
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
                            <input type="hidden" name="id" value="<?=$product->id;?>">
                            <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                    </form>

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




