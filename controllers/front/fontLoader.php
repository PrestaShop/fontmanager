<?php
/**
 * @author Mahdi Shad ( ramtin2025@yahoo.com )
 * @copyright Copyright iPresta.IR
 * @license   https://opensource.org/licenses/MIT
 * @link iPresta.IR
 *
 */

class FontmanagerfontLoaderModuleFrontController extends ModuleFrontController
{
    public function __construct()
    {
        parent::__construct();
        $this->context = Context::getContext();
    }

    public function postProcess()
    {
        $type = Tools::getValue('t');
        $weight = Tools::getValue('w');
        $admin = Tools::getValue('a') ? 'admin' : 'front';
        $this->getFile($type, $weight, $admin);
        return parent::postProcess();
    }

    public function setMedia()
    {
        parent::setMedia();
        //$this->addCSS(_MODULE_DIR_ . $this->module->name . '/views/css/vouchers.css');
        //$this->addJS(_MODULE_DIR_ . $this->module->name . '/views/js/vouchers.js');
    }

    public function getFile($type, $weight, $admin = 'front') //1
    {
        Tools::redirect(
            $this->context->shop->getBaseURL() .
            'modules/fontmanager/views/fonts/' .
            $admin .
            '/' .
            $this->context->language->iso_code .
            '/' .
            $admin .
            ($weight ? '-' . $weight : '') .
            '.' .
            $type
        );
    }
}
