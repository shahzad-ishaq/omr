!function () {
    document.addEventListener("DOMContentLoaded", (function () {
        var e = document.querySelectorAll("[data-trigger]");
        /*    for (i = 0; i < e.length; ++i) {
                var a = e[i];
                new Choices(a, {
                    placeholderValue: "This is a placeholder set in the config",
                    searchPlaceholderValue: "Search"
                })
            }*/
        /**********************************************/
        $.ajax({
            url: "getInstitute",
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function (data) {
                ////console.log(data);
                var options = "<option selected value=''>Select Institute</option>";
                $.each(data, function (index, element) {
                    options += "<option  value='" + element.id + "'>" + element.institute_name + "</option>";
                });
                $('#institute_id').html(options).trigger('change');
                ////console.log(options);
            },
            beforeSend: function (xhr) {
                $('#institute_id').siblings('span.select-ajax-loader').show();
            },
            complete: function (jqXHR, textStatus) {
                $('#institute_id').siblings('span.select-ajax-loader').hide();
            }
        });
        /*********************************************/

    }));
    /***************************************************/
    $(document).ready(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
       /* $("#ImgUploadForm").click(function (e) {
            $('#add_data').attr('disabled', true);
            if ($('#id').val() != '') {
                var data = $("#ImgUploadForm").serializeArray();
                var url = "{{url('')}}";
                var message = "Update Successfully";
            } else {
                var data = $("#ImgUploadForm").serializeArray();
                var url = "addAnswerKey";
                var message = "Added Successfully";
                console.log(data);

            }



        });*/
    });
    /************************************************************/
    /* function add_grid_row(url, data, form_selector,message){*/

    $("#ImgUploadForm").submit(function (e) {
        e.preventDefault();
       ///$('#add_data').attr('disabled', true);
        var formData = new FormData(this);
        let TotalFiles = $('#files')[0].files.length; //Total files
        let files = $('#files')[0];
        for (let i = 0; i < TotalFiles; i++) {
            formData.append('files' + i, files.files[i]);
        }
        formData.append('TotalFiles', TotalFiles);
        if ($('#id').val() != '') {
            var url = "{{url('')}}";
            var message = "Update Successfully";
        } else {
            var url = "uploadImg";
            var message = "Added Successfully";
            console.log(formData);
        }

        $.ajax({
            url: url,
            data: formData,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            beforeSend: function (xhr) {
                ////$(".ajax_loader").html(ajax_loader);
            },
            complete: function (jqXHR, textStatus) {
                /// $(".ajax_loader").html("");
                if (jqXHR.status == 200) {
                    var result = jqXHR.responseText;
                    result = JSON.parse(result);
                    if (result.hasOwnProperty('success')) {
                        /*M.toast({html: message,classes: 'rounded'});*/
                        alert(message);
                        ///location.reload(); // then reload the page.(3)
                        return true;
                    } else if (result.hasOwnProperty('error')) {
                        //show_message(result.msg, "error");
                        if (result.hasOwnProperty("errors")) {
                            //show_ajax_errors_on_form(result.errors)

                        }
                        return false;
                    }
                } else {
                    //show_message("Contact Support - " + jqXHR.status, "error");
                    return false;
                }
            }
        });
    });


    flatpickr("#datepicker-basic"), flatpickr("#datepicker-datetime", {
        enableTime: !0,
        dateFormat: "m-d-Y H:i"
    }), flatpickr("#datepicker-humanfd", {
        altInput: !0,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d"
    }), flatpickr("#datepicker-minmax", {
        minDate: "today",
        maxDate: (new Date).fp_incr(14)
    }), flatpickr("#datepicker-disable", {
        onReady: function () {
            this.jumpToDate("2025-01")
        }, disable: ["2025-01-30", "2025-02-21", "2025-03-08", new Date(2025, 4, 9)], dateFormat: "Y-m-d"
    }), flatpickr("#datepicker-multiple", {
        mode: "multiple",
        dateFormat: "Y-m-d"
    }), flatpickr("#datepicker-range", {mode: "range"}), flatpickr("#datepicker-timepicker", {
        enableTime: !0,
        noCalendar: !0,
        dateFormat: "H:i"
    }), flatpickr("#datepicker-inline", {inline: !0})
}();

function getClass() {
    let institute_id = $('#institute_id').val();
    if (institute_id) {
        $.ajax({
            url: "getInstituteClass",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {institute_id: institute_id},
            success: function (data) {
                ///console.log(options);
                var options = "<option selected value=''>Select Class</option>";
                $.each(data, function (index, element) {
                    options += "<option  value='" + element.class_id + "'>" + element.name + "</option>";
                });
                $('#class_id').html(options).trigger('change');
            },
            beforeSend: function (xhr) {
                $('#class_id').siblings('span.select-ajax-loader').show();
            },
            complete: function (jqXHR, textStatus) {
                $('#class_id').siblings('span.select-ajax-loader').hide();
            }
        });
    }
}

function getSession() {
    let institute_id = $('#institute_id').val();
    let class_id = $('#class_id').val();
    if (class_id) {
        $.ajax({
            url: "getSession",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {institute_id: institute_id, class_id: class_id},
            success: function (data) {
                console.log(options);
                var options = "<option selected value=''>Select Sessions</option>";
                $.each(data, function (index, element) {
                    options += "<option  value='" + element.id + "'>" + element.sessions_title + "</option>";
                });
                $('#session_id').html(options).trigger('change');

            },
            beforeSend: function (xhr) {
                $('#session_id').siblings('span.select-ajax-loader').show();
            },
            complete: function (jqXHR, textStatus) {
                $('#session_id').siblings('span.select-ajax-loader').hide();
            }
        });
    }
}

function getGroup() {
    let class_id = $('#class_id').val();
    if (class_id) {
        $.ajax({
            url: "getClassGroup",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {class_id: class_id},
            success: function (data) {
                console.log(options);
                var options = "<option selected value=''>Select Group</option>";
                $.each(data, function (index, element) {
                    options += "<option  value='" + element.id + "'>" + element.class_group_title + "</option>";
                });
                $('#class_groups_id').html(options).trigger('change');

            },
            beforeSend: function (xhr) {
                $('#class_groups_id').siblings('span.select-ajax-loader').show();
            },
            complete: function (jqXHR, textStatus) {
                $('#class_groups_id').siblings('span.select-ajax-loader').hide();
            }
        });
    }
}

function getSubject() {
    let groups_id = $('#class_groups_id').val();
    if (groups_id) {
        $.ajax({
            url: "getSubject",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {groups_id: groups_id},
            success: function (data) {
                console.log(data);
                var options = "<option selected value=''>Select Subject</option>";
                $.each(data, function (index, element) {
                    options += "<option  value='" + element.id + "'>" + element.subject + "</option>";
                });
                $('#subject_id').html(options).trigger('change');

            },
            beforeSend: function (xhr) {
                $('#subject_id').siblings('span.select-ajax-loader').show();
            },
            complete: function (jqXHR, textStatus) {
                $('#subject_id').siblings('span.select-ajax-loader').hide();
            }
        });

    }
}


function getTest() {
    let class_id = $('#class_id').val();
    let subject_id = $('#subject_id').val();
    let groups_id = $('#class_groups_id').val();
    if (groups_id) {
        $.ajax({
            url: "getTest",
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {class_id: class_id, subject_id: subject_id, groups_id: groups_id},
            success: function (data) {
                console.log(data);
                var options = "<option selected value=''>Select Subject</option>";
                $.each(data, function (index, element) {
                    options += "<option  value='" + element.id + "'>" + element.name + "</option>";
                });
                $('#test_id').html(options).trigger('change');

            },
            beforeSend: function (xhr) {
                $('#test_id').siblings('span.select-ajax-loader').show();
            },
            complete: function (jqXHR, textStatus) {
                $('#test_id').siblings('span.select-ajax-loader').hide();
            }
        });
    }
}

$("#test_id").change(function (e) {
    $('input:radio').prop('checked', false);
    let institute_id = $('#institute_id').val();
    let class_id = $('#class_id').val();
    let subject_id = $('#subject_id').val();
    let groups_id = $('#class_groups_id').val();
    let session_id = $('#session_id').val();
    let test_id = $('#test_id').val();
    if (test_id) {
        if (groups_id) {
            $.ajax({
                url: "getAnswerKeyImg",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: 'json',
                data: {
                    institute_id: institute_id,
                    class_id: class_id,
                    session_id: session_id,
                    subject_id: subject_id,
                    groups_id: groups_id,
                    test_id: test_id
                },
                success: function (data) {
                    const obj = data['imgPath'];
                   if(obj){
                       $('#resultCompile').css({'display':'inline'})
                   }
                    $('#ansKeyId').val(data['ansKeyId']);
                    if(data['ansKeyId']!=null){
                        $('#files').css({'display':'inline'})
                    }
                    var imgHtml='<div class="row">';
                    $.each(obj, function (index, element) {
                       imgHtml += '<div class="col-xl-2 col-md-4 col-6">\n' +
                           '<div class="mt-4">\n' +
                           '<div class="img-fluid">\n' +
                           '<img style="height: 150px" src="'+element.path+'" alt="" class="img-fluid d-block">\n' +
                           '</div>\n' +
                           '</div>\n' +
                           '</div>';
                        console.log(element);
                    });
                    imgHtml+='</div>';
                    $('#imgDiv').html(imgHtml);
                }
            });
        }
    }
});
$("#resultCompile").click(function (e) {
    var ansKeyId = $('#ansKeyId').val();
    let class_id = $('#class_id').val();
    let groups_id = $('#class_groups_id').val();
    let session_id = $('#session_id').val();
    $.ajax({
        url: "compileResult",
        type: 'POST',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json',
        data: {ansKeyId:ansKeyId,class_id:class_id,groups_id:groups_id,session_id:session_id},
        success: function (data) {
            console.log(data);
        }
    });
});
/********************************************************************/

