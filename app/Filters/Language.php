<?php
namespace App\Filters;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\App;

class Language implements FilterInterface
{
    public function before(RequestInterface $request , $arguments = null){
        helper("cookie");
        $app = new App();
        $uri = $request->uri->getPath();
        $uriArr = explode('/', $uri);
        $params = $_SERVER['QUERY_STRING'];
		$lang = get_cookie('__locale');
        if($lang != ''){
            $preUri = $lang;
        }else{
            $preUri = 'vi';
        }
        if (!in_array($uriArr[0], $app->supportedLocales)) {
            if($uriArr[0] !=''){
                
        
                $url = '';
                for($i = 0; $i < count($uriArr) ;$i++ )
                {
                    $url .= '/'.$uriArr[$i];
                }
                if($params != ''){
                    return redirect()->to('/'.$preUri.'/'.$url.'?'.$params);
                }else{
                    return redirect()->to('/'.$preUri.'/'.$url);
                }
            }else{
                return redirect()->to('/'.$preUri.'');
            }
        }
        
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
} 