<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\WindowContract;
use Vitlabs\GUICore\Traits\ContainerTrait;
use Vitlabs\GUICore\Traits\DataTrait;

class Window extends Element implements WindowContract
{
	use ContainerTrait, DataTrait {
		DataTrait::__construct insteadof ContainerTrait;
	}

	public function needResources()
	{
		return [

			'css' => [

				// Bootstrap
				'AdminLTE-2.2.0/bootstrap/css/bootstrap.min.css',

				// Font Awesome Icons
				'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',

				// Ionicons
				'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',

				// Theme style
				'AdminLTE-2.2.0/dist/css/AdminLTE.min.css',

				// AdminLTE Skins
				'AdminLTE-2.2.0/dist/css/skins/_all-skins.min.css',

			    // Custom styles
			    'custom/css/style.css',

			],

			'js' => [

				// jQuery
				'AdminLTE-2.2.0/plugins/jQuery/jQuery-2.1.4.min.js',

				// Bootstrap JS
				'AdminLTE-2.2.0/bootstrap/js/bootstrap.min.js',

				// SlimScroll
				'AdminLTE-2.2.0/plugins/slimScroll/jquery.slimscroll.min.js',

				// FastClick
				'AdminLTE-2.2.0/plugins/fastclick/fastclick.min.js',

				// AdminLTE App
				'AdminLTE-2.2.0/dist/js/app.min.js',

			    // Custom
			    'custom/js/main.js',

			],

		];
	}

	public function render()
	{
		$this->setDefault('breadcrumbs', []);
		$this->setDefault('sidebarCollapse', false);
		
		$this->setOptionals([
			'title',
			'logo_text',
			'logo_href',
			'heading',
			'heading_small',
			'favicon',
		]);

		$data = $this->getData();

		$data['content'] = $this->renderElements($this->getPositionElements());
		$data['footer'] = $this->renderElements($this->getPositionElements('footer'));

		$data['skin'] = config('gui-adminlte.skin');
		$data['layout'] = config('gui-adminlte.layout');
		$data['sidebarCollapsed'] = config('gui-adminlte.sidebarCollapsed');
		$data['favicon'] = config('gui-adminlte.favicon');
		$data['searchName'] = config('gui-adminlte.search.name');
		$data['searchMethod'] = config('gui-adminlte.search.method');
		$data['searchAction'] = config('gui-adminlte.search.action');
		$data['searchPlaceholder'] = trans('gui-adminlte::window.searchPlaceholder');

		return $this->renderView('window', $data);
	}

	public function addBreadcrumb($title, $url = null)
	{
		$breadcrumbs = $this->get('breadcrumbs');
		$breadcrumbs[] = [$title, $url];
		$this->set('breadcrumbs', $breadcrumbs);
	}

	public function getDefaultPositionName()
	{
		return 'content';
	}
}