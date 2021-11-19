<?php

namespace App\Admin\Controllers;

use App\Vote;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class VoteController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Vote';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Vote());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('votes', __('Votes'));
        $grid->column('user_id', __('User id'));
        $grid->column('vote_target_type', __('Vote target type'));
        $grid->column('vote_target_id', __('Vote target id'));

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
        $show = new Show(Vote::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('votes', __('Votes'));
        $show->field('user_id', __('User id'));
        $show->field('vote_target_type', __('Vote target type'));
        $show->field('vote_target_id', __('Vote target id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Vote());

        $form->switch('votes', __('Votes'));
        $form->number('user_id', __('User id'));
        $form->text('vote_target_type', __('Vote target type'));
        $form->number('vote_target_id', __('Vote target id'));

        return $form;
    }
}
