function openMenuMobile() {
    $(".menu-mb").width("250px");
    $(".btn-menu-mb").hide("slow");
}

function closeMenuMobile() {
    $(".menu-mb").width(0);
    $(".btn-menu-mb").show("slow");
}

$(function () {

    //  Contact validate
    $("form.form-contact").validate({
        rules: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            moible: {
                required: true
            },
            content: {
                required: true
            }
        },
        messages: {
            fullname: {
                required: "Vui lòng nhập họ và tên",
            },
            email: {
                required: "Vui lòng nhập email",
                email: "Email chưa đúng định dạng"
            },
            mobile: {
                required: "Vui lòng nhập số điện thoại",
            },
            content: {
                required: "Vui lòng nhập nội dung",
            }
        },
        errorClass: 'help-block',
        highlight: function (element) {
            $(element).parent().addClass('has-error'); // element là input hiện tại
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('has-error');
        },
        // submit form contact
        submitHandler: function (form) {
            var post_url = $(form).attr("action"); //get form action url
            var request_method = $(form).attr("method"); //get form GET/POST method
            var form_data = $(form).serialize(); //Encode form elements for submission
            $(".message").html('Hệ thống đang gởi email... Vui lòng chờ <i class="fas fa-sync fa-spin"></i>');
            $("button[type=submit]").attr("disabled", "disabled");// ngăn chặn nút submit tránh người dùng spam
            $.ajax({
                url: post_url,
                type: request_method,
                data: form_data
            })
                .done(function (data) {
                    $(".message").html(data);
                    $("button[type=submit]").removeAttr("disabled"); // gửi thành công nhả nút submit ra
                });
        }
    });

    // Thay đổi province
    $("main .province").change(function () {
        /* Act on the event */
        var province_id = $(this).val();

        if (!province_id) {
            updateSelectBox(null, "main .district");
            updateSelectBox(null, "main .ward");
            return;
        }

        $.ajax({
            url: `/address/${province_id}/districts`
        })
            .done(function (data) {
                updateSelectBox(data, "main .district");
                updateSelectBox(null, "main .ward");
            });

        // Shipping Fee
        if ($("main .shipping-fee").length) {
            $.ajax({
                url: `/shippingfree/${province_id}`,
            })
                .done(function (data) {
                    // update shipping fee and total on UI
                    let shipping_fee = Number(data);
                    let payment_total = Number($("main .total").attr("data")) + shipping_fee - Number($("main .voucher").attr("data"));

                    $("main .shipping-fee").html(number_format(shipping_fee) + "₫");
                    $("main .payment-total").html(number_format(payment_total) + "₫");
                });
        }
    });

    // Thay đổi district
    $("main .district").change(function (event) {
        /* Act on the event */
        var district_id = $(this).val();

        if (!district_id) {
            updateSelectBox(null, "main .ward");
            return;
        }

        $.ajax({
            url: `/address/${district_id}/wards`
        })
            .done(function (data) {
                updateSelectBox(data, "main .ward");
            });
    });

    // Thêm sản phẩm vào giỏ hàng ở chi tiết sản phẩm
    $("main .buy-in-detail").click(function (event) {
        /* Act on the event */
        var qty = $(this).prev("input").val();
        var product_id = $(this).attr("product-id");
        $.ajax({
            url: '/carts/add',
            type: 'GET',
            data: { product_id: product_id, qty: qty }
        })
            .done(function (data) {
                displayCart(data);

            });
    });

    // Thêm sản phẩm vào giỏ hàng
    $("main .buy").click(function (event) {
        var product_id = $(this).attr("product-id");
        $.ajax({
            type: "GET",
            url: "/carts/add",
            data: {
                product_id: product_id,
                qty: 1
            }
        })
            .done(function (data) {
                displayCart(data);
                console.log(data);
            });
    });

    // Register validate
    $("[name=registration]").validate({
        rules: {
            name: {
                required: true,
                maxlength: 100,
                regex: /^[a-zA￾ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i
            },
            mobile: {
                required: true,
                regex: /^0([0-9]{9,9})$/
            },
            email: {
                required: true,
                email: true,
                remote: "/existingEmail"
            },
            password: {
                required: true,
                regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
            hiddenRecaptcha: {
                required: function () {
                    if (grecaptcha.getResponse() == '') {
                        return true;
                    } else {
                        return false;
                    }
                }
            }
        },
        messages: {
            name: {
                required: 'Vui lòng nhập họ và tên',
                regex: 'Phải thỏa mãn mẫu ký tự thông thường, không có số, ký tự đặc biệt',
                maxlength: 'Chiều dài tối đa không quá 100 ký tự'
            },
            mobile: {
                required: 'Vui lòng nhập số điện thoại',
                regex: 'Thỏa mãn mẫu bắt đầu là số 0, sau đó là 9 số'
            },
            email: {
                required: 'Vui lòng nhập email',
                email: 'Vui lòng nhập đúng định dạng email',
                remote: 'Email đã tồn tại'
            },
            password: {
                required: 'Vui lòng nhập password',
                regex: 'Phải thỏa mãn mẫu đã học bao gồm số, ký tự, đặc biệt, chữ hoa, chữ thường'
            },
            password_confirmation: {
                required: 'Vui lòng nhập lại mật khẩu',
                equalTo: 'Mật khẩu chưa khớp'
            },
            hiddenRecaptcha: {
                required: 'Vui lòng xác nhận google recaptcha'
            }
        },
        errorClass: 'help-block',
        highlight: function (element) {
            $(element).parent().addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('has-error');
        }
    });

    $.validator.addMethod( // cái này cần có để validate regex
        "regex",
        function (value, element, regexp) {
            if (regexp.constructor != RegExp)
                regexp = new RegExp(regexp);
            else if (regexp.global)
                regexp.lastIndex = 0;
            return this.optional(element) || regexp.test(value);
        },
        "Please check your input."
    );

    // Login validate
    $("#login").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            email: {
                required: "Vui lòng nhập email",
                email: "Email chưa đúng định dạng"
            },
            password: {
                required: "Vui lòng nhập password",
            }
        },
        errorClass: 'help-block',
        highlight: function (element) {
            $(element).parent().addClass('has-error'); // element là input hiện tại
        },
        unhighlight: function (element) {
            $(element).parent().removeClass('has-error');
        }
    });

    // Submit đánh giá sản phẩm
    $("form.form-comment").submit(function (event) {
        /* Act on the event */
        event.preventDefault(); //prevent default action
        var post_url = $(this).attr("action"); //get form action url
        var request_method = $(this).attr("method"); //get form GET/POST method
        var form_data = $(this).serialize(); //Encode form elements for submission

        $.ajax({
            url: post_url,
            type: request_method,
            data: form_data,
        })
            .done(function (data) {
                Swal.fire(
                    'Cảm ơn bạn đã bình luận!',
                    'success'
                );
                $(".comment-list").html(data);
                updateAnsweredRating();
            });
    });

    // Ajax search
    var timeout = null;
    $("header form.header-form .search").keyup(function (event) {
        clearTimeout(timeout);
        var pattern = $(this).val();
        $(".search-result").empty();
        timeout = setTimeout(function () {
            if (pattern) {
                $.ajax({
                    type: "GET",
                    url: "/san-pham/search",
                    data: { pattern: pattern }
                })
                    .done(function (data) {
                        $(".search-result").html(data);
                        $(".search-result").show();
                    });
            }
        }, 500);
    });

    // Tìm kiếm và sắp xếp theo sản phẩm
    $("#sort-select").change(function (event) {
        var dataUrl = $(this).children("option:selected").attr("data-url");
        window.location.href = dataUrl;
    });

    // Tìm kiếm theo range
    $('main .price-range input').click(function (event) {
        var price_range = $(this).val();
        window.location.href = "?price-range=" + price_range;
    });

    $(".product-container").hover(function () {
        $(this).children(".button-product-action").toggle(400);
    });

    // Display or hidden button back to top
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $(".back-to-top").fadeIn();
        }
        else {
            $(".back-to-top").fadeOut();
        }
    });

    // Khi click vào button back to top, sẽ cuộn lên đầu trang web trong vòng 0.8s
    $(".back-to-top").click(function () {
        $("html").animate({ scrollTop: 0 }, 800);
    });

    // Hiển thị form đăng ký
    $('.btn-register').click(function () {
        $('#modal-login').modal('hide');
        $('#modal-register').modal('show');
    });

    // Hiển thị form forgot password
    $('.btn-forgot-password').click(function () {
        $('#modal-login').modal('hide');
        $('#modal-forgot-password').modal('show');
    });

    // Hiển thị form đăng nhập
    $('.btn-login').click(function () {
        $('#modal-login').modal('show');
    });

    // Fix add padding-right 17px to body after close modal
    // Don't rememeber also attach with fix css
    $('.modal').on('hide.bs.modal', function (e) {
        e.stopPropagation();
        $("body").css("padding-right", 0);

    });

    // Hiển thị cart dialog
    $('.btn-cart-detail').click(function () {
        $('#modal-cart-detail').modal('show');
    });

    // Hiển thị aside menu mobile
    $('.btn-aside-mobile').click(function () {
        $("main aside .inner-aside").toggle();
    });

    // Hiển thị carousel for product thumnail
    $('main .product-detail .product-detail-carousel-slider .owl-carousel').owlCarousel({
        margin: 10,
        nav: true

    });

    // Bị lỗi hover ở bộ lọc (mobile) & tạo thanh cuộn ngang
    // Khởi tạo zoom khi di chuyển chuột lên hình ở trang chi tiết
    // $('main .product-detail .main-image-thumbnail').ezPlus({
    //     zoomType: 'inner',
    //     cursor: 'crosshair',
    //     responsive: true
    // });

    // Cập nhật hình chính khi click vào thumbnail hình ở slider
    $('main .product-detail .product-detail-carousel-slider img').click(function (event) {
        /* Act on the event */
        $('main .product-detail .main-image-thumbnail').attr("src", $(this).attr("src"));
        var image_path = $('main .product-detail .main-image-thumbnail').attr("src");
        $(".zoomWindow").css("background-image", "url('" + image_path + "')");

    });

    $('main .product-detail .product-description .rating-input').rating({
        min: 0,
        max: 5,
        step: 1,
        size: 'md',
        stars: "5",
        showClear: false,
        showCaption: false
    });

    $('main .product-detail .product-description .answered-rating-input').rating({
        min: 0,
        max: 5,
        step: 1,
        size: 'md',
        stars: "5",
        showClear: false,
        showCaption: false,
        displayOnly: false,
        hoverEnabled: true
    });

    $('main .ship-checkout[name=payment_method]').click(function (event) {
        /* Act on the event */
    });

    $('input[name=checkout]').click(function (event) {
        /* Act on the event */
        window.location.href = "/payment/checkout";
    });

    $('input[name=back-shopping]').click(function (event) {
        /* Act on the event */
        window.location.href = "/san-pham";
    });

    // Hiển thị carousel for relative products
    $('main .product-detail .product-related .owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1000: {
                items: 5
            }
        }

    });
});

// Login in google
function onSignIn(googleUser) {
    var id_token = googleUser.getAuthResponse().id_token;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://study.com/register/google/backend/process.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        console.log('Signed in as: ' + xhr.responseText);
    };
    xhr.send('idtoken=' + id_token);
}

// Hiển thị những rating của những đánh giá
function updateAnsweredRating() {
    $('main .product-detail .product-description .answered-rating-input').rating({
        min: 0,
        max: 5,
        step: 1,
        size: 'md',
        stars: "5",
        showClear: false,
        showCaption: false,
        displayOnly: false,
        hoverEnabled: true
    });
}

// Hiển thị giỏ hàng
function displayCart(data) {
    var cart = JSON.parse(data);

    var count = cart.count;
    $(".btn-cart-detail .number-total-product").html(count);

    var subtotal = cart.subtotal;
    $("#modal-cart-detail .price-total").html(subtotal + "đ");

    var items = cart.items;
    $("#modal-cart-detail .cart-product").html(items)
}

// Xóa 1 item trong giỏ hàng
function deleteProductInCart(rowId) {
    $.ajax({
        type: "GET",
        url: `/carts/delete/${rowId}`,
    })
        .done(function (data) {
            displayCart(data);
        });
}

// Thay đổi số lượng sản phẩm trong giỏ hàng
function updateProductInCart(self, rowId) {
    var qty = $(self).val();
    $.ajax({
        type: "GET",
        url: `/carts/update/${rowId}/${qty}`,
    })
        .done(function (data) {
            displayCart(data);
        });
}

// Hàm update thông tin province
function updateSelectBox(data, selector) {
    var items = JSON.parse(data);
    $(selector).find('option').not(':first').remove();
    if (!data) return;
    for (let i = 0; i < items.length; i++) {
        let item = items[i];
        let option = '<option value="' + item.id + '"> ' + item.name + '</option>';
        $(selector).append(option);
    }
}
