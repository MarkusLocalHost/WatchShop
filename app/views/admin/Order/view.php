<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Заказ №<?=$order['id'];?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>/order">Список заказов</a></li>
                    <li class="breadcrumb-item active">Заказ №<?=$order['id'];?></li>
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

                <h3>Действия</h3>
                <div class="card">
                    <div class="card-body">
                            <table class="table table-bordered text-center">
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php if($order['status'] == "0"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=2" class="btn btn-outline-success">Одобрить и начать сборку</a>
                                            <?php elseif($order['status'] == "1"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn btn-outline-warning">Вернуть на доработку</a>
                                            <?php else: ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn btn-outline-danger">Вернуть на доработку</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($order['status'] == "1"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=3" class="btn btn-outline-success">Одобрить отправку</a>
                                            <?php elseif($order['status'] == "0"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=3" class="btn btn-outline-secondary">Одобрить отправку</a>
                                            <?php elseif($order['status'] == "2"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=2" class="btn btn-outline-warning">Вернуть на сборку</a>
                                            <?php else: ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=2" class="btn btn-outline-danger">Вернуть на сборку</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($order['status'] == "2"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=4" class="btn btn-outline-success">Подтвердить отправление</a>
                                            <?php elseif($order['status'] == "0" || $order['status'] == "1"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=4" class="btn btn-outline-secondary">Подтвердить отправление</a>
                                            <?php elseif($order['status'] == "3"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=3" class="btn btn-outline-warning">Вернуть на этап отправки</a>
                                            <?php else: ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=3" class="btn btn-outline-danger">Вернуть на этап отправки</a>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($order['status'] == "3"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=5" class="btn btn-outline-success">Подтвердить получение</a>
                                            <?php elseif($order['status'] == "0" || $order['status'] == "1" || $order['status'] == "2"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=5" class="btn btn-outline-secondary">Подтвердить получение</a>
                                            <?php elseif($order['status'] == "3"): ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=4" class="btn btn-outline-warning">Вернуть на этап отправления</a>
                                            <?php else: ?>
                                                <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=4" class="btn btn-outline-danger">Вернуть на этап отправления</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=6" class="btn btn-danger">Отменить</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn btn-danger delete">Удалить</a></td>
                                    </tr>
                                </tbody>
                            </table>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModal">
                            Подсказка
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Подробная информация</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Зеленый цвет кнопки - следующий этап.
                                        Желтый цвет кнопки - предыдущий этап.
                                        Красный цвет кнопки - перескакивание этапа назад.
                                        Серый цвет кнопки - перескакивание этапа вперед.
                                        Красный и серый цвет означают форс-мажорные ситуации!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <h3>Информация</h3>
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <td>Номер заказа</td>
                                        <td><?=$order['id'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Дата заказа</td>
                                        <td><?=$order['date'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Дата изменения</td>
                                        <td><?=$order['update_at'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Кол-во позиций в заказе</td>
                                        <td><?=count($order_products);?></td>
                                    </tr>
                                    <tr>
                                        <td>Сумма заказа</td>
                                        <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Имя заказчика</td>
                                        <td><?=$order['name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Email заказчика</td>
                                        <td><?=$order['email'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Адрес заказчика</td>
                                        <td><?=$order['address'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Адрес доставки</td>
                                        <td>--</td>
                                    </tr>
                                    <tr>
                                        <td>Телефон для связи</td>
                                        <td>--</td>
                                    </tr>
                                    <tr>
                                        <td>Статус</td>
                                        <td>
                                            <?php if($order['status'] == "0"){$order['status'] = 'Новый';}
                                            elseif ($order['status'] == "1"){$order['status'] = 'Сборка на складе';}
                                            elseif ($order['status'] == "2"){$order['status'] = 'Отправка';}
                                            elseif ($order['status'] == "3"){$order['status'] = 'В пути';}
                                            elseif ($order['status'] == "4"){$order['status'] = 'Доставлен';}
                                            elseif ($order['status'] == "10"){$order['status'] = 'Отменен';}?>
                                            <?php echo $order['status'];?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Комментарий</td>
                                        <td><?=$order['note'];?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h3>Детали заказа</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Количество</th>
                                    <th>Цена</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $qty = 0; foreach ($order_products as $product): ?>
                                    <?php $alias = \R::findOne('product', 'id = ?', [$product->product_id]);?>

                                    <tr>
                                        <td><?=$product->product_id;?></td>
                                        <td><a href="<?=PATH;?>product/<?=$alias['alias'];?>"><?=$product->title;?></a></td>
                                        <td><?=$product->qty; $qty += $product->qty;?></td>
                                        <td><?=$product->price;?></td>
                                    </tr>
                                <?php endforeach; ?>
                                    <tr class="active">
                                        <td colspan="2">
                                            <b>Итого:</b>
                                        </td>
                                        <td>
                                            <b><?=$qty;?></b>
                                        </td>
                                        <td>
                                            <b><?=$order['sum'];?> <?=$order['currency'];?></b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
