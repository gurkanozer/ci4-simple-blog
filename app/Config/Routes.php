<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Site\Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
//$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->add('/', 'Site\Home::index');
$routes->add('/home', 'Site\Home::index');
$routes->get('/post/(:any)', 'Site\Posts::index/$1');
$routes->addRedirect('/post', '/');
$routes->get('/about', 'Site\About::index');
$routes->get('/contact', 'Site\Contact::index');
$routes->post('/contact', 'Site\Contact::send_email');
$routes->get('/categories/(:any)', 'Site\Posts::categories/$1');
$routes->addRedirect('/categories', '/');
$routes->get('/search', 'Site\Home::search');

$routes->group('/login',['filter'=>'noAuth'],function($routes){
	$routes->get('','Admin\Userop::index');
	$routes->post('','Admin\Userop::login');
});
$routes->get('/logout','Admin\Userop::logout',['filter'=>'auth']);
$routes->group('admin',['filter'=>'auth'],function($routes){
	//Settings
	$routes->get('settings','Admin\Settings::index');
	$routes->post('settings','Admin\Settings::update');
	$routes->get('settings/email','Admin\EmailSettings::index');
	$routes->post('settings/email','Admin\EmailSettings::update');
	//Categories
	$routes->group('categories',function($routes){
		$routes->post('add','Admin\Categories::add');
		$routes->post('delete','Admin\Categories::delete');
		$routes->post('update/(:any)','Admin\Categories::update/$1');
		$routes->post('is_active/(:any)','Admin\Categories::is_active_setter/$1');
		$routes->get('(:any)',function($routes){
			echo view('blog_errors/not_found');
		});
	});
	//Users
	$routes->get('user','Admin\Users::index');
	$routes->post('user','Admin\Users::update');
	//Posts
	$routes->group('post',function($routes){
		$routes->get('list','Admin\Posts::index');
		$routes->add('search','Admin\Posts::search');
		$routes->add('add','Admin\Posts::add');
		$routes->post('is_active/(:any)','Admin\Posts::is_active_setter/$1');
		$routes->post('delete','Admin\Posts::delete');
		$routes->add('update/(:num)','Admin\Posts::update/$1');
		$routes->addRedirect('/','admin/post/list');
	});
	$routes->addRedirect('/','admin/post/list');
});
$routes->set404Override(function(){
	echo view('blog_errors/not_found');
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
