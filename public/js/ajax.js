$(document).ready(function () {
    $('.num-order').change(function () {
        var id = $(this).attr('data-id');
        var qty = $(this).val();
        var data = {
            id: id,
            qty: qty
        };
        $.ajax({
            url: "?mod=cart&action=update",
            method: "POST",
            data: data,
            dataType: "json",
            success: function (data) {
                $("#sub-total-" + id).html(data.total_price);
                $("#total-price span").html(data.total);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        })
    });
    // =====================================================================
    //######################### ADD TO CART #################################
    // =====================================================================
    $('.add-cart').click(function () {

        var id = $(this).attr('data-id-product');
        $.ajax({
            url: "?mod=cart&action=add",
            method: "GET",
            data: {
                id: id
            },
            dataType: "json",
            success: function (data) {
                // $("span#num").text(data.count);
                // $("span#count").text(data.count + " sản phẩm");
                // $(".img_cart").html(data.image);
                // $(".info a#name").html(data.name);
                // $("#price").text(data.price);
                // $("qty").text(data.qty);
                swal({
                        cancelButtonColor: "#DD6B55",
                        confirmButtonColor: "#DD6B55",
                        title: "",
                        text: "Thêm thành công !",
                        icon: "success",
                        buttons: {
                            catch: {
                                text: "Đến giỏ hàng",
                                value: "catch",
                                className: 'sweet-catch'
                            },
                            cancel: "Đóng",
                        },
                    })
                    .then((value) => {
                        switch (value) {
                            case "catch":
                                window.location = "?mod=cart";
                                break;
                        }
                    });
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        })
    });

    //==============================================================
    //-------------------- DELETE PRODUCT --------------------------
    //==============================================================
    $(".del-product").click(function () {
        if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này!")) {
            var id = $(this).attr('data-id');
            var element = this;
            var data = {
                id: id
            };
            $.ajax({
                url: "?mod=cart&action=delete",
                method: "GET",
                data: data,
                dataType: "json",
                success: function (data) {
                    $("span#num").text(data.count);
                    $("#total-price").html("Tổng giá: <span id><span> " + data.total);
                    $(element).closest("tr").fadeOut();
                }
            });
        };
    });
    //==============================================================
    //-------------------- Bộ lọc sản phẩm --------------------------
    //==============================================================

    filter_data();

    function filter_data() {
        var brand = [];
        $("input[type='checkbox']:checked").each(function () {
            brand.push($(this).val());
        })
        var action = '';
        var price = $("#sort_price").val();
        var price_prd = $("#price_prd").val();
        var id = $(".cat_prd").attr('id');
        $.ajax({
            url: '?mod=product&controller=ajax&action=index',
            type: "post",
            dataType: "text",
            data: {
                price: price,
                price_prd: price_prd,
                brand: brand,
                action: action,
                id: id,
            },
            success: function (data) {
                $('.filter_data').html(data);
                // console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    }

    // function get_filter(class_name) {
    //     var filter = [];
    //     $('.' + class_name + ':checked').each(function () {
    //         filter.push($(this).val());
    //     });
    //     return filter;
    // }
    $(".brand-selector").click(function () {
        filter_data();
    });
    $("#sort_price").change(function () {
        filter_data();
    });
    $("#price_prd").change(function () {
        filter_data();
    });

    $(".cat_prd").click(function () {
        filter_data();
    })

    // Phân trang

    // function load_prd(page) {
    //     $.ajax({
    //         url: '?mod=product&controller=ajax&action=pagination',
    //         type: "post",
    //         data: {
    //             page_no: page
    //         },
    //         dataType: "text",
    //         success: function (data) {
    //             $('.filter_data').html(data);
    //             console.log(data);
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status);
    //             alert(thrownError);
    //         }
    //     });
    // }
    // load_prd();
    // $("ul.pagging a").click(function () {
    //     alert('ok');
    //     var page_id = $(this).attr('id');
    //     load_prd(page);
    // });
})