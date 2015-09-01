<?php

namespace Vitlabs\GUIAdminLTE\MenuPresenters;

use Exception;
use Vitlabs\GUICore\Contracts\Menu\DividerContract;
use Vitlabs\GUICore\Contracts\Menu\HeadingContract;
use Vitlabs\GUICore\Contracts\Menu\LinkContract;
use Vitlabs\GUICore\Contracts\Menu\MenuContract;

class BootstrapDropdownMenuPresenter extends MenuPresenter
{
    // Views
    protected $viewsPrefix = 'menus.bootstrap.dropdown.';

    protected function presentDivider(DividerContract $divider)
    {
        // Get divider attributes
        $attrs = $divider->getAttributes();

        // Add divider class
        $divider->addClass('divider', $attrs);

        // Add divider attributes
        $divider->attr('role', 'separator', $attrs);

        // Present divider
        return $this->renderView('divider', [
            'attrs' => $divider->parseAttributes(true, $attrs)
        ]);
    }

    protected function presentHeading(HeadingContract $heading)
    {
        // Get heading attributes
        $attrs = $heading->getAttributes();

        // Add heading class
        $heading->addClass('dropdown-header', $attrs);

        // Present heading
        return $this->renderView('heading', [
            'attrs' => $heading->parseAttributes(true, $attrs),
            'title' => $heading->title()
        ]);
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
            // Present submenu
            $submenu = $this->presentSubmenu($link->getSubmenuInstance());
        }

        // Set href attribute
        $link->attr('href', $link->href(), $attrs);

        // Present link
        return $this->renderView('link', [
            'attrs' => $link->parseAttributes(true, $attrs),
            'title' => $link->title(),
            'icon' => $link->icon(),
            'linkClass' => $linkClass,
            'submenu' => $submenu
        ]);
    }

    protected function openWrap(MenuContract $menu)
    {
        return '<ul class="dropdown-menu" role="menu">';
    }

    protected function closeWrap(MenuContract $menu)
    {
        return '</ul>';
    }

}
