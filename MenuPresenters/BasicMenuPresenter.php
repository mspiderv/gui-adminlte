<?php

namespace Vitlabs\GUIAdminLTE\MenuPresenters;

use Exception;
use Vitlabs\GUICore\Menu\AbstractMenuPresenter;
use Vitlabs\GUICore\Contracts\Menu\DividerContract;
use Vitlabs\GUICore\Contracts\Menu\HeadingContract;
use Vitlabs\GUICore\Contracts\Menu\LinkContract;
use Vitlabs\GUICore\Contracts\Menu\MenuContract;

class BasicMenuPresenter extends AbstractMenuPresenter
{
    // Views
    protected $viewsPrefix = 'menus.basic.';

    // Wrap
    protected $wrapTag = 'ul';
    protected $wrapClass = '';

    // Heading
    protected $headingTag = 'li';
    protected $headingClass = '';

    // Link
    protected $linkTag = 'li';
    protected $linkClass = '';
    protected $linkClassWithSubmenu = '';

    // Link title
    protected $linkTitleTag = '';
    protected $linkTitleClass = '';
    protected $linkTitlePrefix = '';
    protected $linkTitlePrefixWithSubmenu = '';
    protected $linkTitleSuffix = '';
    protected $linkTitleSuffixWithSubmenu = '';

    protected function openWrap(MenuContract $menu)
    {
        // Starting tag
        $result = '<' . $this->getWrapTag();

        // Add wrap class
        $wrapClass = $this->getWrapClass();

        if ($wrapClass != '')
        {
            $result .= ' class="' . $wrapClass . '"';
        }

        $result .= '>';

        return $result;
    }

    protected function closeWrap(MenuContract $menu)
    {
        // Closing tag
        return '</' . $this->getWrapTag() . '>';
    }

    protected function presentHeading(HeadingContract $heading)
    {
        // Get heading attributes
        $attrs = $heading->getAttributes();

        // Add heading class
        $headingClass = $this->getHeadingClass();

        if ($headingClass != '')
        {
            $heading->addClass($headingClass, $attrs);
        }

        // Present heading
        return $this->renderView('heading', [
            'tag' => $this->getHeadingTag(),
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
        $linkClass = $this->getLinkClass();

        // Is link active ?
        if ($link->active())
        {
            // Get active class
            $activeClass = $this->getLinkActiveClass();

            // Add active class to link classes
            $linkClass .= ' ' . $activeClass;

            // Add active class to anchor classes
            $link->addClass($activeClass, $attrs);
        }

        // Has link submenu ?
        if ($link->hasSubmenu())
        {
            // Add active class to link classes
            $linkClass .= ' ' . $this->getLinkClassWithSubmenu();

            // Present submenu
            $submenu = $this->presentSubmenu($link->getSubmenuInstance());

            // Set title prefix and suffix
            $titlePrefix = $this->getLinkTitlePrefixWithSubmenu();
            $titleSuffix = $this->getLinkTitleSuffixWithSubmenu();
        }

        // No submenu
        else
        {
            // Set title prefix and suffix
            $titlePrefix = $this->getLinkTitlePrefix();
            $titleSuffix = $this->getLinkTitleSuffix();
        }

        // Set href attribute
        $link->attr('href', $link->href(), $attrs);

        // Present link
        return $this->renderView('link', [
            'tag' => $this->getLinkTag(),
            'attrs' => $link->parseAttributes(true, $attrs),
            'title' => $link->title(),
            'titlePrefix' => $titlePrefix,
            'titleSuffix' => $titleSuffix,
            'icon' => $link->icon(),
            'linkClass' => $linkClass,
            'linkTitleTag' => $this->getLinkTitleTag(),
            'linkTitleClass' => $this->getLinkTitleClass(),
            'submenu' => $submenu
        ]);
    }

    /* Getters & Setters */
    public function getWrapTag()
    {
        return $this->wrapTag;
    }

    public function setWrapTag($wrapTag)
    {
        $this->wrapTag = $wrapTag;

        return $this;
    }

    public function getWrapClass()
    {
        return $this->wrapClass;
    }

    public function setWrapClass($wrapClass)
    {
        $this->wrapClass = $wrapClass;

        return $this;
    }

    public function getHeadingTag()
    {
        return $this->headingTag;
    }

    public function setHeadingTag($headingTag)
    {
        $this->headingTag = $headingTag;

        return $this;
    }

    public function getHeadingClass()
    {
        return $this->headingClass;
    }

    public function setHeadingClass($headingClass)
    {
        $this->headingClass = $headingClass;

        return $this;
    }

    public function getLinkTag()
    {
        return $this->linkTag;
    }

    public function setLinkTag($linkTag)
    {
        $this->linkTag = $linkTag;

        return $this;
    }

    public function getLinkClass()
    {
        return $this->linkClass;
    }

    public function setLinkClass($linkClass)
    {
        $this->linkClass = $linkClass;

        return $this;
    }

    public function getLinkClassWithSubmenu()
    {
        return $this->linkClassWithSubmenu;
    }

    public function setLinkClassWithSubmenu($linkClassWithSubmenu)
    {
        $this->linkClassWithSubmenu = $linkClassWithSubmenu;

        return $this;
    }

    public function getLinkTitleTag()
    {
        return $this->linkTitleTag;
    }

    public function setLinkTitleTag($linkTitleTag)
    {
        $this->linkTitleTag = $linkTitleTag;

        return $this;
    }

    public function getLinkTitleClass()
    {
        return $this->linkTitleClass;
    }

    public function setLinkTitleClass($linkTitleClass)
    {
        $this->linkTitleClass = $linkTitleClass;

        return $this;
    }

    public function getLinkTitlePrefix()
    {
        return $this->linkTitlePrefix;
    }

    public function setLinkTitlePrefix($linkTitlePrefix)
    {
        $this->linkTitlePrefix = $linkTitlePrefix;

        return $this;
    }

    public function getLinkTitlePrefixWithSubmenu()
    {
        return $this->linkTitlePrefixWithSubmenu;
    }

    public function setLinkTitlePrefixWithSubmenu($linkTitlePrefixWithSubmenu)
    {
        $this->linkTitlePrefixWithSubmenu = $linkTitlePrefixWithSubmenu;

        return $this;
    }

    public function getLinkTitleSuffix()
    {
        return $this->linkTitleSuffix;
    }

    public function setLinkTitleSuffix($linkTitleSuffix)
    {
        $this->linkTitleSuffix = $linkTitleSuffix;

        return $this;
    }

    public function getLinkTitleSuffixWithSubmenu()
    {
        return $this->linkTitleSuffixWithSubmenu;
    }

    public function setLinkTitleSuffixWithSubmenu($linkTitleSuffixWithSubmenu)
    {
        $this->linkTitleSuffixWithSubmenu = $linkTitleSuffixWithSubmenu;

        return $this;
    }

}
