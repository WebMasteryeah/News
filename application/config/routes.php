<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//more detatil: http://localhost/Lab6/user_guide/general/routing.html

//****** default******
//$route['default_controller'] = "welcome";
//$route['404_override'] = '';

//****** Create **********
//$route['news/create'] = 'news/create';  //makesure CodeIgniter sees 'create' as a method instead of a new item's slug
//****** Display News **********
//$route['news/view'] = 'news/view/$1';  //specified
//$route['news'] = 'news';   //all
//****** Delete News  **********
//$route['news/(:any)'] = 'news/delete/$1';  //delete specified
//****** Hello World! ********
//$route['(:any)']='pages/view/$1';
$route['default_controller']='news/index';   //changed from "/pages/view/home" to "/home"




/* End of file routes.php */
/* Location: ./application/config/routes.php */
