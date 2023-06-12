<?php

namespace App\Admin\Selectable;


use App\Models\Category;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class CategorySelectable extends Selectable
{
    public $model = Category::class;

    public function make()
    {
        $this->column('id', 'ID');
        $this->column('title', 'Название');
        $this->column('slug', 'Слаг');
        $this->column('photo', 'Фото')->image('http://sweetshop.com/', 100, 100);
        $this->column('status', __('Статус'))->bool(['active' => true, 'inactive' => false]);

        $this->filter(function (Filter $filter) {
            $filter->like('title', 'Название');
        });
    }
}
