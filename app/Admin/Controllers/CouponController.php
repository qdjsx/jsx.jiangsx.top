<?php

namespace App\Admin\Controllers;

use App\Channel;
use App\Coupon;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class CouponController extends Controller
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
            //var_dump($this->grid());die;
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
        //var_dump($id);die;
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');
        //var_dump($this->form()->edit($id));die;
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
        return Admin::grid(Coupon::class, function (Grid $grid) {


            $grid->id('ID')->sortable();
            $grid->title('名字');
            $grid->info('信息');
            $grid->is_deleted('删除');
            $grid->logo('logo');
            $grid->status('状态')->display(function ($a) {
                return $a == '-1' ? '状态-1' : '状态1';
            });
           // $grid->channel_id('渠道');
            //两表联查
//            $grid->column('channel.title','渠道');
            $grid->channel()->title('渠道');
            $grid->create_time('创建时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Coupon::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('title', '名称');
            $form->text('info', '信息');
            $form->text('needs_gold', '需要多少金币');
            //$form->text('status', '状态');
            $b = [
                '-1' => '状态-1',
                '1' => '状态1',

            ];
            //$form->select('status','状态')->options($b);
            $form->radio('status','状态')->options($b)->default('-1');

            // 竖排
           // $form->radio('status','状态')->options($b)->stacked();
            //俩表联查  渠道
            //$form->text('channel.title','渠道');
            $form->display('create_time', '创建时间');
            $form->datetime('create_time', '创建时间');
            //$form->image('logo')->move(date('Y-m-d'));
            //$form->image('logo');
            $form->file('logo');
            //文本输入框
            $a = Channel::pluck('title','id');
            //加上必填以及别的需求。
           $form->select('channel_id', '渠道')->options($a)->rules('required');;
        });
    }
}
