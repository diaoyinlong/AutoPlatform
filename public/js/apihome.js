/**
 * Created by diao on 17-5-10.
 */

$(function () {
    $('#add').click(function () {
        $('#myModal').modal('show');
    });

    $('#search_btn').click(function () {
        $.post('/manage/queryApiInfo',
            {
                id: $('#search_id').val(),
                project: $('#search_project').val()
            },
            function (callback) {
                var obj = JSON.parse(callback);
                $('tbody').html('');
                $.each(obj, function (i, item) {
                    var tr = '<tr>';
                    tr += '<td>' + item['id'] + '</td>';
                    tr += '<td>' + item['project'] + '</td>';
                    tr += '<td>' + item['path'] + '</td>';
                    tr += '<td>' + item['key'] + '</td>';
                    tr += '<td>' + item['params'] + '</td>';
                    tr += '<td>' + item['expect'] + '</td>';
                    tr += '<td><a href="#">编辑</a> <a href="#">删除</a></td>';
                    $('tbody').append(tr);
                });

                return false;
            });
    });
});