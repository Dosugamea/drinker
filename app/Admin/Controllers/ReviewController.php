<?php

namespace App\Admin\Controllers;

use App\Review;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReviewController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Review';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Review());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('title', __('Title'));
        $grid->column('star', __('Star'));
        $grid->column('body', __('Body'));
        $grid->column('user_id', __('User id'));
        $grid->column('beverage_id', __('Beverage id'));

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
        $show = new Show(Review::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('title', __('Title'));
        $show->field('star', __('Star'));
        $show->field('body', __('Body'));
        $show->field('user_id', __('User id'));
        $show->field('beverage_id', __('Beverage id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Review());

        $form->text('title', __('Title'));
        $form->decimal('star', __('Star'));
        $form->text('body', __('Body'));
        $form->number('user_id', __('User id'));
        $form->number('beverage_id', __('Beverage id'));

        return $form;
    }
}
