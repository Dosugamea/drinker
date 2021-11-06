<?php

namespace App\Admin\Controllers;

use App\Beverage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BeverageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Beverage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Beverage());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('title', __('Title'));
        $grid->column('description', __('Description'));
        $grid->column('sell_start_on', __('Sell start on'));
        $grid->column('sell_end_on', __('Sell end on'));
        $grid->column('jan_code', __('Jan code'));
        $grid->column('user_id', __('User id'));

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
        $show = new Show(Beverage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('title', __('Title'));
        $show->field('description', __('Description'));
        $show->field('sell_start_on', __('Sell start on'));
        $show->field('sell_end_on', __('Sell end on'));
        $show->field('jan_code', __('Jan code'));
        $show->field('user_id', __('User id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Beverage());

        $form->text('title', __('Title'));
        $form->text('description', __('Description'));
        $form->date('sell_start_on', __('Sell start on'))->default(date('Y-m-d'));
        $form->date('sell_end_on', __('Sell end on'))->default(date('Y-m-d'));
        $form->number('jan_code', __('Jan code'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
