<?php

namespace App\Admin\Controllers;

use App\Models\Banner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Баннеры';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banner());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('Дата создания'))->width(190);
        $grid->column('updated_at', __('Дата обновления'))->width(190);
        $grid->column('title', __('Название'));
        $grid->column('description', __('Описание'));
        $grid->column('discount', __('Скидка'));
        $grid->column('photo', __('Фото'))->image('http://sweetshop.com/', 100, 100);
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
        $show = new Show(Banner::findOrFail($id));

        $show->field('id',  __('ID'));
        $show->field('created_at',  __('Дата создания'));
        $show->field('updated_at', __('Дата обновления'));
        $show->field('title',__('Название'));
        $show->field('description', __('Описание'));
        $show->field('discount',__('Скидка'));
        $show->field('photo', __('Фото'));
        $show->field('status', __('Статус'));
        $show->field('deleted_at',  __('Дата удаления'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Banner());

        $form->text('title', __('Название'));
        $form->textarea('description', __('Описание'));
        $form->text('discount', __('Скидка'));
        $form->text('photo', __('Фото'));
        $form->radio('status', __('Статус'))->options(['active' => 'Активный', 'inactive'=> 'Неактивный'])->default('Неактивный');

        return $form;
    }
}
