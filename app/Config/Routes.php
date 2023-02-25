<?php
namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Modules\Frontend\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('home');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Authenticator::home', ['namespace' => 'App\Modules\Authenticator\Controllers']);

$routes->get('{locale}/danh-muc/tuyen-dung.html', 'Authenticator::redirectHome', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->get('{locale}/danh-muc/bao-chi-noi-gi.html', 'Authenticator::redirectHome', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->get('{locale}/bai-viet/tuyen-dung/nhan-vien-giao-nhan-hang-hoa.html', 'Authenticator::redirectHome', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->get('{locale}/danh-muc/khuyen-mai.html', 'Authenticator::redirectHome', ['namespace' => 'App\Modules\Authenticator\Controllers']);



$routes->get('/{locale}', 'Authenticator::home', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->get('/{locale}/tra-cuu-hanh-trinh-don-hang', 'ConsultOrders::ConsultOrders', ['namespace' => 'App\Modules\Authenticator\Controllers']);

//Modal alert
$routes->add('{locale}/modalAlert', 'Authenticator::modalAlert', ['namespace' => 'App\Modules\Authenticator\Controllers']);

//Hỗ trợ
$routes->add('{locale}/hoi-dap', 'Support::support', ['namespace' => 'App\Modules\Support\Controllers']);
$routes->add('{locale}/chi-tiet-ho-tro', 'Support::supportDT', ['namespace' => 'App\Modules\Support\Controllers']);

$routes->add('{locale}/chinh-sach-dieu-khoan', 'Support::csdk', ['namespace' => 'App\Modules\Support\Controllers']);
$routes->add('{locale}/bang-gia', 'Support::banggia', ['namespace' => 'App\Modules\Support\Controllers']);
$routes->add('{locale}/chinh-sach-boi-thuong', 'Support::boithuong', ['namespace' => 'App\Modules\Support\Controllers']);
$routes->add('{locale}/hang-hoa-cam-van', 'Support::camvan', ['namespace' => 'App\Modules\Support\Controllers']);
$routes->add('{locale}/quy-trinh-khieu-nai', 'Support::khieunai', ['namespace' => 'App\Modules\Support\Controllers']);
// $routes->add('{locale}/quy-trinh-khieu-nai', 'Support::khieunai', ['namespace' => 'App\Modules\Support\Controllers']);

// $routes->add('{locale}/chi-tiet-ho-tro', 'Support::supportDT', ['namespace' => 'App\Modules\Support\Controllers']);

//Gói cước
$routes->add('{locale}/goi-cuoc', 'PackOfData::goiCuoc', ['namespace' => 'App\Modules\PackOfData\Controllers']);
$routes->add('{locale}/buu-cuc', 'PackOfData::buuCuc', ['namespace' => 'App\Modules\PackOfData\Controllers']);
$routes->add('{locale}/lien-he', 'PackOfData::lienHe', ['namespace' => 'App\Modules\PackOfData\Controllers']);
$routes->add('{locale}/tuyen-dung-doi-tac', 'PackOfData::recruitmentPartner', ['namespace' => 'App\Modules\PackOfData\Controllers']);

//Thông báo
$routes->add('{locale}/tin-tuc', 'NotifiCation::thongbao', ['namespace' => 'App\Modules\NotifiCation\Controllers']);
$routes->add('{locale}/chi-tiet-bai-dang', 'NotifiCation::thongbaoCT', ['namespace' => 'App\Modules\NotifiCation\Controllers']);

// //HOME
// $routes->add('/', 'Home::home', ['namespace' => 'App\Modules\Home\Controllers']);

// USER --
//Đang nhâp
$routes->add('{locale}/dang-nhap', 'Authenticator::login', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('dang-nhap', 'Authenticator::login', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('dang-nhap/(:any)', 'Authenticator::login/$1', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('{locale}/dang-nhap/(:any)', 'Authenticator::login/$1', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('{locale}/generateDeviceId', 'Common::generateDeviceId', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('{locale}/loginSocial', 'Common::loginSocial', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('{locale}/ggLogin', 'Common::ggLogin', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('{locale}/xac-thuc-so-dien-thoai', 'Common::verifyOTP', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('{locale}/dang-xuat', 'Authenticator::logOut', ['namespace' => 'App\Modules\Authenticator\Controllers']);
$routes->add('{locale}/xac-thuc-tai-khoan', 'Authenticator::verifyAccount', ['namespace' => 'App\Modules\Authenticator\Controllers']);

//Login social
$routes->add('{locale}/getSession', 'Common::getSession', ['namespace' => 'App\Modules\Authenticator\Controllers']);
// Quên mật khẩu
$routes->add('{locale}/quen-mat-khau', 'Authenticator::forgotPass', ['namespace' => 'App\Modules\Authenticator\Controllers']);
//Đăng ký
$routes->add('{locale}/dang-ky.html', 'Authenticator::registration', ['namespace' => 'App\Modules\Authenticator\Controllers']);
//Kiểm tra OTP
$routes->add('{locale}/xac-thuc-otp-dang-ky', 'Authenticator::getOtp', ['namespace' => 'App\Modules\Authenticator\Controllers']);
//ReSendOTP
$routes->add('{locale}/reSendOtp', 'Authenticator::reSendOtp', ['namespace' => 'App\Modules\Authenticator\Controllers']);
//Thông tin khách hàng
$routes->add('{locale}/thong-tin-tai-khoan', 'AccountInfo::accountInfo', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/cap-nhap-thong-tin-tai-khoan', 'AccountInfo::editAcount', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/getDistrictsAjax', 'UserCommon::getDistrictsAjax', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/getWardsAjax', 'UserCommon::getWardsAjax', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/cap-nhat-avatar', 'UserCommon::getAvatar', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/getUser', 'UserCommon::getUser', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/chi-tiet-hop-dong', 'AccountInfo::detailContract', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/exportPdf', 'AccountInfo::exportPdf', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/exportPdfView', 'AccountInfo::exportPdfView', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/chi-tiet-thay-doi-thong-tin', 'AccountInfo::previewUpdate', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/cap-nhap-thong-tin-hop-dong', 'AccountInfo::editContractInfo', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/addBanksContract', 'AccountInfo::addBanksContract', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/cap-nhat-hop-dong-khach', 'AccountInfo::updateContractCustomer', ['namespace' => 'App\Modules\AccountInfo\Controllers']);

$routes->add('{locale}/ky-xac-nhan', 'AccountInfo::editAcountSignature', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/uploadImgs', 'AccountInfo::uploadImgs', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/mau-hop-dong', 'Support::hopdong', ['namespace' => 'App\Modules\Support\Controllers']);
//Change language
$routes->add('{locale}/changeLanguage', 'Common::changeLanguage', ['namespace' => 'App\Modules\Authenticator\Controllers']);
//Đổi mật khẩu
$routes->add('{locale}/doi-mat-khau', 'SecurityManage::changePassword', ['namespace' => 'App\Modules\SecurityManage\Controllers']);
$routes->add('{locale}/doi-so-dien-thoai', 'SecurityManage::changePhone', ['namespace' => 'App\Modules\SecurityManage\Controllers']);

// Connect Bank --
//Liên kết tài khoản ngân hàng
$routes->add('{locale}/lien-ket-ngan-hang', 'ConnectBank::cnBank', ['namespace' => 'App\Modules\Banks\Controllers']);
$routes->add('{locale}/them-lien-ket', 'ConnectBank::addBank', ['namespace' => 'App\Modules\Banks\Controllers']);
$routes->add('{locale}/them-lien-ket/(:any)', 'ConnectBank::addBank/$1', ['namespace' => 'App\Modules\Banks\Controllers']);
// $routes->add('{locale}/xac-thuc-otp-bank', 'ConnectBank::otp', ['namespace' => 'App\Modules\Banks\Controllers']);
$routes->add('{locale}/xac-thuc-thanh-cong', 'ConnectBank::otpSuccess', ['namespace' => 'App\Modules\Banks\Controllers']);
$routes->add('{locale}/xac-thuc-that-bai', 'ConnectBank::otpFalse', ['namespace' => 'App\Modules\Banks\Controllers']);
$routes->add('{locale}/removeBank', 'ConnectBank::removeBank', ['namespace' => 'App\Modules\Banks\Controllers']);
// $routes->add('{locale}/the-lien-ket', 'ConnectBank::allBank', ['namespace' => 'App\Modules\Banks\Controllers']);

// Ewallet --
//Ví
$routes->add('{locale}/vi-hola', 'WalletManage::balanceFluctuations', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/vi-hola/(:any)', 'WalletManage::balanceFluctuations/$1', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/rut-tien', 'WalletManage::withDraw', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/nap-tien', 'WalletManage::payIn', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/nap-tien-vi-VA', 'WalletManage::payInVAWallet', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/export-excel-fluctuation-balance', 'WalletManage::exportExcelBalance', ['namespace' => 'App\Modules\WalletManage\Controllers']);

$routes->add('{locale}/xac-nhan-otp', 'WalletManage::otp', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/ket-qua-giao-dich', 'WalletManage::kqgiaodich', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/xac-nhan-giao-dich', 'WalletManage::confirmTransaction', ['namespace' => 'App\Modules\WalletManage\Controllers']);

$routes->add('{locale}/nap-tien-dt', 'WalletManage::naptien', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/nap-tien-vi-Imedia', 'WalletManage::payInImediaWallet', ['namespace' => 'App\Modules\WalletManage\Controllers']);
$routes->add('{locale}/chu-ky-doi-soat', 'WalletManage::controlCycle', ['namespace' => 'App\Modules\WalletManage\Controllers']);

// WareHouse --
//Kho hàng
$routes->add('{locale}/danh-sach-kho-hang', 'WarehouseManage::listWarehouse', ['namespace' => 'App\Modules\WarehouseManage\Controllers']);
$routes->add('{locale}/danh-sach-kho-hang/(:any)', 'WarehouseManage::listWarehouse/$1', ['namespace' => 'App\Modules\WarehouseManage\Controllers']);
$routes->add('{locale}/danh-sach-kho-hang/(:segment)/(:any)', 'WarehouseManage::listWarehouse/$1/$2', ['namespace' => 'App\Modules\WarehouseManage\Controllers']);
$routes->add('{locale}/them-kho-hang', 'WarehouseManage::createWarehouse', ['namespace' => 'App\Modules\WarehouseManage\Controllers']);
$routes->add('{locale}/cap-nhat-kho-hang/(:any)', 'WarehouseManage::updateWarehouse/$1', ['namespace' => 'App\Modules\WarehouseManage\Controllers']);
$routes->add('{locale}/cap-nhat-kho-hang', 'WarehouseManage::updateWarehouse', ['namespace' => 'App\Modules\WarehouseManage\Controllers']);

//Common Order
$routes->add('{locale}/get-address-location', 'CommonAjax::get_address_location', ['namespace' => 'App\Modules\OrderManage\Common\Controllers']);
$routes->add('{locale}/choose-pickup-address', 'CommonAjax::choosePickupAddress', ['namespace' => 'App\Modules\OrderManage\Common\Controllers']);

// Đơn lẻ
$routes->add('{locale}/tao-don-le', 'SingleOrder::choosePacket', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/nhap-thong-tin-don-hang/(:any)', 'SingleOrder::orderDetail/$1', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/nhap-thong-tin-don-hang', 'SingleOrder::orderDetail', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/xac-nhan-don-le', 'SingleOrder::conFirm', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/them-don', 'SingleOrder::themdon', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/xac-nhan-don-le/(:any)', 'SingleOrder::conFirm/$1', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);

$routes->add('{locale}/addNewPickupAddress', 'SingleOrder::addNewPickupAddress', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/showOrderReceiverDetail', 'SingleOrder::showOrderReceiverDetail', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/updateCacheOrder', 'SingleOrder::updateCacheOrder', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/postFormApi', 'SingleOrder::postFormApi', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/changeSingleOrderFees', 'SingleOrder::changeSingleOrderFees', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);

$routes->add('{locale}/saveReceiverItem', 'PostAjax::saveReceiverItem', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/getReceiverItem', 'PostAjax::getReceiverItem', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/addPoint', 'PostAjax::addPoint', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/saveProductItem', 'PostAjax::saveProductItem', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/nextPostageKm', 'PostAjax::nextPostageKm', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/nextPostageSp', 'PostAjax::nextPostageSp', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/removeProduct', 'PostAjax::removeProduct', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/removeReceiver', 'PostAjax::removeReceiver', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/saveOrderDraft', 'PostAjax::saveOrderDraft', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/removeDeliveryPoint', 'PostAjax::removeDeliveryPoint', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/updateAddressAjax', 'PostAjax::updateAddressAjax', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/addProductAppend', 'PostAjax::addProductAppend', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/changeRefundPoint', 'PostAjax::changeRefundPoint', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);
$routes->add('{locale}/suggestionAddress', 'PostAjax::suggestionAddress', ['namespace' => 'App\Modules\OrderManage\SingleOrder\Controllers']);

// Đơn nhanh
$routes->add('{locale}/tao-don-nhanh', 'MultipleOrders::multipleOrders', ['namespace' => 'App\Modules\OrderManage\MultipleOrders\Controllers']);
$routes->add('{locale}/nhap-don-nhanh', 'MultipleOrders::ttDonNhanh', ['namespace' => 'App\Modules\OrderManage\MultipleOrders\Controllers']);
$routes->add('{locale}/xac-nhan-don-nhanh', 'MultipleOrders::confirmMultipleOrders', ['namespace' => 'App\Modules\OrderManage\MultipleOrders\Controllers']);
$routes->add('{locale}/choosePickupAddressFast', 'MultipleOrders::choosePickupAddressFast', ['namespace' => 'App\Modules\OrderManage\MultipleOrders\Controllers']);
$routes->add('{locale}/changeFees', 'MultipleOrders::changeFees', ['namespace' => 'App\Modules\OrderManage\MultipleOrders\Controllers']);
$routes->add('{locale}/reCaculateFees', 'MultipleOrders::reCaculateFees', ['namespace' => 'App\Modules\OrderManage\MultipleOrders\Controllers']);
$routes->add('{locale}/export-excel-error-files', 'MultipleOrders::exportExcelErrorFiles', ['namespace' => 'App\Modules\OrderManage\MultipleOrders\Controllers']);

//Danh sách đơn hàng
$routes->add('{locale}/danh-sach-don-hang', 'ListOrders::ListOrders', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/danh-sach-don-hang/(:segment)', 'ListOrders::ListOrders/$1', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/danh-sach-don-hang/(:segment)/(:any)', 'ListOrders::ListOrders/$1/$2', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/chi-tiet-don-hang/(:any)', 'ListOrders::orderDetail/$1', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/ApprovalOrder', 'OrderHandle::ApprovalOrder', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/ApprovalOrderMulti', 'OrderHandle::ApprovalOrderMulti', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/ApprovalOrderAll', 'OrderHandle::ApprovalOrderAll', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/changeInfo', 'OrderHandle::changeInfo', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/changeInfoOrder', 'OrderHandle::changeInfoOrder', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/reDelivery', 'OrderHandle::reDelivery', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/refundOrder', 'OrderHandle::refundOrder', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/cancelOrder', 'OrderHandle::cancelOrder', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/CancelOrderMulti', 'OrderHandle::CancelOrderMulti', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/cancelOrderAll', 'OrderHandle::cancelOrderAll', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/partialConfirm', 'OrderHandle::partialConfirm', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/chinh-sua-don-hang/(:any)', 'OrderHandle::editOrderPending/$1', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/chinh-sua-don-hang/(:any)/(:number)', 'OrderHandle::editOrderPending/$1/$2', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/generate-barcode', 'OrderHandle::generateBarcode', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/generate-qrcode', 'OrderHandle::generateQRCode', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/export-excel-list-order', 'OrderHandle::exportExcel', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/DeleteOrder', 'OrderHandle::DeleteOrder', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/DeleteAllOrder', 'OrderHandle::DeleteAllOrder', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/tra-cuu-hanh-trinh-don', 'OrderHandle::searchOrdersMulti', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/setCookieNotiContract', 'ListOrders::setCookieNotiContract', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);

$routes->add('{locale}/in-don-nho/(:any)', 'ListOrders::printOrderNho/$1', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);

$routes->add('{locale}/in-don-to/(:any)', 'ListOrders::printOrderTo/$1', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);
$routes->add('{locale}/in-van-don/(:any)', 'ListOrders::printOrder/$1', ['namespace' => 'App\Modules\OrderManage\ListOrders\Controllers']);

//Tạo khiếu nại
$routes->add('{locale}/khieu-nai', 'TicketManage::khieunai', ['namespace' => 'App\Modules\TicketManage\Controllers']);
$routes->add('{locale}/danh-sach-khieu-nai', 'TicketManage::dskhieunai', ['namespace' => 'App\Modules\TicketManage\Controllers']);
$routes->add('{locale}/chi-tiet-khieu-nai', 'TicketManage::ctkhieunai', ['namespace' => 'App\Modules\TicketManage\Controllers']);

//Hành trình đơn hàng
$routes->add('{locale}/hanh-trinh-don', 'Journeys::hanhtrinh', ['namespace' => 'App\Modules\OrderManage\Journeys\Controllers']);

//Danh sách thông báo
$routes->add('{locale}/danh-sach-thong-bao', 'NotifiCation::thongbaoUser', ['namespace' => 'App\Modules\NotifiCation\Controllers']);
$routes->add('{locale}/thong-bao-vi-tien', 'NotifiCation::thongbaoVi', ['namespace' => 'App\Modules\NotifiCation\Controllers']);

//Lịch sử đơn hàng
$routes->add('{locale}/lich-su-don-hang', 'OrdersHistory::lsdonhang', ['namespace' => 'App\Modules\OrderManage\OrdersHistory\Controllers']);

//Thống kê
$routes->add('{locale}/thong-ke', 'Statistic::thongke', ['namespace' => 'App\Modules\Statistic\Controllers']);
$routes->add('{locale}/generate-barcode', 'ScanBarcode::generateBarcode', ['namespace' => 'App\Modules\ScanBarcode\Controllers']);

// $routes->add('{locale}/ky-xac-nhan', 'AccountInfo::editAcountSignature', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/checkVA', 'AccountInfo::checkVA', ['namespace' => 'App\Modules\AccountInfo\Controllers']);
$routes->add('{locale}/activeVA', 'AccountInfo::activeVA', ['namespace' => 'App\Modules\AccountInfo\Controllers']);



/**
 * --------------------------------------------------------------------
 * HMVC Routing
 * --------------------------------------------------------------------
 */

/*foreach(glob(APPPATH . 'Modules/*', GLOB_ONLYDIR) as $item_dir)
{
if (file_exists($item_dir . '/Config/Routes.php'))
{
require_once($item_dir . '/Config/Routes.php');
}
}*/

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
