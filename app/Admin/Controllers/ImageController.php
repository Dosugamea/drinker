<?php

namespace App\Admin\Controllers;

use App\Image;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ImageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Image';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Image());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('order', __('Order'));
        $grid->column('path', __('Path'));
        $grid->column('thumbnail_large_path', __('Thumbnail large path'));
        $grid->column('thumbnail_medium_path', __('Thumbnail medium path'));
        $grid->column('thumbnail_small_path', __('Thumbnail small path'));
        $grid->column('user_id', __('User id'));
        $grid->column('image_target_type', __('Image target type'));
        $grid->column('image_target_id', __('Image target id'));

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
        $show = new Show(Image::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('order', __('Order'));
        $show->field('path', __('Path'));
        $show->field('thumbnail_large_path', __('Thumbnail large path'));
        $show->field('thumbnail_medium_path', __('Thumbnail medium path'));
        $show->field('thumbnail_small_path', __('Thumbnail small path'));
        $show->field('user_id', __('User id'));
        $show->field('image_target_type', __('Image target type'));
        $show->field('image_target_id', __('Image target id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Image());

        $form->number('order', __('Order'));
        $form->text('path', __('Path'));
        $form->text('thumbnail_large_path', __('Thumbnail large path'));
        $form->text('thumbnail_medium_path', __('Thumbnail medium path'));
        $form->text('thumbnail_small_path', __('Thumbnail small path'));
        $form->number('user_id', __('User id'));
        $form->text('image_target_type', __('Image target type'));
        $form->number('image_target_id', __('Image target id'));

        return $form;
    }
}
