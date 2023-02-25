<?php
namespace App\Modules\AccountInfo\Controllers;

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
use App\Libraries\getDataBalance;
use App\Modules\AccountInfo\Models\AccountInfoModels;
use App\Modules\Banks\Models\BanksModels;

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
		helper("cookie");
		$lang = get_cookie('__locale');
		if($lang == ''){
			setcookie ("__locale",'vi',time()+ (10 * 365 * 24 * 60 * 60) , '/');
		}


		$this->validation 				=  \Config\Services::validation();
		$this->callServer    			= new CallServer();
		$this->userCommon = new UserCommon();
		$this->clog = new Clogger(\Config\Services::request());
		$this->authenticatorUser = new AuthenticatorUser();
		$this->AccountInfoModels = new AccountInfoModels($logger);
		$this->banksModels = new BanksModels($logger);

		//Get new balance
		$this->getDataBalance = new getDataBalance();
		$this->dataBalance = $this->getDataBalance->getDataBalance();
		
		//--------------------------------------------------------------------
		// E.g.:
		$this->redis = new Credis();
		$this->krd = get_cookie('__krd');
		if(!$this->krd){
			header("Location: ".base_url('/'));
			die;
		}
		$this->authenticator = new Authenticator();//Call class Authenticator
		$this->pager 					= \Config\Services::pager();
		$this->uri = explode('/', uri_string());
		$this->segment = $this->uri['0'];
		$this->page = $this->uri['1'];
		if(isset($get['page'])){
			$this->page = $get['page'];
		}  
	}
}