<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Пользователи';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('Дата создания'))->width(150);
        $grid->column('updated_at', __('Дата обновление'))->width(150);
        $grid->column('ФИО')->display(function () {
            return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
        });

        $grid->column('email', __('Почта'))->label('success');
        $grid->column('phone', __('Номер телефона'));
        $grid->column('status', __('Статус'))->bool(['active' => true, 'inactive' => false]);

        $grid->filter(function($filter) {
            $filter->scope('trashed', 'Удаленные записи')->onlyTrashed();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('created_at', __('Дата создания'));
        $show->field('updated_at',  __('Дата обновление'));
        $show->field('first_name', __('Имя'));
        $show->field('last_name', __('Фамилия'));
        $show->field('middle_name',  __('Отчество'));
        $show->field('email',__('Почта'));
        $show->field('password', __('Пароль'));
        $show->field('phone', __('Номер телефона'));
        $show->field('status', __('Статус'));
        $show->field('deleted_at', __('Дата удаления'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('first_name', __('Имя'));
        $form->text('last_name', __('Фамилия'));
        $form->text('middle_name',  __('Отчество'));
        $form->email('email', __('Почта'));
        $form->password('password', __('Пароль'));
        $form->mobile('phone',  __('Номер телефона'));
        $form->radio('status', __('Статус'))->options(['active' => 'Активный', 'inactive'=> 'Неактивный'])->default('Неактивный');

        return $form;
    }
}
