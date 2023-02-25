<?php
namespace App\Modules\OrderManage\MultipleOrders\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Libraries\CallServer;
use App\Libraries\Credis;
use App\Libraries\functionCommon;
use App\Modules\AccountInfo\Controllers\UserCommon;
use App\Libraries\Clogger;
use App\Modules\WarehouseManage\Models\WarehouseManageModels;
use App\Modules\Authenticator\Models\AuthenticatorDetailUserModels;
use App\Modules\WalletManage\Models\WalletManageModels;
use App\Libraries\AuthenticatorUser;
use App\Libraries\getApiLocation;
use App\Modules\OrderManage\SingleOrder\Models\SingleOrderModel;
use App\Modules\OrderManage\MultipleOrders\Models\MultipleOrdersModel;
use App\Libraries\getDataBalance;

class BaseController extends Controller

{
	
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->validation 				=  \Config\Services::validation();
		$this->callServer    			= new CallServer();
		$this->authenticatorDetailUser = new AuthenticatorDetailUserModels($logger);//Get DeviceID
		$this->walletManageModels = new WalletManageModels($logger);
		$this->authenticatorUser = new AuthenticatorUser();
		$this->userCommon = new UserCommon();
		$this->singleOrderModel = new SingleOrderModel($logger);
		
		$this->clog = new Clogger(\Config\Services::request());
		$this->redis = new Credis();
		$this->functionCommon = new functionCommon();
		$this->api_location_address = new getApiLocation();
		$this->warehouseManageModel = new WarehouseManageModels($logger);
		$this->multipleOrders = new MultipleOrdersModel($logger);
		$this->arrProductCategory = json_decode($this->redis->get('productCategory'));
        if (empty($this->arrProductCategory)) {
            $this->arrProductCategory = array(
                '1' => 'Thời Trang Nam',
                '2' => 'Thời Trang Nữ',
                '3' => 'Mẹ & Bé',
                '4' => 'Điện Thoại & Phụ Kiện',
                '5' => 'Thiết Bị Điện Tử',
                '6' => 'Máy Tính & Laptop',
                '7' => 'Máy Ảnh & Máy Quay Phim',
                '8' => 'Đồng Hồ',
                '9' => 'Giày Dép Nam',
                '10' => 'Thiết Bị Điện Gia Dụng',
                '11' => 'Thể Thao & Du Lịch',
                '12' => 'Ô Tô & Xe Máy & Xe Đạp',
                '13' => 'Balo & Túi Ví Nam',
                '14' => 'Đồ Chơi',
                '15' => 'Chăm Sóc Thú Cưng',
                '16' => 'Nhà Cửa & Đời Sống',
                '17' => 'Sắc Đẹp',
                '18' => 'Sức Khỏe',
                '19' => 'Giày Dép Nữ',
                '20' => 'Túi Ví Nữ',
                '21' => 'Phụ Kiện & Trang Sức Nữ',
                '22' => 'Sách, Báo & Tạp Chí',
                '23' => 'Thời Trang Trẻ Em',
                '24' => 'Giặt Giũ & Chăm Sóc Nhà Cửa'
            );
		}
		// $requiredNoteArr = Array(
        //     '1' => lang('Label.lbl_txtRequiredNote1'),
        //     '2' => lang('Label.lbl_txtRequiredNote2'),
        //     '3' => lang('Label.lbl_txtRequiredNote3')
        // );
		//Get new balance
		$this->getDataBalance = new getDataBalance();
		$this->dataBalance = $this->getDataBalance->getDataBalance();
		$this->requiredNoteArr = json_decode($this->redis->get('requiredNote'));
        if (empty($this->requiredNoteArr)) {
            $this->requiredNoteArr = array(
				'1' => lang('Label.lbl_txtRequiredNote1'),
				'2' => lang('Label.lbl_txtRequiredNote2'),
				'3' => lang('Label.lbl_txtRequiredNote3')
			);
			$this->redis->set('requiredNote', json_encode($this->requiredNoteArr, JSON_UNESCAPED_UNICODE));
		}
		//--------------------------------------------------------------------

        // $this->common = new SingleModels();
		//--------------------------------------------------------------------
		// E.g.:
		$this->pager 					= \Config\Services::pager();
		$this->uri = explode('/', uri_string());
		$this->segment = $this->uri['0'];
		$this->page = $this->uri['1'];
		if(isset($get['page'])){
			$this->page = $get['page'];
		}
	}
}