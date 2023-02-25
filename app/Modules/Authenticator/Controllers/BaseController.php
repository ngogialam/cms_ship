<?php
namespace App\Modules\Authenticator\Controllers;

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
use Google\Client as Google;
use App\Modules\Authenticator\Controllers\Authenticator;
use App\Modules\Authenticator\Controllers\Common;
use App\Libraries\Credis;
use App\Libraries\Clogger;
use App\Modules\Authenticator\Models\Authenticator as AuthenticatorModels;
use App\Libraries\AuthenticatorUser;

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
		$this->google_client    			= new Google();
		$this->authenticator = new Authenticator();//Call class Authenticator
		$this->AuthenticatorModels = new AuthenticatorModels($logger);//Call class Authenticator
		$this->common = new Common();//Call class Authenticator
		$this->clog = new Clogger(\Config\Services::request());

		//--------------------------------------------------------------------

		$this->google_client->setClientId(GG_CLIENT); //Define your ClientID

		$this->google_client->setClientSecret(GG_SECRET); //Define your Client Secret Key

		$this->google_client->setRedirectUri(GG_CALLBACK); //Define your Redirect Uri

		$this->google_client->addScope('email');

		$this->google_client->addScope('profile');

		$this->redis = new Credis();
		// $this->clog->info('ANH SỌT','SỌT','========AHIHIII=========');

		$this->authenticatorUser = new AuthenticatorUser();
		// E.g.:
		//Pagination
		$this->pager 					= \Config\Services::pager();
		$this->uri = explode('/', uri_string());
		$this->segment = $this->uri['0'];
		$this->page = $this->uri['1'];
		if(isset($get['page'])){
			$this->page = $get['page'];
		}
		
	}
}