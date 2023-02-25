<?php
namespace App\Modules\WalletManage\Controllers;

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
use App\Modules\AccountInfo\Controllers\UserCommon;
use App\Libraries\Clogger;
use App\Modules\WarehouseManage\Models\WarehouseManageModels;
use App\Modules\Authenticator\Models\AuthenticatorDetailUserModels;
use App\Modules\WalletManage\Models\WalletManageModels;
use App\Libraries\AuthenticatorUser;
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
		$this->clog = new Clogger(\Config\Services::request());
		$this->redis = new Credis();
		$this->krd = get_cookie('__krd');
		
		if(!$this->krd){
			header("Location: ".base_url('/'));
			die;
		}
		//Get new balance
		$this->getDataBalance = new getDataBalance();
		$this->dataBalance = $this->getDataBalance->getDataBalance();
		//--------------------------------------------------------------------
		// E.g.:
		$this->pager 					= \Config\Services::pager();

		$this->crossCheck = (array) json_decode($this->redis->get('CROSS_CHECK'));
        if (empty($this->crossCheck)) {
            $crossCheck = array(
				'1' => 'Tự đối soát',
				'2' => 'Đối soát thứ 2,4,6',
				'3' => 'Đối soát thứ 2,5',
				'4' => 'Đối soát thứ 4',
				'5' => 'Đối soát hàng ngày',
            );
			$this->crossCheck  = $crossCheck;
			$this->redis->set('CROSS_CHECK', json_encode($crossCheck, JSON_UNESCAPED_UNICODE));
        }
		// $this->uri = explode('/', uri_string());
		// $this->segment = $this->uri['0'];
		// $this->page = $this->uri['1'];
		// if(isset($get['page'])){
		// 	$this->page = $get['page'];
		// }
	}
}