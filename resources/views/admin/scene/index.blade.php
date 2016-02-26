@extends('admin.layout')
@section('content')
<div class="console-content">
    <div class="page-header">
        <h2 id="nav">场景管理
            <div class="pull-right"><button class="btn btn-success" href="#new-scene-modal" data-toggle="modal" data-target="#new-scene-modal" title="添加场景">添加场景</button></div>
        </h2>
    </div>
    <!-- Tab panes -->
    <div class="well row">
        <div class="col-md-12">
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>场景id</th>
                <th>场景名称</th>
                <th>场景标示</th>
                <th>二维码地址</th>
            </tr>
            </thead>
            <tbody>
            @foreach($scenes as $scene)
            <tr>
                <td>{{$scene->scene_id}}</td>
                <td>{{$scene->scene_name}}</td>
                <td>{{$scene->scene_sid}}</td>
                <td><img src="{{$scene->scene_code}}" width="80px" height="80px"></td>
            </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        {!! $scenes->render() !!}
    </div>
</div>

<div class="modal" id="new-scene-modal">
    <form id="new-scene" action="" method="post" class="form-horizontal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">添加分组</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="group-vname" class="col-md-3 control-label">场景命名：</label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="group-vname" class="col-md-3 control-label">场景：</label>
                        <div class="col-md-6">
                            <input type="text" id="scene" name="scene" class="form-control">
                        </div>
                    </div>
                    <input type="text" id="vname" name="vname" value="shop" class="form-control hidden">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary submit-group">确认</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/plain" class="form-template">
  <div class="form-container">
      <div class="panel panel-default">
          <div class="panel-heading">添加规则</div>
          <div class="panel-body">
          <form class="form-horizontal form-create">
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">规则名称</label>
                  <div class="col-lg-6">
                    <input type="text" name="name" class="form-control" id="inputEmail" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 control-label">类型</label>
                  <div class="col-lg-6">
                    <div class="radio">
                      <label>
                        <input type="radio" name="trigger_type" id="optionsRadios1" value="contain" checked="">
                        包含
                      </label>
                      <label>
                        <input type="radio" name="trigger_type" id="optionsRadios2" value="equal">
                        等于
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail" class="col-lg-2 control-label">关键词</label>
                  <div class="col-lg-6">
                    <input type="text" name="trigger_keywords" class="form-control" id="inputEmail" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-8 col-lg-offset-2">
                      <div class="response-media-picker">

                      </div>
                  </div>
                 </div>
                  <hr>
                <div class="form-group">
                  <div class="col-lg-6 col-lg-offset-2">
                    <input type="hidden" name="id" value="">
                    <button class="btn btn-default form-cancel">取消</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                  </div>
                </div>
            </form>
            </div>
      </div>
  </div>
</script>
@stop

@section('js')
<script>
    require(['pages/scene'])
</script>
@stop