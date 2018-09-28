<?php
/**
 * @author Mahdi Shad ( ramtin2025@yahoo.com )
 * @copyright Copyright iPresta.IR 2011-2018
 * @license   https://opensource.org/licenses/MIT
 * @link iPresta.IR
 *
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class FontManager extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'fontmanager';
        $this->tab = 'i18n_localization';
        $this->version = '1.0.0';
        $this->author = 'iPresta.ir';
        $this->need_instance = 0;

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Multilingual font manager');
        $this->description = $this->l('This module allows you to choose custom font for each language on BackOffice and FrontOffice');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public $tabs = array(
        array(
            'name' => array(
                'en' => 'Font manager',
                'fa' => 'مدیریت فونت',
            ),
            'class_name' => 'AdminFontManager',
            'visible' => true,
            'parent_class_name' => 'AdminInternational',
        ),
    );

    public function install()
    {
        parent::install();
        if (!version_compare(_PS_VERSION_, '1.7', '>=')) {
            $this->addTab(
                $this->name,
                $this->name,
                'Font manager',
                'AdminFontManager',
                Tab::getIdFromClassName('AdminParentLocalization')
            );
        }
        $this->modifyCssFile();

        return $this->registerHook('header') &&
            $this->registerHook('backOfficeHeader') &&
            $this->registerHook('displayBackOfficeHeader') &&
            $this->registerHook('moduleRoutes') &&
            $this->registerHook('displayHeader');
    }

    public function modifyCssFile()
    {
        // Front
        $pattern = _PS_MODULE_DIR_ . $this->name . '/views/css/front_pattern.css';
        $file = _PS_MODULE_DIR_ . $this->name . '/views/css/front.css';
        $cssContent = Tools::file_get_contents($pattern);
        $newContent = str_replace('CURRENT_SHOP_URL', Tools::rtrimString($this->context->shop->getBaseURL(), '/'), $cssContent);
        file_put_contents($file, $newContent);
        // Admin
        $pattern = _PS_MODULE_DIR_ . $this->name . '/views/css/admin_pattern.css';
        $file = _PS_MODULE_DIR_ . $this->name . '/views/css/admin.css';
        $cssContent = Tools::file_get_contents($pattern);
        $newContent = str_replace('CURRENT_SHOP_URL', Tools::rtrimString($this->context->shop->getBaseURL(), '/'), $cssContent);
        file_put_contents($file, $newContent);
    }

    public function uninstall()
    {
        if (!version_compare(_PS_VERSION_, '1.7')) {
            $this->removeTab('AdminFontManager');
        }
        return parent::uninstall();
    }

    /**
     * Add the CSS & JavaScript files you want to be loaded in the BO.
     */
    public function hookBackOfficeHeader()
    {
        if (is_dir(_PS_MODULE_DIR_ . $this->name . '/views/fonts/admin/' . $this->context->language->iso_code)) {
            $this->context->controller->addCSS($this->_path . 'views/css/admin.css');
        }
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        if (is_dir(_PS_MODULE_DIR_ . $this->name . '/views/fonts/front/' . $this->context->language->iso_code)) {
            $this->context->controller->addCSS($this->_path . 'views/css/front.css');
        }
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (is_dir(_PS_MODULE_DIR_ . $this->name . '/views/fonts/admin/' . $this->context->language->iso_code)) {
            $this->context->controller->addCSS($this->_path . 'views/css/admin.css');
        }
        /* Place your code here. */
    }

    public function hookDisplayHeader()
    {
        if (is_dir(_PS_MODULE_DIR_ . $this->name . '/views/fonts/front/' . $this->context->language->iso_code)) {
            $this->context->controller->addCSS($this->_path . 'views/css/front.css');
        }
        /* Place your code here. */
    }

    public function hookModuleRoutes()
    {
        $array = array(
            'font_rule' => array(
                'controller' => 'fontLoader',
                'rule' => 'fontLoader',
                'keywords' => array(),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'fontmanager',
                    'controller' => 'fontLoader',
                )
            ),
        );
        return $array;
    }

    /**
     * Tab installation
     **/
    public function addTab($moduleName, $moduleBasName, $tabName, $tabClass, $id_parent)
    {
        $tab = new TabCore();
        $languages = Language::getLanguages();
        foreach ($languages as $language) {
            $tab->name[$language['id_lang']] = $tabName;
        }
        $tab->class_name = $tabClass;
        if ($moduleBasName == $moduleName) {
            $tab->module = $moduleBasName;
        } else {
            $tab->module = $moduleName;
        }
        $tab->id_parent = $id_parent;
        if (!$tab->save()) {
            return false;
        }
        return true;
    }

    /**
     * Remove tab
     **/
    private function removeTab($tabClass)
    {
        $idTab = Tab::getIdFromClassName($tabClass);
        if ($idTab != 0) {
            $tab = new Tab($idTab);
            if (!$tab->delete()) {
                return false;
            }
        }
        return true;
    }
}
