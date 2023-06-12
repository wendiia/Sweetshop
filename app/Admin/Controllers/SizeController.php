<?php

namespace App\Admin\Controllers;

use App\Models\Size;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SizeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Размеры';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Size());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('Дата создания'))->width(190);
        $grid->column('updated_at', __('Дата обновления'))->width(190);
        $grid->column('name', __('Название'));

        $grid->filter(function($filter) {
            $filter->scope('trashed', 'Удаленные записи')->onlyTrashed();
        });

        $grid->column('order', __('Порядок'))->hide();

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
        $show = new Show(Size::findOrFail($id));

        $show->field('id', _('ID'));
        $show->field('created_at',  __('Дата создания'));
        $show->field('updated_at', __('Дата обновления'));
        $show->field('name', __('Название'));
        $show->field('order', __('Порядок'));
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
        $form = new Form(new Size());

        $form->text('name', __('Название'));
        $form->number('order', __('Порядок'));

        return $form;
    }
}
