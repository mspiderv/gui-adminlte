<?php

namespace Vitlabs\GUIAdminLTE\MenuPresenters;

use Exception;
use Vitlabs\GUICore\Menu\AbstractMenuPresenter;
use Vitlabs\GUICore\Contracts\Menu\DividerContract;
use Vitlabs\GUICore\Contracts\Menu\HeadingContract;
use Vitlabs\GUICore\Contracts\Menu\LinkContract;
use Vitlabs\GUICore\Contracts\Menu\MenuContract;

class BootstrapNavbarMenuPresenter extends AbstractMenuPresenter
{
    // Views
    protected $viewsPrefix = 'menus.bootstrap.navbar.';

    public function __construct()
    {
        $this->setSubmenuPresenter(new BootstrapDropdownMenuPresenter);
    }

    protected function presentLink(LinkContract $link)
    {
        // Submenu
        $submenu = '';

        // Get anchor attributes
        $attrs = $link->getAttributes();

        // Add link class
        $linkClass = '';

        // Is link active ?
        if ($link->active())
        {
            // Get link active class
            $activeClass = $this->getLinkActiveClass();

            // Add active class to link classes
            $linkClass .= ' ' . $activeClass;

            // Add active class to anchor classes
            $link->addClass($activeClass, $attrs);
        }

        // Has link submenu ?
        if ($link->hasSubmenu())
        {
            // Add anchor classes
            $link->addClass('dropdown-toggle', $attrs);

            // Add anchor attributes
            $link->attr('data-toggle', 'dropdown', $attrs);

            // Add submenu class to link classes
            $linkClass .= ' dropdown';

            // Present submenu
            $submenu = $this->presentSubmenu($link->getSubmenuInstance());

            // Set title suffix
            $titleSuffix = '<span class="caret"></span>';
        }

        // No submenu
        else
        {
            // Set title suffix
            $titleSuffix = '';
        }

        // Set href attribute
        $link->attr('href', $link->href(), $attrs);

        // Present link
        return $this->renderView('link', [
            'attrs' => $link->parseAttributes(true, $attrs),
            'title' => $link->title(),
            'titleSuffix' => $titleSuffix,
            'icon' => $link->icon(),
            'linkClass' => $linkClass,
            'submenu' => $submenu
        ]);
    }

}
