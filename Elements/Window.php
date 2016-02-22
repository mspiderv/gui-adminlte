<?php

namespace Vitlabs\GUIAdminLTE\Elements;

use Vitlabs\GUIAdmin\Contracts\Elements\WindowContract;
use Vitlabs\GUICore\Traits\ContainerTrait;
use Vitlabs\GUICore\Traits\DataTrait;
use Vitlabs\GUIAdminLTE\MenuPresenters\BasicMenuPresenter;
use Vitlabs\GUIAdminLTE\MenuPresenters\BootstrapNavbarMenuPresenter;

class Window extends Element implements WindowContract
{
	use ContainerTrait, DataTrait {
		DataTrait::__construct insteadof ContainerTrait;
	}

    protected $sidebarMenuPresenter = null;
    protected $navbarMenuPresenter = null;

	public function needResources()
	{
		return [

			'css' => [

				// Bootstrap
				'~adminlte/bootstrap/css/bootstrap.min.css',

				// Font Awesome Icons
				'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',

				// Ionicons
				'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',

				// Theme style
				'~adminlte/dist/css/AdminLTE.min.css',

				// AdminLTE Skins
				'~adminlte/dist/css/skins/_all-skins.min.css',

                // PNofity
                '~pnotify/pnotify.custom.min.css',

			    // Custom styles
			    '~custom/css/style.css',

			],

			'js' => [

				// jQuery
				'~adminlte/plugins/jQuery/jQuery-2.1.4.min.js',

				// Bootstrap JS
				'~adminlte/bootstrap/js/bootstrap.min.js',

				// SlimScroll
				'~adminlte/plugins/slimScroll/jquery.slimscroll.min.js',

				// FastClick
				'~adminlte/plugins/fastclick/fastclick.min.js',

				// AdminLTE App
				'~adminlte/dist/js/app.min.js',

                // PNofity
                '~pnotify/pnotify.custom.min.js',
                '~pnotify/loader.js',

			    // Custom
			    '~custom/js/main.js',

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
            'webURL',
            'logoutURL',
		]);

		$data = $this->getData();

		$data['content'] = $this->renderElements($this->getPositionElements());
		$data['footer'] = $this->renderElements($this->getPositionElements('footer'));

		$data['skin'] = $this->config('skin');
		$data['layout'] = $this->config('layout');
		$data['sidebarCollapsed'] = $this->config('sidebarCollapsed');
		$data['favicon'] = $this->config('favicon');
		$data['searchName'] = $this->config('search.name');
		$data['searchMethod'] = $this->config('search.method');
		$data['searchAction'] = $this->config('search.action');

        $data['searchPlaceholder'] = $this->trans('window.searchPlaceholder');
        $data['showWeb'] = $this->trans('window.showWeb');
        $data['logout'] = $this->trans('window.logout');

        // Menus
        $data['sidebarMenu'] = $this->getSidebarMenuPresenter()->present($this->getMenu('sidebar'));
        $data['navbarMenu'] = $this->getNavbarMenuPresenter()->present($this->getMenu('navbar'));

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

    public function getSidebarMenu()
    {
        return $this->getMenu('sidebar');
    }

    public function getNavbarMenu()
    {
        return $this->getMenu('navbar');
    }

    protected function getSidebarMenuPresenter()
    {
        if (is_null($this->sidebarMenuPresenter))
        {
            /* Menu presenter */
            // Create menu presenter
            $this->sidebarMenuPresenter = new BasicMenuPresenter();

            // Config
            $this->sidebarMenuPresenter->setWrapClass('sidebar-menu');
            $this->sidebarMenuPresenter->setHeadingClass('header');
            $this->sidebarMenuPresenter->setLinkTitleTag('span');
            $this->sidebarMenuPresenter->setLinkClassWithSubmenu('treeview');
            $this->sidebarMenuPresenter->setLinkTitleSuffixWithSubmenu('<i class="fa fa-angle-left pull-right"></i>');

            /* Submenu presenter*/
            // Create submenu presenter
            $submenuPresenter = new BasicMenuPresenter('sidebar-menu');

            // Resursive presenters
            $submenuPresenter->setSubmenuPresenter($submenuPresenter);

            // Set submenu presenter to menu presenter
            $this->sidebarMenuPresenter->setSubmenuPresenter($submenuPresenter);

            // Config
            $submenuPresenter->setWrapClass('treeview-menu');
            $submenuPresenter->setLinkTitleTag('span');
            $submenuPresenter->setLinkTitleSuffixWithSubmenu('<i class="fa fa-angle-left pull-right"></i>');
        }

        return $this->sidebarMenuPresenter;
    }

    protected function getNavbarMenuPresenter()
    {
        if (is_null($this->navbarMenuPresenter))
        {
            $this->navbarMenuPresenter = new BootstrapNavbarMenuPresenter;
        }

        return $this->navbarMenuPresenter;
    }

}