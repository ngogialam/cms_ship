<?php
namespace App\Modules\OrderManage\SingleOrder\Controllers;

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
use App\Libraries\getApiLocation;
use App\Modules\OrderManage\Common\Models\CommonModels;
use App\Modules\OrderManage\SingleOrder\Models\SingleOrderModel;
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
        $this->common = new CommonModels();
        $this->warehouseManageModels = new WarehouseManageModels($logger);
		
		$this->clog = new Clogger(\Config\Services::request());
		$this->redis = new Credis();
		$this->api_location_address = new getApiLocation();
		$this->krd = get_cookie('__krd');

		//Get new balance
		$this->getDataBalance = new getDataBalance();
		$this->dataBalance = $this->getDataBalance->getDataBalance();
		//--------------------------------------------------------------------
		$this->requiredNoteArr = json_decode($this->redis->get('requiredNote'));
        if (empty($this->requiredNoteArr)) {
            $requiredNoteArr = array(
				'1' => lang('Label.lbl_txtRequiredNote1'),
				'2' => lang('Label.lbl_txtRequiredNote2'),
				'3' => lang('Label.lbl_txtRequiredNote3')
            );
			$this->redis->set('requiredNote', json_encode($requiredNoteArr, JSON_UNESCAPED_UNICODE));
        }
		$lang = get_cookie('__locale');
		if($lang != ''){
			$this->preUri = $lang;
		}else{
			$this->preUri = 'vi';
		}
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