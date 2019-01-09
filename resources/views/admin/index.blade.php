

@section('main_content')
    <div class="layui-form">
    <form class="layui-form layui-form-pane" action="{{url('campaign/index')}}" method="post" id="form_add">
        <div class="layui-form-item">
            <label class="layui-form-label">计划名称:</label>
            <div class="layui-input-inline">
                {{--<input type="text" value="{{Input::get('name')}}" name="name" placeholder="根据计划名称过滤" class="layui-input">--}}
            </div>
            <label class="layui-form-label">审核状态</label>
            <div class="layui-input-inline">
                {{--<select name="verify_status" lay-verify="" lay-search="">--}}
                    {{--<option value="0">所有审核状态</option>--}}
                    {{--@foreach($verfiy_status as $key => $value)--}}
                        {{--@if ($key == Input::get('verify_status'))--}}
                            {{--<option selected="selected" value="{{$key}}">{{$value}}</option>--}}
                        {{--@else--}}
                            {{--<option value="{{$key}}">{{$value}}</option>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            </div>
            <label class="layui-form-label">广告状态</label>
            <div class="layui-input-inline">
                {{--<select name="status" lay-verify="" lay-search="">--}}
                    {{--<option value="0">所有状态</option>--}}
                    {{--@foreach($status as $key => $value)--}}
                        {{--@if ($key == Input::get('status'))--}}
                            {{--<option selected="selected" value="{{$key}}">{{$value}}</option>--}}
                        {{--@else--}}
                            {{--<option value="{{$key}}">{{$value}}</option>--}}
                        {{--@endif--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            </div>
            {{--@if($isShowAdv)--}}
                {{--<label class="layui-form-label">广告主</label>--}}
                {{--<div class="layui-input-inline">--}}
                    {{--<select name="advertiser_id" lay-verify="" lay-search="">--}}
                        {{--<option value="0">Id/广告主名</option>--}}
                        {{--@foreach($advertisers as $key => $value)--}}
                            {{--<option value="{{$value->id}}" @if ($value->id == Input::get('advertiser_id')) selected @endif>{{$value->name}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--@endif--}}
            <div class ="layui-inline">
                <button class="layui-btn" lay-submit>查询</button>
            </div>
            <div class ="layui-inline">
                <a class="layui-btn" href="{{url('campaign/create')}}">新建</a>
            </div>
            {{--@if ($verifyCampaign)--}}
                {{--<div class ="layui-inline">--}}
                    {{--<a class="layui-btn layui-btn-normal batchPass">批量审核</a>--}}
                {{--</div>--}}
            {{--@endif--}}
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
        <link rel="stylesheet" type="text/css" href="{{asset('loading/css/jquery.mloading.css')}}" />
        <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
        <script src="{{asset('loading/js/jquery.mloading.js')}}"></script>
        <table class="layui-table" lay-even="" lay-skin="row">
        <thead>
        <tr>
            {{--@if ($verifyCampaign)--}}
                {{--<th><input type="checkbox" name="all" lay-skin="primary" lay-filter="checkAll"></th>--}}
            {{--@endif--}}
            <th>Id</th>
            <th>名称</th>
            <!--<th>广告主</th>-->
            <th>素材</th>
            <th>日预算(元)</th>
            <th>出价(元)</th>
            <th>曝光</th>
            <th>点击</th>
            <th>消耗</th>
            <th>结算类型</th>
            <th>日期</th>
            <th>审核状态</th>
            <th>开启/暂停</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($items as $item)
            <tr id="item_{{$item->id}}">
                {{--@if ($verifyCampaign)--}}
                    {{--<td><input type="checkbox"   name="check_box_id" lay-skin="primary" lay-filter="checkOne" value="{{$item->id}}"></td>--}}
                {{--@endif--}}
                <td>{{$item->id}}</td>
                {{--<td><a href="#" style="color:#6a93de;" onclick="showUrl('广告计划详情','{{url('campaign/show')}}/{{$item->id}}')">{{$item->name}}</a></td>--}}
                {{--<!--<td style="color:#6a93de;">{{$item->advertiser->name}}</td>-->--}}
                {{--<td><a href="#" style="color:#6a93de;" onclick="showUrl('素材信息','{{url('campaign/showAd')}}/{{$item->id}}')">{{count($item->ads)}}</a></td>--}}
                {{--<td>{{$item->daily_budget}}</td>--}}
                {{--<td>{{$item->bid_price}}</td>--}}
                {{--<td>{{$item->all_imp}}</td>--}}
                {{--<td>{{$item->all_click}}</td>--}}
                {{--<td>{{$item->all_consume/100}}</td>--}}
                {{--<td>{{$chargeType[$item->charge_type]}}</td>--}}
                {{--<!--<td>{{implode(',',array_keys(json_decode($item->plat_form,true)))}}</td>-->--}}
                {{--<td>{{$item->start_date}}~{{$item->end_date}}</td>--}}
                {{--<td id="id_{{$item->id}}">{{$verfiy_status[$item->verify_status]}}</td>--}}
                {{--<td>--}}
                    {{--@if ($item->status ==1)--}}
                        {{--<input value="{{$item->id}}" name="open" lay-skin="switch"  checked="" lay-text="ON|OFF" lay-filter="switchTest" type="checkbox">--}}
                    {{--@else--}}
                        {{--<input value="{{$item->id}}" type="checkbox" name="close" lay-skin="switch" lay-text="ON|OFF" lay-filter="switchTest">--}}
                    {{--@endif--}}
                {{--</td>--}}
                    {{--<td>--}}
                        {{--<button onclick="showUrl('匹配素材','{{url("campaign/opMaterial")}}/{{$item->id}}',1050,550)"--}}
                                {{--class="layui-btn layui-btn-mini">--}}
                            {{--修改创意--}}
                        {{--</button>--}}
                        {{--<button onclick="window.location.href='{{url('campaign/edit')}}/{{$item->id}}'" class="layui-btn layui-btn-warm layui-btn-mini">--}}
                            {{--<i class="fa fa-edit"></i>编辑</button>--}}
                        {{--@if ($verifyCampaign)--}}
                            {{--<a class="layui-btn layui-btn-small layui-btn-danger verify_btn" material-id="{{$item->id}}" title="审核" material-name="{{$item->title}}">审核</a>--}}
                        {{--@endif--}}
                            {{--<a class="layui-btn layui-btn-small layui-btn-danger delete_btn" material-id="{{$item->id}}" title= "删除" material-name="{{$item->title}}">删除</a>--}}
                    {{--</td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    <script>
        layui.use('form', function(){
            var form = layui.form(),jq = layui.jquery;

            var layer = layui.layer;
            form.on('checkbox(checkAll)', function(data){
                if(data.elem.checked){
                    jq("input[type='checkbox'][name='check_box_id']").prop('checked',true);
                }else{
                    jq("input[type='checkbox'][name='check_box_id']").prop('checked',false);
                }
                form.render('checkbox');
            });

            form.on('checkbox(checkOne)', function(data){
                var is_check = true;
                if(data.elem.checked){
                    jq("input[lay-filter='checkOne']").each(function(){
                        if(!jq(this).prop('checked')){ is_check = false; }
                    });
                    if(is_check){
                        jq("input[lay-filter='checkAll']").prop('checked',true);
                    }
                }else{
                    jq("input[lay-filter='checkAll']").prop('checked',false);
                }
                form.render('checkbox');
            });
            jq('.verify_btn').click(function(){
                var name = jq(this).attr('material-name');
                var id = jq(this).attr('material-id');
                layer.open({
                    type: 2,
                    title: '广告计划审核',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['30%', '30%'],
                    content: ['{{url('campaign/batch_verify')}}/'+id ,'no']//iframe的url

                });
            });
            jq('.delete_btn').click(function(){
                var id = jq(this).attr('material-id');
                layer.confirm('确定要删除此广告计划么？', {
                    btn: ['确定','取消']
                }, function(){
                    $.post("{{url('campaign/delete')}}/"+id +"?_token={{ csrf_token() }}",function(data) {
                        hide();
                        if(data.code == 200) {
                            success("操作成功");
                            jq('#item_'+id).hide();
                        }
                        else {
                            error(data.msg);
                        }
                    },"json");
                }, function(){
                    layer.close();
                });
            });
            jq('.batchPass').click(function(){
                var ids = '';
                jq("input:checkbox[name='check_box_id']:checked").each(function() {
                    ids += $(this).val()+',';  // 每一个被选中项的值
                });
                if (ids =='') {
                    layer.msg('请选择广告计划');
                    return false;
                }
                layer.open({
                    type: 2,
                    title: '广告计划审核',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['30%', '30%'],
                    content: ['{{url('campaign/batch_verify')}}/'+ids ,'no']//iframe的url
                });
            });
            //监听指定开关
            //监听指定开关
            form.on('switch(switchTest)', function(data){
                $.ajax({
                    type: 'post',
                    url: "{{url('campaign/status')}}/"+this.value+"/"+(this.checked ? '1' : '2'),
                    data: $("#form_add").serialize(),
                    dataType:'json',
                    beforeSend: function () {
                        $("body").mLoading("show");
                    },
                    success: function(msg) {
                        if(msg.code == 200) {
                            layer.alert('操作成功', {
                                icon: 1,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            })
                        }else{
                            layer.alert('操作失败', {
                                icon: 5,
                                skin: 'layer-ext-moon' //该皮肤由layer.seaning.com友情扩展。关于皮肤的扩展规则，去这里查阅
                            })
                        }
                    },
                    complete: function () {
                        $("body").mLoading("hide");
                    }
                });
            });
        });
    </script>

