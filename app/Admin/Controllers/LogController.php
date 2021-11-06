<?php

namespace App\Admin\Controllers;

use App\Log;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Log';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Log());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('body', __('Body'));
        $grid->column('price', __('Price'));
        $grid->column('count', __('Count'));
        $grid->column('user_id', __('User id'));
        $grid->column('beverage_id', __('Beverage id'));
        $grid->column('deleted_at', __('Deleted at'));

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
        $show = new Show(Log::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('body', __('Body'));
        $show->field('price', __('Price'));
        $show->field('count', __('Count'));
        $show->field('user_id', __('User id'));
        $show->field('beverage_id', __('Beverage id'));
        $show->field('deleted_at', __('Deleted at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Log());

        $form->text('body', __('Body'));
        $form->number('price', __('Price'));
        $form->number('count', __('Count'));
        $form->number('user_id', __('User id'));
        $form->number('beverage_id', __('Beverage id'));

        return $form;
    }
}
