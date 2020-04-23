<?php


namespace app\models\admin;


use app\models\AppModel;

class Modification extends AppModel
{

    public $attributes = [
        'title' => '',
        'price' => '',
        'product_id' => '',
        'id' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['price'],
            ['product_id'],
        ],
        'numeric' => [
            'price',
        ],
    ];

}