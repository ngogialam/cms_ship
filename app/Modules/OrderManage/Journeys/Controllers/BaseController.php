<?php
namespace App\Modules\OrderManage\Journeys\Controllers;

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
use CodeIgniter\Validation\Validation;
use Config\App;

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
		$language = \Config\Services::language();
		$this->session = \Config\Services::session();
		$this->session->start();
		$this->validation 				=  \Config\Services::validation();
		$this->callServer    			= new CallServer();
		$lang = $this->session->get('lang') ;		
		$language->setLocale($lang);
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