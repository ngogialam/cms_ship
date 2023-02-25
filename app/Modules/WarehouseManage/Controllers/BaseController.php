<?php
namespace App\Modules\WarehouseManage\Controllers;

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
use App\Modules\Authenticator\Controllers\Authenticator;
use App\Modules\AccountInfo\Controllers\UserCommon;
use App\Libraries\Clogger;
use App\Libraries\AuthenticatorUser;
use App\Modules\WarehouseManage\Models\WarehouseManageModels;
use App\Libraries\getDataBalance;
use App\Modules\Authenticator\Models\AuthenticatorDetailUserModels;

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
		$this->authenticator = new Authenticator();//Get DeviceID
		$this->userCommon = new UserCommon();
		$this->warehouseManageModel = new WarehouseManageModels($logger);
		
		$this->authenticatorDetailUser = new AuthenticatorDetailUserModels($logger);//Get DeviceID
		//--------------------------------------------------------------------
		// E.g.:
		
		$this->clog = new Clogger(\Config\Services::request());
		$this->redis = new Credis();
		$this->authenticatorUser = new AuthenticatorUser();
		$this->krd = get_cookie('__krd');
		
		//$this->dataUserAuthen = $this->userCommon->getDataUserAuthen($this->krd);
		
		// print_r($this->krd);die;
		if(!$this->krd){
			header("Location: ".base_url('/'));
			die;
		}
		//Get new balance
		$this->getDataBalance = new getDataBalance();
		$this->dataBalance = $this->getDataBalance->getDataBalance();
		// $this->wareHouseModels = new wareHouseModels();
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