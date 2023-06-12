<?php

namespace App\Admin\Selectable;

use App\Models\User;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class UserSelectable extends Selectable
{
    public $model = User::class;

    public function make()
    {
        $this->column('id', 'ID');
        $this->column('first_name', 'Имя');
        $this->column('last_name', 'Фамилия');
        $this->column('middle_name', 'Отчество');
        $this->column('email', __('Почта'));
        $this->column('phone', __('Номер телефона'));
        $this->column('status', __('Статус'))->bool(['active' => true, 'inactive' => false]);

        $this->filter(function (Filter $filter) {
            $filter->like('last_name', 'Фамилия');
        });
    }
}
