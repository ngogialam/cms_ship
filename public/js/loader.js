jQuery(document).ready(function($) {

    // loader
    var loader = function() {
        setTimeout(function() {
            if ($('#loader').length > 0) {
                $('#loader').removeClass('show');
            }
        }, 1);
    };
    loader();

    $('body').on('click', "button[type='submit']", function() {
        $('#loader').addClass('show');
    });
    $('#barcodePrint').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
    });
    //Quét barcode để in
    $("#barcodePrint").focus();
    $('#barcodePrint').change(function() {
        let partnerId = $('#barcodePrint').val();
        // $('#loader').addClass('show');
        if (partnerId != '') {
            $.ajax({
                url: 'barcode-print-only',
                type: 'post',
                dataType: 'json',
                data: { 'partnerId': partnerId },
                success: function(res) {
                    if (res.success) {
                        let timeout = 500;
                        $('#theModal').modal('show').find('#printTable').load(res.data);
                        setTimeout(function() {
                            printDataOnly();
                            $('#loader').removeClass('show');
                        }, timeout);
                        $('#barcodePrint').val('');
                        $("#barcodePrint").focus();
                    } else {
                        alert(res.message);
                        $('#loader').removeClass('show');
                        $('#barcodePrint').val('');
                        $("#barcodePrint").focus();
                    }
                },
                error: function() {
                    // alert('Có lỗi khi lấy Phường. Mời bạn thử lại sau!');
                }
            });

        }
    });

});

function printDataOnly() {
    $(".print_order").focus();
    var divToPrint = document.getElementById("printTable");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    setTimeout(function() {
        newWin.print();
        newWin.close();
        $('#theModal').modal('hide');
        $("#order_id").focus();
    }, 100);
}

function exportExcelSalary() {
    $('#loader').addClass('show');
    let month = $('#monthSalary').val();
    $.ajax({
        url: '/export-excel-salary-shipper',
        type: 'get',
        dataType: 'json',
        data: { 'month': month }
    }).done(function(data) {
        var $a = $("<a>");
        $a.attr("href", data.file);
        $("body").append($a);
        $a.attr("download", "Dữ liệu tính lương HolaShip tháng " + month + ".xlsx");
        $a[0].click();
        $a.remove();
        window.location.href = data.href;
        setTimeout(function() {
            $('#loader').removeClass('show');
        }, 1000);
    });
}

function exportDetailShipper(idShipper, type, warehouseID) {
    // $('#loader').addClass('show');
    let date = $('#warehouseReport').val();
    if (warehouseID == 0) {
        warehouseID = $('#warehouseIDReport').val();
    }
    console.log(idShipper);
    $.ajax({
        url: '/xuat-du-lieu-tung-shipper',
        type: 'post',
        dataType: 'json',
        data: { 'idShipper': idShipper, 'date': date, 'type': type, 'warehouseID': warehouseID }
    }).done(function(data) {
        var $a = $("<a>");
        $a.attr("href", data.file);
        $("body").append($a);
        $a.attr("download", data.name);
        $a[0].click();
        $a.remove();
        window.location.reload();
        setTimeout(function() {
            $('#loader').removeClass('show');
        }, 1000);
    });
}