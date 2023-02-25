$(document).ready(function () {
  $("body").on("click", "#resultApproveOrder", function () {
    location.reload();
  });
});

function modalEditReceiver() {
  $("#modalEditReceiver").modal("show");
  $("#pickProvince_0_chosen").css("width", "100%");
  $("#pickDistrict_0_chosen").css("width", "100%");
  $("#pickWard_0_chosen").css("width", "100%");
}

function modalEditGoodsInfo() {
  $("#modalEditGoodsInfo").modal("show");
  $("#productCategory_chosen").css("width", "100%");
}

function editProductOrderDetail(keyProduct) {
  var productName = $(".productName_" + keyProduct).val();
  var productCod = $(".productCod_" + keyProduct).val();
  var productValue = $(".productValue_" + keyProduct).val();
  var productCateId = $(".productCateId_" + keyProduct).val();
  var productQuantity = $(".productQuantity_" + keyProduct).val();
  $(".editProduct").show();
  $(".productTextName").val(productName);
  $(".productTextCOD").val(new Intl.NumberFormat().format(productCod));
  $(".productTextValue").val(new Intl.NumberFormat().format(productValue));
  $(".productTextCategory").val(productCateId).trigger("chosen:updated");
  $(".productTextQuantity").val(productQuantity);
  $(".saveProduct").attr(
    "onclick",
    "saveProductOrderDetail(" + keyProduct + ")"
  );
}

function saveProductOrderDetail(keyProduct) {
  $(".editProduct").hide();
  var productCOD = $(".productTextCOD").val().replace(/\,/g, "");
  var productQuantity = $(".productTextQuantity").val().replace(/\,/g, "");

  //Update HTML
  $(".success_cod_" + keyProduct).html(
    new Intl.NumberFormat().format(productCOD * productQuantity)
  );
  //Update value
  $(".productCod_" + keyProduct).val(productCOD);

  //Clear Value
  $(".productTextName").val("");
  $(".productTextCOD").val("0");
  $(".checkProductValue").attr("checked");
  $(".productTextValue").val("0");
  $(".productTextCategory").val("0").trigger("chosen:updated");
  $(".productTextQuantity").val("1");
  $(".saveProduct").attr("onclick", "saveProductOrderDetail(-1)");
}

function changeGoodsInfo(orderId, typeOrder = 1) {
  // typeOrder: 1 - sp, 2 -km

  lengthProducts = $(".lengthProducts").val();
  var arrCod = new Array();
  var cod = 0;
  for (i = 0; i < lengthProducts; i++) {
    cod = $(".productCod_" + i).val();
    arrCod.push(cod);
  }
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/changeInfoOrder",
    type: "post",
    dataType: "json",
    data: {
      arrCod: arrCod,
      orderId: orderId,
      typeOrder: typeOrder,
    },
    success: function (res) {
      if (res.success) {
        location.reload();
      } else {
        if (res.status == 1) {
          $("#loader").removeClass("show");
          $("#modalConfirmChangeRefund").modal("show");
          $(".bodyCheckCodValueText").html(res.data);
        } else {
          location.reload();
        }
      }
    },
    error: function (res) {
      console.log(res);
      location.reload();
    },
  });
}

function changeReceiverInfo(orderId) {
  var receiverName = $(".receiverName_0_0").val();
  var receiverPhone = $(".receiverPhone_0_0").val();
  var receiverAddress = $(".receiverAddress_0").val();
  var receiverProvinceCode = $(".pickProvince").val();
  var receiverDistrictCode = $(".pickDistrict").val();
  var receiverWardCode = $(".pickWard").val();
  var error = 0;
  if (receiverName == "") {
    $(".err_receiverName_0_0").html("Tên người nhận không được bỏ trống");
    error = 1;
  }

  if (receiverPhone == "") {
    $(".err_receiverPhone_0_0").html("Số điện thoại không được bỏ trống");
    error = 1;
  } else {
    checkreceiverPhone = validatePhone(receiverPhone);
    if (!checkreceiverPhone) {
      $(".err_receiverPhone_0_0").html("Số điện thoại không hợp lệ");
      error = 1;
    }
  }
  if (receiverAddress == "" || receiverAddress == null) {
    $(".err_receiverAddress").html("Địa chỉ người gửi không được để trống");
    error = 1;
  }
  if (
    receiverProvinceCode == "" ||
    receiverProvinceCode == null ||
    receiverProvinceCode == 0
  ) {
    $(".err_pickProvince").html("Tỉnh/thành người gửi không được để trống");
    error = 1;
  }
  if (
    receiverDistrictCode == "" ||
    receiverDistrictCode == null ||
    receiverDistrictCode == 0
  ) {
    $(".err_pickDistrict").html("Quận/huyện người gửi không được để trống");
    error = 1;
  }
  if (
    receiverWardCode == "" ||
    receiverWardCode == null ||
    receiverWardCode == 0
  ) {
    $(".err_pickWard").html("Phường/xã người gửi không được để trống");
    error = 1;
  }
  if (error == 0) {
    $("#loader").addClass("show");
    $.ajax({
      url: "/vi/changeInfo",
      type: "post",
      dataType: "json",
      data: {
        receiverName: receiverName,
        receiverPhone: receiverPhone,
        receiverAddress: receiverAddress,
        receiverProvinceCode: receiverProvinceCode,
        receiverDistrictCode: receiverDistrictCode,
        receiverWardCode: receiverWardCode,
        orderId: orderId,
      },
      success: function (res) {
        location.reload();
      },
      error: function (res) {
        location.reload();
      },
    });
  }
}

function modalEditSize() {
  $("#modalEditSize").modal("show");
}

function changeSizeInfo(orderId) {
  var productSize = $(".productSize").val();
  var productWeight = $(".productWeight").val().replace(".", "");
  var error = 0;

  if (productSize == "") {
    $(".err_size").html("Kích thước không được để trống");
    error = 1;
  }
  if (productWeight == "") {
    $(".err_weight").html("Cân nặng không được để trống");
    error = 1;
  }
  if (error == 0) {
    fullSize = productSize.split("-");

    if (typeof fullSize !== "undefined" && fullSize.length > 0) {
      length = fullSize[0];
      width = fullSize[1];
      height = fullSize[2];
    }
    lengthProducts = $(".lengthProducts").val();
    $("#loader").addClass("show");
    $.ajax({
      url: "/vi/changeInfo",
      type: "post",
      dataType: "json",
      data: {
        length: length,
        width: width,
        height: height,
        productWeight: productWeight,
        orderId: orderId,
      },
      success: function (res) {
        location.reload();
      },
      error: function (res) {
        location.reload();
      },
    });
  }
}

function ApprovalOrderMulti() {
  var ids = "";
  var totalItem = $(".checkOrder:checked").length;
  $(".checkOrder:checked").each(function () {
    ids += $(this).val() + ",";
  });
  ids = ids.slice(0, -1);
  if (totalItem <= 0) {
    $("#modalApproveAll").modal("hide");
    setTimeout(function () {
      alert("Bạn chưa chọn đơn hàng nào để duyệt");
    }, 400);
  } else {
    $("#loader").addClass("show");
    $.ajax({
      url: "/vi/ApprovalOrder",
      type: "post",
      dataType: "json",
      data: {
        orderID: ids,
        countOrder: totalItem,
      },
      success: function (res) {
        if (res.success) {
          location.reload();
        } else {
          if ($("#loader").length > 0) {
            $("#loader").removeClass("show");
          }
          if (res.status == 616) {
            $(".numberSuccess").html(res.data.totalSuccess);
            $(".numberError").html(res.data.totalFailed);
            $(".showRemain").show();
            $(".minimumToConfirm").html(
              new Intl.NumberFormat().format(res.data.minimumToConfirm) + " đ"
            );
            setTimeout(function () {
              $("#resultApproveMultiOrder").modal("show");
            }, 400);
          } else {
            if (totalItem < 2) {
              if (res.data == "") {
                $(".otherReasons").show();
                $(".otherReasonsDetail").html("<p>" + res.message + " </p>");
                $(".btnvi").hide();
              } else if (res.status == 500) {
                $(".otherReasons").show();
                $(".otherReasonsDetail").html(
                  "Duyệt đơn thất bại. Vui lòng liên hệ admin"
                );
              } else {
                $(".otherReasons").show();
                var countLength = res.data;
                for (var i = 0, n = countLength.length; i < n; i++) {
                  var line = document.createElement("p");
                  line.innerHTML = res.data;
                  $(".otherReasonsDetail").html(line);
                }
              }
              setTimeout(function () {
                $("#resultApproveOrder").modal("show");
              }, 400);
            } else {
              if (res.status == 500) {
                $(".otherReasonsDetail").html(
                  "Duyệt đơn thất bại. Vui lòng liên hệ admin"
                );
                $(".otherReasons").show();
                setTimeout(function () {
                  $("#resultApproveOrder").modal("show");
                }, 400);
              } else {
                console.log(res.data.minimumToConfirm);
                if (res.data.minimumToConfirm > 0) {
                  $(".showRemain").show();
                  $(".minimumToConfirm").html(
                    new Intl.NumberFormat().format(res.data.minimumToConfirm) +
                      " đ"
                  );
                }
                $(".numberSuccess").html(res.data.totalSuccess);
                $(".numberError").html(res.data.totalFailed);
                setTimeout(function () {
                  $("#resultApproveMultiOrder").modal("show");
                }, 400);
              }
            }
          }
        }
      },
      error: function (res) {
        location.reload();
      },
    });
  }
}

//Duyệt đơn
function ApprovalOrder(orderID, detail = 0) {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/ApprovalOrder",
    type: "post",
    dataType: "json",
    data: {
      orderID: orderID,
      countOrder: 1,
      detail: detail,
    },
    success: function (res) {
      console.log(res);
      if (detail != 0 && res.success) {
        //duyệt đơn trang chi tiết
        location.reload();
      } else {
        if (res.success) {
          location.reload();
        } else {
          if ($("#loader").length > 0) {
            $("#loader").removeClass("show");
          }
          if (res.status == 616) {
            $(".showRemain").show();
            $(".btnvi").show();
            $(".minimumToConfirm").html(
              new Intl.NumberFormat().format(res.data.minimumToConfirm) + " đ"
            );
          } else if (res.status == 500) {
            $(".otherReasons").show();
            $(".otherReasonsDetail").html(
              "Duyệt đơn thất bại. Vui lòng liên hệ admin"
            );
          } else {
            if (res.data == "") {
              $(".otherReasons").show();
              $(".otherReasonsDetail").html("<p>" + res.message + " </p>");
              $(".btnvi").hide();
            } else {
              if (res.status == 614 || res.status == 500) {
                $(".otherReasons").show();
                $(".otherReasonsDetail").html(res.message);
                $(".btnvi").hide();
              } else {
                $(".otherReasons").show();
                var countLength = res.data;
                for (var i = 0, n = countLength.length; i < n; i++) {
                  var line = document.createElement("p");
                  line.innerHTML = res.data;
                  $(".otherReasonsDetail").html(line);
                }
              }
            }
          }

          setTimeout(function () {
            $("#resultApproveOrder").modal("show");
          }, 400);
        }
      }
    },
    error: function (res) {
      // location.reload();
    },
  });
}

//Duyệt tất cả
function checkmultiApprovalNewAll() {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/ApprovalOrderAll",
    type: "post",
    dataType: "json",
    data: {
      actions: "ALL",
    },
    success: function (res) {
      if ($("#loader").length > 0) {
        $("#loader").removeClass("show");
      }
      if (res.status == 609) {
        $(".showRemain").show();
        $(".btnvi").show();
        $(".minimumToConfirm").html(
          new Intl.NumberFormat().format(res.data.minimumToConfirm) + " đ"
        );
      } else {
        $(".otherReasons").show();
        var countLength = res.data;
        for (var i = 0, n = countLength.length; i < n; i++) {
          var line = document.createElement("p");
          line.innerHTML = res.data;
          console.log(line);
          $(".otherReasonsDetail").html(line);
        }
      }
      setTimeout(function () {
        $("#resultApproveOrder").modal("show");
      }, 400);
    },
    error: function (res) {
      console.log(12345);
      console.log(res);
    },
  });
}

function reDelivery(orderId, type = 0) {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/reDelivery",
    type: "post",
    dataType: "json",
    data: {
      orderId: orderId,
      type: type,
    },
    success: function (res) {
      if (res.success) {
        location.reload();
      } else {
        location.reload();
      }
    },
    error: function (res) {},
  });
}

function refundOrder(orderId, type = 0) {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/refundOrder",
    type: "post",
    dataType: "json",
    data: {
      orderId: orderId,
      type: type,
    },
    success: function (res) {
      if (res.success) {
        location.reload();
      } else {
        location.reload();
      }
    },
    error: function (res) {},
  });
}

function showCancelOrderDetail(orderId = "", carrierOrder = "", reload = 0) {
  $(".notiText").html("Bạn chắc chắn muốn hủy đơn hàng");
  $(".orderText").html(carrierOrder);
  $(".btn-confirmCustom").show();
  $(".btn-confirmCustom").attr(
    "onclick",
    "cancelOrder(" + orderId + ",2," + reload + ")"
  );
  $("#modalOrder").modal("show");
}

function showCancelOrder(orderId) {
  $(".notiText").html("Bạn chắc chắn muốn hủy đơn hàng");
  $(".orderText").html(orderId);
  $(".btn-confirmCustom").show();
  $(".btn-confirmCustom").attr("onclick", "cancelOrder(" + orderId + ",1)");
  $("#modalOrder").modal("show");
}

function cancelOrder(orderId, type, reload) {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/cancelOrder",
    type: "post",
    dataType: "json",
    data: {
      orderId: orderId,
      type: type,
      reload: reload,
    },
    success: function (res) {
      if (res.success) {
        location.reload();
      } else {
        location.reload();
      }
    },
    error: function (res) {},
  });
}

function cancelOrderModal() {
  var ids = "";
  var totalItem = $(".checkOrder:checked").length;
  $(".checkOrder:checked").each(function () {
    ids += $(this).val() + ",";
  });
  ids = ids.slice(0, -1);
  if (totalItem <= 0) {
    $("#modalApproveAll").modal("hide");
    setTimeout(function () {
      alert("Bạn chưa chọn đơn hàng nào để hủy");
    }, 400);
  } else {
    $(".notiText").html("Bạn chắc chắn muốn hủy các đơn hàng đã chọn");
    $(".btnCfm").attr("onclick", "cancelOrderMulti(1)");
    $("#modalOrder").modal("show");
  }
}
//hủy đơn
function cancelOrderMulti(type) {
  var ids = "";
  var totalItem = $(".checkOrder:checked").length;
  $(".checkOrder:checked").each(function () {
    ids += $(this).val() + ",";
  });
  ids = ids.slice(0, -1);
  if (totalItem <= 0) {
    $("#modalApproveAll").modal("hide");
    setTimeout(function () {
      alert("Bạn chưa chọn đơn hàng nào để hủy");
    }, 400);
  } else {
    $("#loader").addClass("show");
    $.ajax({
      url: "/vi/CancelOrderMulti",
      type: "post",
      dataType: "json",
      data: {
        orderID: ids,
        type: type,
      },
      success: function (res) {
        if (res.success) {
          if ($("#loader").length > 0) {
            $("#loader").removeClass("show");
          }
          $(".btn-confirmCustom").attr("onclick", "reload()");
          $(".btn-confirmCustom").show();
          $(".headerFalse").html("Gửi yêu cầu hủy - thành công");
          $(".showFalse").append(
            '<p class="fz13">HolaShip đã tiếp nhận yêu cầu Hủy đơn hàng. Đơn hàng sẽ được chuyển sang trạng </p>\
                        <p class="fz13">thái <strong>"Chờ hủy"</strong> để Quý khách tiện theo dõi. </p>\
                        <p class="fz13">Nếu Hủy không thành công, Quý khách vui lòng chọn <strong>Thao tác > Gửi yêu cầu.</strong></p>\
                        <p class="fz13">HolaShip sẽ tiếp tục hỗ trợ Hủy thủ công cho Quý khách. </p>\
                        <p class="fz13">Chân thành cảm ơn Quý khách ! </p>'
          );
          $("#modalOrderResponse").modal("show");
        } else {
          location.reload();
        }
      },
      error: function (res) {
        console.log(12345);
        console.log(res);
      },
    });
  }
}

function reload() {
  location.reload();
}

function showPartialConfirm(orderId, requestId, type) {
  if (type == 1) {
    $(".notiText").html(
      "Bạn chắc chắn muốn xác nhận số tiền COD mới của đơn giao 1 phần không?"
    );
  } else {
    $(".notiText").html(
      "Bạn chắc chắn muốn từ chối số tiền COD mới của đơn giao 1 phần không?"
    );
  }
  $(".btn-confirmCustom").attr(
    "onclick",
    "partialConfirm(" + orderId + "," + requestId + "," + type + ")"
  );
  $("#modalOrder").modal("show");
}

function partialConfirm(orderId, partialRequestId, type) {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/partialConfirm",
    type: "post",
    dataType: "json",
    data: {
      orderId: orderId,
      partialRequestId: partialRequestId,
      type: type,
    },
    success: function (res) {
      location.reload();
    },
    error: function (res) {},
  });
}

function cancelOrderAllModal() {
  $(".notiText").html("Bạn chắc chắn muốn hủy tất cả các đơn.");
  $(".btn-confirmCustom").attr("onclick", "cancelOrderAll(3)");
  $("#modalOrder").modal("show");
}

function cancelOrderAll(type) {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/cancelOrderAll",
    type: "post",
    dataType: "json",
    data: {
      type: type,
    },
    success: function (res) {
      if (res.success) {
        if ($("#loader").length > 0) {
          $("#loader").removeClass("show");
        }
        $(".btn-confirmCustom").attr("onclick", "reload()");
        $(".headerFalse").html("Gửi yêu cầu hủy - thành công");
        $(".btn-cancelCustom").hide();
        $(".btn-confirmCustom").show();
        $(".bodyOrderFalse").append(
          '<p class="fz13">HolaShip đã tiếp nhận yêu cầu Hủy đơn hàng. Đơn hàng sẽ được chuyển sang trạng </p>\
                    <p class="fz13">thái <strong>"Chờ hủy"</strong> để Quý khách tiện theo dõi. </p>\
                    <p class="fz13">Nếu Hủy không thành công, Quý khách vui lòng chọn <strong>Thao tác > Gửi yêu cầu.</strong></p>\
                    <p class="fz13">HolaShip sẽ tiếp tục hỗ trợ Hủy thủ công cho Quý khách. </p>\
                    <p class="fz13">Chân thành cảm ơn Quý khách ! </p>'
        );
        $("#modalOrder").modal("show");
      } else {
        location.reload();
      }
    },
    error: function (res) {},
  });
}

function copyTextOrderId(orderId) {
  if (orderId == "") {
    $("#copyModal").modal("show");
    $(".imgErrorDetailOrder").hide();
    $(".spanErrorDetailOrder").html("Không có mã vận đơn.");
    setTimeout(function () {
      $("#copyModal").modal("hide");
    }, 1000);
  } else {
    $("#copyModal").modal("show");
    navigator.clipboard.writeText(orderId);
    $(".imgErrorDetailOrder").show();
    $(".spanErrorDetailOrder").html("Sao chép mã vận</br> đơn thành công");
    setTimeout(function () {
      $("#copyModal").modal("hide");
    }, 1000);
  }
}

function validate(id) {
  var pass = $("#" + id).val();
  if (pass.length == 0) {
    $("." + id).html("Mật khẩu không được để trống");
  } else return true;
}

function checkPass(id) {
  var password = $("#" + id).val();
  const re = /^(?=.{8,15}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
  test = re.test(password);
  if (test == false) {
    $("." + id).html(
      "Mật khẩu từ 8 - 15 ký tự và phải có ít nhất 1 ký tự đặc biệt, in hoa, chữ thường, ký tự số."
    );
  } else {
    $("." + id).html("");
  }
}

function checkRePass(id) {
  // var password = $('#' + id).val();
  // const re = /^(?=.{8,15}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
  // test = re.test(password);
  // if (test == false) {
  //     $('.' + id).html('Mật khẩu từ 8 - 15 ký tự và phải có ít nhất 1 ký tự đặc biệt, in hoa, chữ thường');
  // } else {
  //     $('.' + id).html('');
  // }
}

function showPass(idtag, index) {
  var x = document.getElementById(idtag);
  if (x.type === "password") {
    x.type = "text";
    $("." + index).removeClass("fa-eye");
    $("." + index).addClass("fa-eye-slash");
  } else {
    x.type = "password";
    $("." + index).removeClass("fa-eye-slash");
    $("." + index).addClass("fa-eye");
  }
  $("#package_" + idtag).show();
}

$("#repassword").keyup(function () {
  var password = $("#validatePassNew").val();
  $(".err_repassword").html(
    password == $(this).val() ? "" : "Nhập lại mật khẩu không khớp"
  );
});

function modalPopupImage(className) {
  var src = $("." + className).attr("src");
  $("#imageDetail").attr("src", src);
  $("#modalPopupImage").modal("show");
}

function showPrintOrderModal(type) {
  var ids = "";
  var totalItem = $(".checkOrder:checked").length;
  $(".checkOrder:checked").each(function () {
    ids += $(this).val() + ",";
  });
  ids = ids.slice(0, -1);
  if (totalItem <= 0) {
    $("#modalOrder").modal("hide");
    setTimeout(function () {
      alert("Bạn chưa chọn đơn hàng nào để in");
    }, 400);
  } else {
    $(".headerFalse").html("Chọn khổ in");
    $(".bodyOrderFalse").html(
      '<a class="btn btn-primary" style="margin-right:15px" href="/vi/in-van-don/' +
        type +
        "/100x180/" +
        ids +
        '" >100x180</a>' +
        '<a class="btn btn-primary" style="margin-right:15px" href="/vi/in-van-don/' +
        type +
        "/75x80/" +
        ids +
        '" >75x80</a>' +
        '<a class="btn btn-primary" href="/vi/in-van-don/' +
        type +
        "/a5/" +
        ids +
        '" >A5</a>'
    );
    // // $('.orderText').html(orderId)
    // $('.btn-confirmCustom').attr('onclick', 'cancelOrder(' + (orderId) + ',1)');
    $(".btn-confirmCustom").hide();
    $("#modalOrder").modal("show");
  }
}

function showPrintOrderModal(type) {
  setTimeout(function () {
    $("#modalOrderPrint").modal("hide");
  }, 5000);
  var ids = "";
  var totalItem = $(".checkOrder:checked").length;
  $(".checkOrder:checked").each(function () {
    ids += $(this).val() + ",";
  });
  ids = ids.slice(0, -1);
  if (totalItem <= 0) {
    $("#modalOrderPrint").modal("hide");
    setTimeout(function () {
      alert("Bạn chưa chọn đơn hàng nào để in");
    }, 400);
  } else {
    $(".headerFalse").html("Chọn khổ in");
    $(".bodyOrderPrint").html(
      '<a target="_blank" class="btn btn-primary" style="margin-right:15px" href="/vi/in-van-don/' +
        type +
        "/100x180/" +
        ids +
        '" >100x180</a>' +
        '<a target="_blank" class="btn btn-primary" style="margin-right:15px" href="/vi/in-van-don/' +
        type +
        "/75x80/" +
        ids +
        '" >75x80</a>' +
        '<a target="_blank" class="btn btn-primary" href="/vi/in-van-don/' +
        type +
        "/a5/" +
        ids +
        '" >A5</a>'
    );
    $(".btn-confirmCustom").hide();
    $("#modalOrderPrint").modal("show");
  }
}

function showPrintOrderAllModal(type, segment = "") {
  setTimeout(function () {
    $("#modalOrderPrint").modal("hide");
  }, 5000);
  var groupStatus = "";
  if (segment != "") {
    groupStatus = "," + segment;
  }
  var searchKey = $(".searchKey").val();
  var fromDate = $(".fromDate").val();
  var shopAddressId = $(".shopAddressId").val();
  var toDate = $(".toDate").val();
  var packCode = $(".packCode").val();
  var html =
    "?searchKey=" +
    searchKey +
    "&shopAddressId=" +
    shopAddressId +
    "&packCode=" +
    packCode +
    "&fromDate=" +
    fromDate +
    "&toDate=" +
    toDate;
  $(".headerFalse").html("Chọn khổ in");
  $(".bodyOrderPrint").html(
    '<a target="_blank" class="btn btn-primary" style="margin-right:15px" href="/vi/in-van-don/' +
      type +
      "/100x180/ALL" +
      groupStatus +
      html +
      '" >100x180</a>' +
      '<a target="_blank" class="btn btn-primary" style="margin-right:15px" href="/vi/in-van-don/' +
      type +
      "/75x80/ALL" +
      groupStatus +
      html +
      '" >75x80</a>' +
      '<a target="_blank" class="btn btn-primary" href="/vi/in-van-don/' +
      type +
      "/a5/ALL" +
      groupStatus +
      html +
      '" >A5</a>'
  );
  $(".btn-confirmCustom").hide();
  $("#modalOrderPrint").modal("show");
}

function chooseSizePrint(type, orderId) {
  setTimeout(function () {
    $("#modalOrderPrint").modal("hide");
  }, 5000);
  $(".headerFalse").html("Chọn khổ in");
  $(".bodyOrderPrint").html(
    '<a target="_blank" class="btn btn-primary" style="margin-right:15px" href="/vi/in-van-don/' +
      type +
      "/100x180/" +
      orderId +
      '" >100x180</a>' +
      '<a target="_blank" class="btn btn-primary" style="margin-right:15px" href="/vi/in-van-don/' +
      type +
      "/75x80/" +
      orderId +
      '" >75x80</a>' +
      '<a target="_blank" class="btn btn-primary" href="/vi/in-van-don/' +
      type +
      "/a5/" +
      orderId +
      '" >A5</a>'
  );
  $(".btn-confirmCustom").hide();
  $("#modalOrderPrint").modal("show");
}

function exportExcelListOrder(segment = "") {
  searchKey = $(".searchKey").val();
  fromDate = $(".fromDate").val();
  toDate = $(".toDate").val();
  var today = new Date();
  var date =
    today.getDate() + "-" + (today.getMonth() + 1) + "-" + today.getFullYear();
  // console.log(date)
  if (fromDate == "" && toDate == "") {
  }
  excelName = date;

  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/export-excel-list-order",
    type: "post",
    dataType: "json",
    data: {
      searchKey: searchKey,
      segment: segment,
      fromDate: fromDate,
      toDate: toDate,
    },
  }).done(function (data) {
    if (data.status == 1) {
      var $a = $("<a>");
      $a.attr("href", data.file);
      $("body").append($a);
      $a.attr("download", "Danh sách đơn hàng " + excelName + ".xlsx");
      $a[0].click();
      $a.remove();
      setTimeout(function () {
        $("#loader").removeClass("show");
      }, 1000);
    } else {
      $("#loader").removeClass("show");
      setTimeout(function () {
        alert("Không có dữ liệu đơn hàng");
      }, 200);
    }
  });
}

function DeleteOrderMulti(typerOrder = 1) {
  var ids = "";
  var totalItem = $(".checkOrder:checked").length;
  $(".checkOrder:checked").each(function () {
    ids += $(this).val() + ",";
  });
  ids = ids.slice(0, -1);
  if (totalItem <= 0) {
    $("#modalApproveAll").modal("hide");
    setTimeout(function () {
      alert("Bạn chưa chọn đơn hàng nào để xóa");
    }, 400);
  } else {
    $("#loader").addClass("show");
    $.ajax({
      url: "/vi/DeleteOrder",
      type: "post",
      dataType: "json",
      data: {
        orderID: ids,
        countOrder: totalItem,
        typerOrder: typerOrder,
      },
      success: function (res) {
        location.reload();
      },
      error: function (res) {
        location.reload();
      },
    });
  }
}

function deleteOrderModalConfirm(orderId = "", type = 0, orderDetail = 0) {
  $(".notiText").html("Bạn chắc chắn muốn xóa đơn hàng?");
  $(".btn-confirmCustom").show();
  $(".btn-confirmCustom").attr(
    "onclick",
    'deleteOrder("' + orderId + '",' + type + ")"
  );
  $("#modalOrder").modal("show");
}

function deleteOrder(orderId, type = 0, orderDetail = 0) {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/DeleteOrder",
    type: "post",
    dataType: "json",
    data: {
      orderID: orderId,
      type: type,
    },
    success: function (res) {
      if (res.redirect == 1) {
        window.location = "/vi/danh-sach-don-hang";
      } else {
        location.reload();
      }
    },
    error: function (res) {
      location.reload();
    },
  });
}

function deleteOrderAllModal(segment = "") {
  $(".notiText").html("Bạn chắc chắn muốn xóa tất cả các đơn.");
  $(".btn-confirmCustom").attr("onclick", 'deleteAllOrder("' + segment + '")');
  $("#modalOrder").modal("show");
}

function deleteAllOrder(segment = "") {
  $("#loader").addClass("show");
  $.ajax({
    url: "/vi/DeleteAllOrder",
    type: "post",
    dataType: "json",
    data: {
      segment: segment,
    },
    success: function (res) {
      location.reload();
    },
    error: function (res) {
      location.reload();
    },
  });
}

function addLoader() {
  $("#loader").addClass("show");
}
