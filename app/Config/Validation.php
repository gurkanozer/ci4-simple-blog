<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	public $post= [
		'title' => [
			'rules' => 'required',
			'errors' => ['required' => 'Bu alan boş bırakılamaz!']
		],
		'sub_title' => [
			'rules' => 'required',
			'errors' => ['required' => 'Bu alan boş bırakılamaz!']
		],
		'body' => [
			'rules' => 'required',
			'errors' => ['required' => 'Bu alan boş bırakılamaz!']
		],
		'category_id' => [
			'rules' => 'required',
			'errors' => ['required' => 'Bu alan boş bırakılamaz!']
		],
		'url'=>[
			'rules'=>'required',
			'errors'=>['required'=>'Bu başlık kullanılamaz!']
		]
		];
	public $image = [
		'img' => [
			'rules' => 'uploaded[img]|is_image[img]',
			'errors' => [
				'is_image' => 'Lütfen geçerli bir resim dosyası yükleyin',
				'uploaded' => 'Lütfen geçerli bir resim dosyası yükleyin'
			]
			],
			'logo' => [
				'rules' => 'uploaded[img]|is_image[img]',
				'errors' => [
					'is_image' => 'Lütfen geçerli bir resim dosyası yükleyin',
					'uploaded' => 'Lütfen geçerli bir resim dosyası yükleyin'
				]
				]
	];
	public $settings= [
		'site_name' => [
			'rules' => 'required',
			'errors' => ['required' => 'Bu alan boş bırakılamaz!']
		]
	];
	public $user= [
		'fullname'=>[
			'rules'=>'required|min_length[4]|alpha_numeric_space',
			'errors'=>['required'=>'Bu alan boş bırakılamaz!','min_length'=>'İsim en az 4 karakter olmalıdır!',
					   'alpha_numeric_space'=>'Geçersiz karakter!']
		],
		'email'=>[
			'rules'=>'required|min_length[5]|valid_email|is_unique[settings.contact_email]',
			'errors'=>['required'=>'Bu alan boş bırakılamaz!',
					   'min_length'=>'E mail en az 5 karakterden oluşmalıdır!',
					   'valid_email'=>'Lütfen geçerli bir eposta adresi giriniz.',
					   'is_unique'=>'Kişisel eposta ile iletişim postası aynı olamaz.']
		]
	];
	public $password = [
		'password'=>[
			'rules'=>'required|min_length[8]',
			'errors'=>['required'=>'Şifre boş bırakılamaz!',
					   'min_length'=>'Şifre en az 8 karakterden oluşmalıdır!']
		],
		're_password'=>[
			'rules'=>'required|matches[password]',
			'errors'=>['required'=>'Şifre kontrol alanı boş bırakılamaz!',
					   'matches'=>'Girilen şifreler eşleşmedi!']
		]
		];
	public $login =[
		'email'=>[
			'rules'=>'required|min_length[5]|valid_email',
			'errors'=>['required'=>'Bu alan boş bırakılamaz!',
					   'min_length'=>'E mail en az 5 karakterden oluşmalıdır!',
					   'valid_email'=>'Lütfen geçerli bir eposta adresi giriniz.']
		],
		'password'=>[
			'rules'=>'required|min_length[8]',
			'errors'=>['required'=>'Şifre boş bırakılamaz!',
					   'min_length'=>'Şifre en az 8 karakterden oluşmalıdır!']
		]
		];
	public $email_settings=[
		'protocol'=>['rules'=>'required',
					 'errors'=>['required'=>'Bu alan boş bırakılamaz!']],			 
		'port'=>['rules'=>'required',
		'errors'=>['required'=>'Bu alan boş bırakılamaz!']],
		'protocol'=>['rules'=>'required',
					 'errors'=>['required'=>'Bu alan boş bırakılamaz!']],		 
		'host'=>['rules'=>'required',
		'errors'=>['required'=>'Bu alan boş bırakılamaz!']],
		'user'=>['rules'=>'required|valid_email',
					 'errors'=>['required'=>'Bu alan boş bırakılamaz!',
					 'valid_email'=>'Lütfen geçerli bir eposta adresi giriniz.']],
					 
		'user_name'=>['rules'=>'required',
		'errors'=>['required'=>'Bu alan boş bırakılamaz!']],
		'password'=>['rules'=>'required|min_length[5]',
					 'errors'=>['required'=>'Bu alan boş bırakılamaz!',
					 'min_length'=>'Şifre en az 5 karakterden oluşmalıdır!']],
			 
	];
	public $email =[
		'fullname'=>['rules'=>'required',
					 'errors'=>['required'=>'Bu alan boş bırakılamaz!']],
		'email'=>['rules'=>'required|valid_email',
				  'errors'=>['required'=>'Bu alan boş bırakılamaz!',
							   'valid_email'=>'Lütfen geçerli bir eposta adresi giriniz.']],
		'subject'=>['rules'=>'required',
					'errors'=>['required'=>'Bu alan boş bırakılamaz!']],
		'message'=>['rules'=>'required',
					'errors'=>['required'=>'Bu alan boş bırakılamaz!']]
	];
}
