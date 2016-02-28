'use strict';

var $main = {};

$main.initSearch = function() {
    var self = this;
    var listColumns = self.listColumns;
    var actions = {
        "data": null,
        "render": function(data) {
            return '<div class="text-center"><a href="'+ self.getListPath() +'/edit/'+data.id+'"><i class="fa fa-pencil"></i></a>'+
                '<a class="action-remove" href="#"><i class="fa fa-trash"></i></a></div>';
        },
        "orderable": false
    };
    listColumns.push(actions);
    $main.table = $('#data-table').DataTable({
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": self.getListPath(),
            "type": "post",
            "data": {
                '_token': $main.token
            }
        },
        "columns": listColumns,
        "order": [[0, "desc"]]
    });
    $('#data-table tbody').on('click', '.action-remove', function() {
        var data = $main.table.row($(this).parents('tr')).data();
        $main.confirmModal = $main.getConfirmModal();
        $main.confirmModal.modal();
        $('.delete', $main.confirmModal).on('click', function() {
            self.deleteObj(data.id);
            return false;
        });
        return false;
    });
};

$main.deleteObj = function(id) {
    var self = this;
    $.ajax({
        method: 'post',
        url: self.getListPath()+'/delete/'+id,
        data: {_token: $main.token},
        dataType: 'json',
        success: function(result) {
            if (result.status == 'OK') {
                $main.confirmModal.modal('hide');
                $main.table.ajax.reload();
            } else {
                alert('Error delete');
            }
        }
    });
};

$main.getListPath = function() {
    return this.listPath;
};

$main.getConfirmModal = function() {
    return $('<div id="delete-confirm" class="modal fade" tabindex="-1" role="dialog">'+
               '<div class="modal-dialog">'+
                   '<div class="modal-content">'+
                       '<div class="modal-header">'+
                           '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                           '<h4 class="modal-title">'+ $trans.get('admin.base.label.delete') +'</h4>'+
                       '</div>'+
                       '<div class="modal-body">'+$trans.get('admin.delete.modal.text')+
                       '</div>'+
                       '<div class="modal-footer">'+
                           '<button type="button" class="btn btn-default" data-dismiss="modal">'+ $trans.get('admin.base.label.close') +'</button>'+
                           '<button type="button" class="btn btn-primary delete">'+ $trans.get('admin.base.label.delete') +'</button>'+
                       '</div>'+
                   '</div>'+
               '</div>'+
           '</div>');
};

$main.removeErrors = function() {
    var form = $main.form;
    $('.form-error', form).text('');
    $('.form-group', form).removeClass('has-error');
};

$main.showErrors = function(errors) {
    for (var i in errors) {
        $('#form-error-'+i.replace(/\./g, '_')).text(errors[i][0]).closest('.form-group').addClass('has-error');
    }
};

$main.save = function() {
    var self = this,
        form = $main.form;
    if ($('.nav-btn', form).prop('disabled')) {
        return false;
    }
    $('.nav-btn', form).prop('disabled', true);
    $.ajax({
        method: 'post',
        url: form.attr('action'),
        data: form.serializeArray(),
        dataType: 'json',
        success: function(result) {
            $main.removeErrors();
            if (result.status == 'OK') {
                //alert('Saved successfully');
                document.location.href = self.getListPath();
            } else if (result.status == 'UNAUTHORIZED') {
                document.location.href = result.path;
            } else {
                $main.showErrors(result.errors);
            }
            $('.nav-btn', form).prop('disabled', false);
        }
    });
};

$main.initForm = function() {
    var self = this;
    $main.form = $('#edit-form');
    $main.form.submit(function() {
        self.save();
        return false;
    });
};

$main.init = function() {
    var self = this;
    $(document).ready(function() {
        if ($('#data-table').length > 0) {
            self.initSearchPage();
        } else {
            self.initEditPage();
        }
    });
};

var $trans = function() {
    return $trans.get.apply(arguments);
};
$trans.transMap = null;

$trans.get = function (key, paramData) {
    try {
        if ($trans.transMap  == null) {
            var locSettings = $locSettings || {};
            $trans.transMap = locSettings.trans || {};
        }
        if (typeof $trans.transMap[key] != "undefined") {
            key = $trans.transMap[key];
            if (paramData) {
                for (var i in paramData) {
                    if (paramData.hasOwnProperty(i)) {
                        key = key.replace("{"+i+"}",paramData[i]);
                    }
                }
            }
            return key;
        }
    }
    catch(e){}
    return key;
};