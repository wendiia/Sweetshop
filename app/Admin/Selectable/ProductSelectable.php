<?php

namespace App\Admin\Selectable;


use App\Models\Category;
use App\Models\Product;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class ProductSelectable extends Selectable
{
    public $model = Product::class;

    public function make()
    {
        $this->column('id', 'ID');
        $this->column('title', 'Название');
        $this->column('slug', 'Слаг');
        $this->column('photo', 'Фото')->image('http://sweetshop.com/', 100, 100);
        $this->column('price', 'Цена');
        $this->column('status', __('Статус'))->bool(['active' => true, 'inactive' => false]);

        $this->filter(function (Filter $filter) {
            $filter->like('title', 'Название');
        });
    }
}
