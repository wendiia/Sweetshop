<?php

namespace App\Admin\Selectable;


use App\Models\Size;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class SizeSelectable extends Selectable
{
    public $model = Size::class;

    public function make()
    {
        $this->column('id', 'ID');
        $this->column('name', 'Название');

        $this->filter(function (Filter $filter) {
            $filter->like('name', 'Название');
        });
    }
}
