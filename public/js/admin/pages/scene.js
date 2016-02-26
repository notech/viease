/**
 * 粉丝管理页 js
 *
 * @author overtrue <anzhengchao@gmail.com>
 */
define(['jquery', 'underscore', 'pager', 'util', 'admin/common'], function ($, _, Pager, Util) {
    $(function(){

        $(document).on('submit', '#new-scene', function(){
            var $params = Util.parseForm($('#new-scene'));

            console.log($params)

            Util.request('POST', 'scene/create', $params, function(){
                success('场景创建成功！');
                $('#new-scene-modal').modal('hide').find('form').get(0).reset();
            },function(err){
                return Util.formError($('#new-scene'), err.responseJSON);
            });

            return false;

            $fan.createGroup($params.group_name, function($group){
                $groupContainer.append($groupTemplate({groups: [$group]}));
                success('分组创建成功！');
                $('#new-scene-modal').modal('hide').find('form').get(0).reset();
            }, function(err){
                if (err.status == 422) {
                    return Util.formError($('#new-group'), err.responseJSON);
                };
            });

            return false;
        });
    });
});