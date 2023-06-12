<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\UserSelectable;
use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Заказы';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('Дата создания'))->width(190);
        $grid->column('updated_at', __('Дата обновления'))->width(190);
        $grid->column('user_id', __('ID пользователя'))->editable();
        $grid->column('date_readiness', __('Дата желаемой выдачи'))->editable('date');
        $grid->column('quantity', 'Кол-во товаров')->expand(function ($model) {
            if ($model->products()->count() > 0) {
                $products = $model->products()->take(10)->get()->map(function ($product) {
                    return $product->only(['id', 'title', 'category_id', 'price', 'weight', 'expiration_date']);
                });

                return new Table(['ID', 'Название', 'Категория', 'Цена', 'Вес', 'Срок годности'], $products->toArray());
            }
            return '<p style="text-align: center; font-weight: 600"> В корзине нет товаров </p>';
        });


        $grid->column('amount', __('Итоговая сумма, руб'));
        $grid->column('status', __('Статус'))->dot([
            'новый' => 'info',
            'в процессе' => 'warning',
            'выполнен' => 'success',
            'отменен' => 'danger',
        ], 'info');

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('created_at', __('Дата создания'));
        $show->field('updated_at', __('Дата обновления'));
        $show->field('user_id', __('ID пользователя'));
        $show->field('date_readiness', __('Дата желаемой выдачи'));
        $show->field('quantity', __('кол-во товаров'));
        $show->field('amount', __('Итоговая сумма'));
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
        $form = new Form(new Order());

        $form->belongsTo('user_id', UserSelectable::class,'Пользователь');
        $form->date('date_readiness',__('Дата желаемой выдачи'))->default(date('Y-m-d'));
        $form->number('quantity', __('кол-во товаров'));
        $form->number('amount', __('Итоговая сумма'));
        $form->select('status', __('Статус'))->options([
            1 => 'новый',
            2 => 'в процессе',
            3 => 'выполнен',
            4 => 'отменен',
        ]);

        return $form;
    }
}
