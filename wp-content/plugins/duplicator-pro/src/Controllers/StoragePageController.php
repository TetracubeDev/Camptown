<?php

/**
 * Storage page controller
 *
 * @package Duplicator
 * @copyright (c) 2021, Snapcreek LLC
 *
 */

namespace Duplicator\Controllers;

use Duplicator\Core\Controllers\ControllersManager;
use Duplicator\Core\Controllers\AbstractMenuPageController;

class StoragePageController extends AbstractMenuPageController
{
    /**
     * tabs menu
     */
    const L2_SLUG_MAIN_STORAGE = 'storage';
    /**
     * Class constructor
     */
    protected function __construct()
    {
        $this->parentSlug   = ControllersManager::MAIN_MENU_SLUG;
        $this->pageSlug     = ControllersManager::STORAGE_SUBMENU_SLUG;
        $this->pageTitle    = __('Storage', 'duplicator-pro');
        $this->menuLabel    = __('Storage', 'duplicator-pro');
        $this->capatibility = self::getDefaultCapadibily();
        $this->menuPos      = 40;

        add_filter('duplicator_render_page_content_' . $this->pageSlug, array($this, 'renderContent'));
    }

    /**
     * Render page content
     *
     * @param string[] $currentLevelSlugs current page menu levels slugs
     * @return void
     */
    public function renderContent($currentLevelSlugs)
    {
        switch ($currentLevelSlugs[1]) {
            case StoragePageController::L2_SLUG_MAIN_STORAGE:
            default:
                include(DUPLICATOR____PATH . '/views/storage/storage.controller.php');
                break;
        }
    }
}
