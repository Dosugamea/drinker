<?php

namespace App\Admin\Controllers;

use App\Rakuten;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RakutenController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Rakuten';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Rakuten());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('title', __('Title'));
        $grid->column('body', __('Body'));
        $grid->column('url', __('Url'));
        $grid->column('beverage_id', __('Beverage id'));
        $grid->column('shopName', __('ShopName'));
        $grid->column('price', __('Price'));

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
        $show = new Show(Rakuten::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('title', __('Title'));
        $show->field('body', __('Body'));
        $show->field('url', __('Url'));
        $show->field('beverage_id', __('Beverage id'));
        $show->field('shopName', __('ShopName'));
        $show->field('price', __('Price'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Rakuten());

        $form->text('title', __('Title'));
        $form->textarea('body', __('Body'));
        $form->url('url', __('Url'));
        $form->number('beverage_id', __('Beverage id'));
        $form->text('shopName', __('ShopName'));
        $form->number('price', __('Price'));

        return $form;
    }
}
