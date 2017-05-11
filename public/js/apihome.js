/**
 * Created by diao on 17-5-10.
 */

$(function () {
    $('#search_btn').click(function () {
        $.post('/manage/queryApiInfo',
            {
                id: $('#search_id').val(),
                project: $('#search_project').val(),
                path: $('#search_path').val()
            },
            function (callback) {
                var obj = JSON.parse(callback);
                $('tbody').html('');
                $.each(obj, function (i, item) {
                    var tr = '<tr>';
                    tr += '<td>' + item.id + '</td>';
                    tr += '<td>' + item.project + '</td>';
                    tr += '<td>' + item.path + '</td>';
                    tr += '<td>' + item.key + '</td>';
                    tr += '<td>' + item.params + '</td>';
                    tr += '<td>' + item.expect + '</td>';
                    tr += '<td><a href="#" onclick="showModal(1)" data-id="' + item.id + '">编辑</a> <a href="#" data-id="' + item.id + '">删除</a></td>';
                    $('tbody').append(tr);
                });
            });
    });

    $('#add_save').click(function () {
        $.post('/manage/addApiInfo',
            {
                data: {
                    'project': $('#project').val(),
                    'path': $('#path').val(),
                    'key': $('#key').val(),
                    'params': $('#params').val(),
                    'expect': $('#expect').val()
                }
            },
            function (callback) {
                location.reload();
            })
    });
});

function showModal(flag) {
    var add_btn = document.getElementById('add_save');
    var update_btn = document.getElementById('update_save');
    if (flag === 0) {
        add_btn.style.display = 'block';
        update_btn.style.display = 'none';
    }
    if (flag === 1) {
        add_btn.style.display = 'none';
        update_btn.style.display = 'block';
    }
    $('#myModal').modal('show');
}