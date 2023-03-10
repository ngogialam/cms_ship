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
    $(".err_receiverName_0_0").html("T??n ng?????i nh???n kh??ng ???????c b??? tr???ng");
    error = 1;
  }

  if (receiverPhone == "") {
    $(".err_receiverPhone_0_0").html("S??? ??i???n tho???i kh??ng ???????c b??? tr???ng");
    error = 1;
  } else {
    checkreceiverPhone = validatePhone(receiverPhone);
    if (!checkreceiverPhone) {
      $(".err_receiverPhone_0_0").html("S??? ??i???n tho???i kh??ng h???p l???");
      error = 1;
    }
  }
  if (receiverAddress == "" || receiverAddress == null) {
    $(".err_receiverAddress").html("?????a ch??? ng?????i g???i kh??ng ???????c ????? tr???ng");
    error = 1;
  }
  if (
    receiverProvinceCode == "" ||
    receiverProvinceCode == null ||
    receiverProvinceCode == 0
  ) {
    $(".err_pickProvince").html("T???nh/th??nh ng?????i g???i kh??ng ???????c ????? tr???ng");
    error = 1;
  }
  if (
    receiverDistrictCode == "" ||
    receiverDistrictCode == null ||
    receiverDistrictCode == 0
  ) {
    $(".err_pickDistrict").html("Qu???n/huy???n ng?????i g???i kh??ng ???????c ????? tr???ng");
    error = 1;
  }
  if (
    receiverWardCode == "" ||
    receiverWardCode == null ||
    receiverWardCode == 0
  ) {
    $(".err_pickWard").html("Ph?????ng/x?? ng?????i g???i kh??ng ???????c ????? tr???ng");
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
    $(".err_size").html("K??ch th?????c kh??ng ???????c ????? tr???ng");
    error = 1;
  }
  if (productWeight == "") {
    $(".err_weight").html("C??n n???ng kh??ng ???????c ????? tr???ng");
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
      alert("B???n ch??a ch???n ????n h??ng n??o ????? duy???t");
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
              new Intl.NumberFormat().format(res.data.minimumToConfirm) + " ??"
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
                  "Duy???t ????n th???t b???i. Vui l??ng li??n h??? admin"
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
                  "Duy???t ????n th???t b???i. Vui l??ng li??n h??? admin"
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
                      " ??"
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

//Duy???t ????n
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
        //duy???t ????n trang chi ti???t
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
              new Intl.NumberFormat().format(res.data.minimumToConfirm) + " ??"
            );
          } else if (res.status == 500) {
            $(".otherReasons").show();
            $(".otherReasonsDetail").html(
              "Duy???t ????n th???t b???i. Vui l??ng li??n h??? admin"
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

//Duy???t t???t c???
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
          new Intl.NumberFormat().format(res.data.minimumToConfirm) + " ??"
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
  $(".notiText").html("B???n ch???c ch???n mu???n h???y ????n h??ng");
  $(".orderText").html(carrierOrder);
  $(".btn-confirmCustom").show();
  $(".btn-confirmCustom").attr(
    "onclick",
    "cancelOrder(" + orderId + ",2," + reload + ")"
  );
  $("#modalOrder").modal("show");
}

function showCancelOrder(orderId) {
  $(".notiText").html("B???n ch???c ch???n mu???n h???y ????n h??ng");
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
      alert("B???n ch??a ch???n ????n h??ng n??o ????? h???y");
    }, 400);
  } else {
    $(".notiText").html("B???n ch???c ch???n mu???n h???y c??c ????n h??ng ???? ch???n");
    $(".btnCfm").attr("onclick", "cancelOrderMulti(1)");
    $("#modalOrder").modal("show");
  }
}
//h???y ????n
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
      alert("B???n ch??a ch???n ????n h??ng n??o ????? h???y");
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
          $(".headerFalse").html("G???i y??u c???u h???y - th??nh c??ng");
          $(".showFalse").append(
            '<p class="fz13">HolaShip ???? ti???p nh???n y??u c???u H???y ????n h??ng. ????n h??ng s??? ???????c chuy???n sang tr???ng </p>\
                        <p class="fz13">th??i <strong>"Ch??? h???y"</strong> ????? Qu?? kh??ch ti???n theo d??i. </p>\
                        <p class="fz13">N???u H???y kh??ng th??nh c??ng, Qu?? kh??ch vui l??ng ch???n <strong>Thao t??c > G???i y??u c???u.</strong></p>\
                        <p class="fz13">HolaShip s??? ti???p t???c h??? tr??? H???y th??? c??ng cho Qu?? kh??ch. </p>\
                        <p class="fz13">Ch??n th??nh c???m ??n Qu?? kh??ch ! </p>'
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
      "B???n ch???c ch???n mu???n x??c nh???n s??? ti???n COD m???i c???a ????n giao 1 ph???n kh??ng?"
    );
  } else {
    $(".notiText").html(
      "B???n ch???c ch???n mu???n t??? ch???i s??? ti???n COD m???i c???a ????n giao 1 ph???n kh??ng?"
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
  $(".notiText").html("B???n ch???c ch???n mu???n h???y t???t c??? c??c ????n.");
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
        $(".headerFalse").html("G???i y??u c???u h???y - th??nh c??ng");
        $(".btn-cancelCustom").hide();
        $(".btn-confirmCustom").show();
        $(".bodyOrderFalse").append(
          '<p class="fz13">HolaShip ???? ti???p nh???n y??u c???u H???y ????n h??ng. ????n h??ng s??? ???????c chuy???n sang tr???ng </p>\
                    <p class="fz13">th??i <strong>"Ch??? h???y"</strong> ????? Qu?? kh??ch ti???n theo d??i. </p>\
                    <p class="fz13">N???u H???y kh??ng th??nh c??ng, Qu?? kh??ch vui l??ng ch???n <strong>Thao t??c > G???i y??u c???u.</strong></p>\
                    <p class="fz13">HolaShip s??? ti???p t???c h??? tr??? H???y th??? c??ng cho Qu?? kh??ch. </p>\
                    <p class="fz13">Ch??n th??nh c???m ??n Qu?? kh??ch ! </p>'
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
    $(".spanErrorDetailOrder").html("Kh??ng c?? m?? v???n ????n.");
    setTimeout(function () {
      $("#copyModal").modal("hide");
    }, 1000);
  } else {
    $("#copyModal").modal("show");
    navigator.clipboard.writeText(orderId);
    $(".imgErrorDetailOrder").show();
    $(".spanErrorDetailOrder").html("Sao ch??p m?? v???n</br> ????n th??nh c??ng");
    setTimeout(function () {
      $("#copyModal").modal("hide");
    }, 1000);
  }
}

function validate(id) {
  var pass = $("#" + id).val();
  if (pass.length == 0) {
    $("." + id).html("M???t kh???u kh??ng ???????c ????? tr???ng");
  } else return true;
}

function checkPass(id) {
  var password = $("#" + id).val();
  const re = /^(?=.{8,15}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/;
  test = re.test(password);
  if (test == false) {
    $("." + id).html(
      "M???t kh???u t??? 8 - 15 k?? t??? v?? ph???i c?? ??t nh???t 1 k?? t??? ?????c bi???t, in hoa, ch??? th?????ng, k?? t??? s???."
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
  //     $('.' + id).html('M???t kh???u t??? 8 - 15 k?? t??? v?? ph???i c?? ??t nh???t 1 k?? t??? ?????c bi???t, in hoa, ch??? th?????ng');
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
    password == $(this).val() ? "" : "Nh???p l???i m???t kh???u kh??ng kh???p"
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
      alert("B???n ch??a ch???n ????n h??ng n??o ????? in");
    }, 400);
  } else {
    $(".headerFalse").html("Ch???n kh??? in");
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
      alert("B???n ch??a ch???n ????n h??ng n??o ????? in");
    }, 400);
  } else {
    $(".headerFalse").html("Ch???n kh??? in");
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
  $(".headerFalse").html("Ch???n kh??? in");
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
  $(".headerFalse").html("Ch???n kh??? in");
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
      $a.attr("download", "Danh s??ch ????n h??ng " + excelName + ".xlsx");
      $a[0].click();
      $a.remove();
      setTimeout(function () {
        $("#loader").removeClass("show");
      }, 1000);
    } else {
      $("#loader").removeClass("show");
      setTimeout(function () {
        alert("Kh??ng c?? d??? li???u ????n h??ng");
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
      alert("B???n ch??a ch???n ????n h??ng n??o ????? x??a");
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
  $(".notiText").html("B???n ch???c ch???n mu???n x??a ????n h??ng?");
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
  $(".notiText").html("B???n ch???c ch???n mu???n x??a t???t c??? c??c ????n.");
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
