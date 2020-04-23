<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Список заказов</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Список заказов</li>
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
                                        <th>Покупатель</th>
                                        <th>Статус</th>
                                        <th>Сумма</th>
                                        <th>Дата создания</th>
                                        <th>Дата изменения</th>
                                        <th>Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($orders as $order): ?>
                                        <?php if ($order['status'] == "2"){$class = "table-primary";}
                                        elseif ($order['status'] == "3"){$class = "table-primary";}
                                        elseif ($order['status'] == "4"){$class = "table-success";}
                                        elseif ($order['status'] == "10"){$class = "table-danger";};?>
                                        <tr class="<?=$class;?>">
                                            <td><?=$order['id'];?></td>
                                            <td><?=$order['name'];?></td>
                                            <td>
                                                <?php if($order['status'] == "0"){$order['status'] = 'Новый';}
                                                elseif ($order['status'] == "1"){$order['status'] = 'Сборка на складе';}
                                                elseif ($order['status'] == "2"){$order['status'] = 'Отправка';}
                                                elseif ($order['status'] == "3"){$order['status'] = 'В пути';}
                                                elseif ($order['status'] == "4"){$order['status'] = 'Доставлен';}
                                                elseif ($order['status'] == "10"){$order['status'] = 'Отменен';}?>
                                                <?php echo $order['status'];?>
                                            </td>
                                            <td><?=$order['sum'];?> <?=$order['currency'];?></td>
                                            <td><?=$order['date'];?></td>
                                            <td><?=$order['update_at'];?></td>
                                            <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                                <a class="delete" href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>">
                                                    <i class="fas fa-times text-danger ml-3"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            <p>(<?=count($orders);?> заказa(ов) из <?=$count;?>)</p>
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
