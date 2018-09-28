<?php
/**
 * @author Mahdi Shad ( ramtin2025@yahoo.com )
 * @copyright Copyright iPresta.IR 2011-2018
 * @license   https://opensource.org/licenses/MIT
 * @link iPresta.IR
 *
 */

class AdminFontManagerController extends ModuleAdminController
{
    public $languages;

    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
        $this->controller_name = 'AdminFontManager';
        $this->display = 'option';
        $this->languages = Language::getLanguages(false);
        $languageTabs = $languageAdminTabs = array();
        $fields = $adminFields = array();
        foreach ($this->languages as $language) {
            $languageTabs['font' . $language['id_lang']] = '(' . $language['iso_code'] . ')';
            $languageAdminTabs['admin_font' . $language['id_lang']] = '(' . $language['iso_code'] . ')';
            $fields_lang = array(
                'PS_FONT_FRONT_NORMAL_EOT_' . $language['id_lang'] => array(
                    'title' => $this->l('Normal eot format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_NORMAL_EOT_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
                'PS_FONT_FRONT_BOLD_EOT_' . $language['id_lang'] => array(
                    'title' => $this->l('Bold eot format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_BOLD_EOT_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
                'PS_FONT_FRONT_LIGHT_EOT_' . $language['id_lang'] => array(
                    'title' => $this->l('Light eot format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_LIGHT_EOT_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
                'PS_FONT_FRONT_NORMAL_TTF_' . $language['id_lang'] => array(
                    'title' => $this->l('Normal ttf format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_NORMAL_TTF_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
                'PS_FONT_FRONT_BOLD_TTF_' . $language['id_lang'] => array(
                    'title' => $this->l('Bold ttf format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_BOLD_TTF_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
                'PS_FONT_FRONT_LIGHT_TTF_' . $language['id_lang'] => array(
                    'title' => $this->l('Light ttf format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_LIGHT_TTF_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
                'PS_FONT_FRONT_NORMAL_WOFF_' . $language['id_lang'] => array(
                    'title' => $this->l('Normal woff format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_NORMAL_WOFF_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
                'PS_FONT_FRONT_BOLD_WOFF_' . $language['id_lang'] => array(
                    'title' => $this->l('Bold woff format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_BOLD_WOFF_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
                'PS_FONT_FRONT_LIGHT_WOFF_' . $language['id_lang'] => array(
                    'title' => $this->l('Light woff format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_FRONT_LIGHT_WOFF_' . $language['id_lang'],
                    'tab' => 'font' . $language['id_lang'],
                ),
            );
            $fields = array_merge($fields, $fields_lang);
            $fields_lang = array(
                'PS_FONT_ADMIN_NORMAL_EOT_' . $language['id_lang'] => array(
                    'title' => $this->l('Normal eot format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_NORMAL_EOT_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
                'PS_FONT_ADMIN_BOLD_EOT_' . $language['id_lang'] => array(
                    'title' => $this->l('Bold eot format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_BOLD_EOT_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
                'PS_FONT_ADMIN_LIGHT_EOT_' . $language['id_lang'] => array(
                    'title' => $this->l('Light eot format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_LIGHT_EOT_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
                'PS_FONT_ADMIN_NORMAL_TTF_' . $language['id_lang'] => array(
                    'title' => $this->l('Normal ttf format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_NORMAL_TTF_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
                'PS_FONT_ADMIN_BOLD_TTF_' . $language['id_lang'] => array(
                    'title' => $this->l('Bold ttf format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_BOLD_TTF_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
                'PS_FONT_ADMIN_LIGHT_TTF_' . $language['id_lang'] => array(
                    'title' => $this->l('Light ttf format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_LIGHT_TTF_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
                'PS_FONT_ADMIN_NORMAL_WOFF_' . $language['id_lang'] => array(
                    'title' => $this->l('Normal woff format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_NORMAL_WOFF_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
                'PS_FONT_ADMIN_BOLD_WOFF_' . $language['id_lang'] => array(
                    'title' => $this->l('Bold woff format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_BOLD_WOFF_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
                'PS_FONT_ADMIN_LIGHT_WOFF_' . $language['id_lang'] => array(
                    'title' => $this->l('Light woff format'),
                    'type' => 'file',
                    'name' => 'PS_FONT_ADMIN_LIGHT_WOFF_' . $language['id_lang'],
                    'tab' => 'admin_font' . $language['id_lang'],
                ),
            );
            $adminFields = array_merge($adminFields, $fields_lang);
        }
        $this->fields_options = array(
            'frontend' => array(
                'title' => $this->l(' | Front office fonts'),
                'icon' => 'icon-font',
                'tabs' => $languageTabs,
                'fields' => $fields,
                'submit' => array('title' => $this->l('Save')),
                'buttons' => array(
                    'modifyCss' => array(
                        'title' => $this->l('Regenerate frontend css'),
                        'icon' => 'process-icon-edit',
                        'href' => $this->context->link->getAdminLink('AdminFontManager') . '&regenerateCss=1',
                        'js' => 'return !window.location(this.href)'
                    )
                )
            ),
            'backend' => array(
                'title' => $this->l(' | Back office fonts'),
                'icon' => 'icon-bold',
                'tabs' => $languageAdminTabs,
                'fields' => $adminFields,
                'submit' => array('title' => $this->l('Save')),
                'buttons' => array(
                    'modifyCss' => array(
                        'title' => $this->l('Regenerate backend css'),
                        'icon' => 'process-icon-edit',
                        'href' => $this->context->link->getAdminLink('AdminFontManager') . '&regenerateCss=1',
                        'js' => 'return !window.location(this.href)'
                    )
                )
            ),
        );
    }

    public function postProcess()
    {
        if (Tools::getValue('regenerateCss')) {
            $this->module->modifyCssFile();
            $this->confirmations[] = $this->l('Your font(s) generated successfully');
            Tools::redirectAdmin($this->context->link->getAdminLink('AdminFontManager'));
        }
        foreach ($this->languages as $language) {
            // Front
            if (@$_FILES['PS_FONT_FRONT_NORMAL_EOT_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_NORMAL_EOT_' . $language['id_lang']], $language['iso_code'], 'front');
            }
            if (@$_FILES['PS_FONT_FRONT_BOLD_EOT_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_BOLD_EOT_' . $language['id_lang']], $language['iso_code'], 'front', 'bold');
            }
            if (@$_FILES['PS_FONT_FRONT_LIGHT_EOT_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_LIGHT_EOT_' . $language['id_lang']], $language['iso_code'], 'front', 'light');
            }
            if (@$_FILES['PS_FONT_FRONT_NORMAL_TTF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_NORMAL_TTF_' . $language['id_lang']], $language['iso_code'], 'front');
            }
            if (@$_FILES['PS_FONT_FRONT_BOLD_TTF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_BOLD_TTF_' . $language['id_lang']], $language['iso_code'], 'front', 'bold');
            }
            if (@$_FILES['PS_FONT_FRONT_LIGHT_TTF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_LIGHT_TTF_' . $language['id_lang']], $language['iso_code'], 'front', 'light');
            }
            if (@$_FILES['PS_FONT_FRONT_NORMAL_WOFF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_NORMAL_WOFF_' . $language['id_lang']], $language['iso_code'], 'front');
            }
            if (@$_FILES['PS_FONT_FRONT_BOLD_WOFF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_BOLD_WOFF_' . $language['id_lang']], $language['iso_code'], 'front', 'bold');
            }
            if (@$_FILES['PS_FONT_FRONT_LIGHT_WOFF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_FRONT_LIGHT_WOFF_' . $language['id_lang']], $language['iso_code'], 'front', 'light');
            }
            // Back
            if (@$_FILES['PS_FONT_ADMIN_NORMAL_EOT_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_NORMAL_EOT_' . $language['id_lang']], $language['iso_code'], 'admin');
            }
            if (@$_FILES['PS_FONT_ADMIN_BOLD_EOT_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_BOLD_EOT_' . $language['id_lang']], $language['iso_code'], 'admin', 'bold');
            }
            if (@$_FILES['PS_FONT_ADMIN_LIGHT_EOT_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_LIGHT_EOT_' . $language['id_lang']], $language['iso_code'], 'admin', 'light');
            }
            if (@$_FILES['PS_FONT_ADMIN_NORMAL_TTF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_NORMAL_TTF_' . $language['id_lang']], $language['iso_code'], 'admin');
            }
            if (@$_FILES['PS_FONT_ADMIN_BOLD_TTF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_BOLD_TTF_' . $language['id_lang']], $language['iso_code'], 'admin', 'bold');
            }
            if (@$_FILES['PS_FONT_ADMIN_LIGHT_TTF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_LIGHT_TTF_' . $language['id_lang']], $language['iso_code'], 'admin', 'light');
            }
            if (@$_FILES['PS_FONT_ADMIN_NORMAL_WOFF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_NORMAL_WOFF_' . $language['id_lang']], $language['iso_code'], 'admin');
            }
            if (@$_FILES['PS_FONT_ADMIN_BOLD_WOFF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_BOLD_WOFF_' . $language['id_lang']], $language['iso_code'], 'admin', 'bold');
            }
            if (@$_FILES['PS_FONT_ADMIN_LIGHT_WOFF_' . $language['id_lang']]['name']) {
                $this->uploadFont($_FILES['PS_FONT_ADMIN_LIGHT_WOFF_' . $language['id_lang']], $language['iso_code'], 'admin', 'light');
            }
        }
        return parent::postProcess();
    }

    public function validateUpload($file, $max_file_size, $types)
    {
        if ((int)$max_file_size > 0 && $file['size'] > (int)$max_file_size) {
            return $this->l('File is too large. please change your upload settings');
        }
        if (!ImageManager::isCorrectImageFileExt($file['name'], $types) || preg_match('/\%00/', $file['name'])) {
            return $this->l('Font format not recognized, allowed formats are: .eot, .woff, .ttf');
        }
        if ($file['error']) {
            return sprintf(Tools::displayError('Error while uploading font(s); please change your server\'s settings. (Error code: %s)'), $file['error']);
        }
    }

    public function uploadFont($file, $iso_code, $type = 'front', $weight = null)
    {
        if ($error = self::validateUpload(
            $file,
            Tools::getMaxUploadSize(),
            array(
                'eot',
                'woff',
                'ttf',
            )
        )
        ) {
            $this->errors[] = $error;
            return false;
        }
        $weight = $weight ? '-' . $weight : '';
        $ext = explode('.', $file['name']);
        $path = _PS_MODULE_DIR_ . $this->module->name . '/views/fonts/' . $type . '/' . $iso_code . '/';
        if (!is_dir($path)) {
            mkdir($path);
        }
        $target_dir = $path . $type . $weight . '.' . end($ext);
        if (!move_uploaded_file($file['tmp_name'], $target_dir)) {
            return false;
        }
    }

    public function renderOptions()
    {
        return parent::renderOptions();
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addJS(_PS_JS_DIR_ . 'admin/themes.js');

        if ($this->context->mode == Context::MODE_HOST && Tools::getValue('action') == 'importtheme') {
            $this->addJS(_PS_JS_DIR_ . 'admin/addons.js');
        }
    }
}
