<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\LoginContract;
use Vitlabs\GUICore\Traits\DataTrait;

class Login extends Element implements LoginContract {
    
	use DataTrait;

	public function needResources()
	{
		return [

			'css' => [

				// Bootstrap
				'AdminLTE-2.2.0/bootstrap/css/bootstrap.min.css',

				// Font Awesome Icons
				'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',

				// Theme style
				'AdminLTE-2.2.0/dist/css/AdminLTE.min.css',

				// Custom styles
			    'custom/css/style.css',

			],

			'js' => [

				// jQuery
				'AdminLTE-2.2.0/plugins/jQuery/jQuery-2.1.4.min.js',

				// Bootstrap JS
				'AdminLTE-2.2.0/bootstrap/js/bootstrap.min.js',

			    // Custom
			    'custom/js/main.js',

			],

		];
	}

	public function render()
	{
		$this->setOptionals([
	    	'title',
	    	'heading',
			'logo',
	    	'favicon',
	    	'fieldLoginName',
	    	'fieldPasswordName',
	    	'webURL',
		]);

		$this->setDefault('form', []);
		$this->setDefault('showError', false);

		$data = $this->getData();

		$data['errorMessage'] = trans('gui-adminlte::login.errorMessage');
		$data['showWeb'] = trans('gui-adminlte::login.showWeb');
		$data['login'] = trans('gui-adminlte::login.login');
		$data['fieldLoginPlaceholder'] = trans('gui-adminlte::login.fieldLogin');
		$data['fieldPasswordPlaceholder'] = trans('gui-adminlte::login.fieldPassword');
		$data['backgroundImage'] = config('gui-adminlte.loginBackgroundImage');

		return $this->renderView('login', $data);
	}

}
