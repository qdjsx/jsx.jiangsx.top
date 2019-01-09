<?php

namespace App\Admin\Controllers;

use App\Movie;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

use Encore\Admin\Auth\Permission;

class MovieController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        //修改权限，有两种方式，这是显示但是点击无效的方式
        Permission::check('edit-movie');  //检查的是slug
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        //创建方法。只有这一种形式。
        Permission::check('create-movie');
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */

    ///这个是显示的页面，便利、
    protected function grid()
    {
        return Admin::grid(Movie::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name();
            $grid->created_at();
            $grid->updated_at();
            //删除权限
            $grid->actions(function ($actions) {

                // 没有`delete-image`权限的角色不显示删除按钮(只有这一种，这是但删除，不好用。因为还有群删除)
                if (!Admin::user()->can('delete-movie')) {
                    $actions->disableDelete();
                }
                //编辑按钮，两种方法，这个是不显示，上面edit里面是显示但是点击无效。
                if (!Admin::user()->can('edit')) {
                    $actions->disableEdit();
                }
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    //编辑的时候用
    protected function form()
    {
        return Admin::form(Movie::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '名字');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
