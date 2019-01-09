<?php

namespace App\Admin\Controllers;

use App\Channel;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use function foo\func;
use  App\Admin\CheckRow;

class ChannelController extends Controller
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
    protected function grid()
    {
        return Admin::grid(Channel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->is_deleted('删除');
            $grid->created_at();
            $grid->updated_at();
            //自定义图标
            $grid->actions(function($actions){
               // $id = $actions->getKey();
               // var_dump($id);
                //$actions->prepend('<a href="http://www.skx.com/admin/channel/3/edit" title="查看" id="jsx"><i class="fa fa-eye"></i></a>');
                $actions->prepend('<a  href="http://www.skx.com/admin/channel/{$actions->getKey()}/jsx" title="查看"  data-id="{{$actions->getKey()}}"><i class="fa fa-eye"></i></a>');
               // $actions->append('<a href=""><i class="fa fa-paper-plane"></i></a>');
            });
//            $grid->actions(function ($actions) {
//                // 添加操作
//               $actions->append(new CheckRow($actions->getKey()));
//            });
        });
    }
    //
    public function jsx($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });

    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Channel::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
