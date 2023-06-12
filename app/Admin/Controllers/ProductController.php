<?php

namespace App\Admin\Controllers;

use App\Admin\Selectable\CategorySelectable;
use App\Admin\Selectable\SizeSelectable;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Продукция';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('Дата создания'))->width(190);
        $grid->column('updated_at', __('Дата обновления'))->width(190);
//        $grid->column('title', __('Название'));
        $grid->column('slug', __('Слаг'))->width(100);
        $grid->column('category.title', __('Категория'));

        $grid->column('title', __('Название'))->width(130)->expand(function ($model) {
            if ($model->special_ingredients()->count() > 0) {
                $special_ingredients = $model->special_ingredients()->take(10)->get()->map(function ($special_ingredient) {
                    return $special_ingredient->only(['id', 'name']);
                });

                return new Table(['ID', 'Название'], $special_ingredients->toArray());
            }
            return '<p style="text-align: center; font-weight: 600"> Особые игредиенты отсутствуют </p>';
        });



        $grid->column('size.name', __('Размер'));
        $grid->column('expiration_date', __('Срок годности, в ч.'))->width(90);
        $grid->column('product_value', __('Пищевая ценность'));
        $grid->column('description', __('Описание'))->limit(60);
        $grid->column('ingredients', __('Состав'))->limit(60);
        $grid->column('weight', __('Вес, г'))->width(80);
        $grid->column('price', __('Цена, руб'))->width(100);
        $grid->column('photo', __('Фото'))->image('http://sweetshop.com/', 100, 100);
        $grid->column('status', __('Статус'))->bool(['active' => true, 'inactive' => false]);

        $grid->column('category_id', __('ID категории'))->hide();
        $grid->column('size_id', __('ID размера'))->hide();

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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('created_at', __('Дата создания'));
        $show->field('updated_at', __('Дата обновления'));
        $show->field('title',__('Название'));
        $show->field('slug', __('Слаг'));
        $show->field('category_id', __('ID категории'));
        $show->field('size_id', __('ID размера'));
        $show->field('expiration_date',  __('Срок годности'));
        $show->field('product_value', __('Пищевая ценность'));
        $show->field('description', __('Описание'))->limit(60);
        $show->field('ingredients', __('Состав'))->limit(60);
        $show->field('weight', __('Вес'));
        $show->field('price', __('Цена'));
        $show->field('photo',  __('Фото'));
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
        $form = new Form(new Product());

        $form->text('title', __('Название:'));
        $form->text('slug', __('Слаг:'));
        $form->belongsTo('category_id', CategorySelectable::class,'Категория:');
        $form->belongsTo('category_id', SizeSelectable::class,'Размер:');
        $form->number('expiration_date', __('Срок годности, ч:'));
        $form->text('product_value', __('Пищевая ценность:'));
        $form->textarea('description', __('Описание:'));
        $form->textarea('ingredients', __('Состав:'));
        $form->number('weight', __('Вес, г:'));
        $form->number('price', __('Цена, руб:'));
        $form->text('photo', __('Фото:'));
        $form->radio('status', __('Статус:'))->options(['active' => 'Активный', 'inactive'=> 'Неактивный'])->default('Неактивный');
        return $form;
    }
}
