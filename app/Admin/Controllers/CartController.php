<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\UserSelectable;
use App\Models\Cart;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Encore\Admin\Widgets\Table;

class CartController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Корзина';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cart());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('Дата создания'))->width(190);
        $grid->column('updated_at', __('Дата обновления'))->width(190);
        $grid->column('user_id', __('ID пользователя'))->editable();
        $grid->column('session', __('Номер сессии'));

        $grid->column('quantity', 'Кол-во товаров')->expand(function ($model) {
            if ($model->products()->count() > 0) {
                $products = $model->products()->take(10)->get()->map(function ($product) {
                    return $product->only(['id', 'title', 'category_id', 'price', 'weight', 'expiration_date']);
                });

                return new Table(['ID', 'Название', 'Категория', 'Цена', 'Вес', 'Срок годности'], $products->toArray());
            }
            return '<p style="text-align: center; font-weight: 600"> В корзине нет товаров </p>';
        });


//        $grid->quantity('Кол-во товаров')->display(function ($quantity) {
//            return "<p style='background: #0a58ca'> $quantity </p>";
//        });

        $grid->column('amount', __('Общая сумма, руб'));

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
        $show = new Show(Cart::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('created_at', __('Дата создания'));
        $show->field('updated_at', __('Дата обновления'));
        $show->field('user_id', __('ID пользователя'));
        $show->field('session', __('Номер сессии'));
        $show->field('quantity', __('Кол-во товаров'));
        $show->field('amount', __('Общая сумма'));
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
        $form = new Form(new Cart());

        $form->belongsTo('user_id', UserSelectable::class,'Пользователь');
        $form->text('session', __('Номер сессии'));
        $form->number('quantity', __('Кол-во товаров'));
        $form->number('amount', __('Общая сумма'));

        return $form;
    }
}
