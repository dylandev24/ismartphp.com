$(document).ready(function () {
    $(".remove").click(function () {
        if (confirm("Bạn có chắc chắn muốn xóa trường này!")) {
            var id = $(this).attr('data-id');
            var element = this;
            var data = {
                id: id
            };
            // alert(num_order);
            // console.log(data);
            $.ajax({
                // url: '?mod=page&controller=index&action=delete',
                type: 'POST',
                data: data,
                dataType: 'text',
                success: function (data) {

                    $(element).closest("tr").fadeOut();
                },
                error: function (a, ajaxOptions, b) {
                    alert(a.status);
                    alert(b);
                }
            })
        }
    });
    // Upload img
    $("#bt_upload").click(function () {
        // var data = new FormData(this);
        var inputFile = $('#images');
        var fileToUpload = inputFile[0].files;
        if (fileToUpload.length > 0) {
            // alert(fileToUpload.length);
            var formData = new FormData();
            for (var i = 0; i < fileToUpload.length; i++) {
                var file = fileToUpload[i];
                formData.append('file[]', file, file.name);
            }
            $.ajax({
                url: '?mod=product&action=addThumb',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (data) {
                    $("#result").html(data);
                    console.log(data);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }
            });
        }
        //alert('ok');
        return false;
    });
    $(".remove_post").click(function () {
        if (confirm("Bạn có chắc chắn muốn xóa trường này!")) {
            var id_post = $(this).attr('data-id');
            var element = this;
            var data = {
                id: id_post
            };
            // alert(num_order);
            // console.log(data);
            $.ajax({
                url: '?mod=post&controller=index&action=delete',
                type: 'POST',
                data: data,
                dataType: 'text',
                success: function (data) {
                    $(element).closest("tr").fadeOut();
                },
                error: function (a, ajaxOptions, b) {
                    alert(a.status);
                    alert(b);
                }
            })
        }
    });
    // pagination
    $("img").addClass('img-fluid');
    $(document).on('click', '.num_pagination', function () {
        var id_cat = $(this).attr('data-id');
        var page = $(this).attr('data-prd');
        $.ajax({
            type: "post",
            url: "?mod=product&controller=ajax",
            data: {
                id: id_cat,
                page: page
            },
            dataType: "json",
            success: function (data) {
                $("#featured-" + id_cat).html(data.html);
            }
        });
    });
});

$(document).ready(function () {
    $(".alert").delay(3000).fadeOut("slow");
});