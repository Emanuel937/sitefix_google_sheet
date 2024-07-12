<?php 
if(!defined("_PS_VERSION_")){
    exit();
}
/**
 * @return Array |false
 * 
 */
class Sitefix_google_sheet extends Module
{
        public function __construct()
        {
            $this->name           = "sitefix_google_sheet";
            $this->version        = "0.0.1";
            $this->author         = "EMANUEL ABIZIMI";
            $this->need_instance  = 0;
            $this->tab            = "export";
            $this->bootstrap      = true;
            $this->ps_version_compliancy = array(
                "min"=>"1.7.0",
                "max"=>_PS_VERSION_
            );
            parent::__construct();
            $this->displayName = $this->l("GOOGLE SHEET EXPORT AND IMPORT ");
            $this->discription = $this->l("This module allow you to import product,export, edit products  withoud need to be connected to your backoffice website, only using your google sheet");
        }
        /**
         *
         * @return html
         */
        public function generateConfigForm()
        {   
            $controller_url = Context::getContext()->link->getModuleLink($this->name, 'managerProducts', ["ajax"=>true]);
            var_dump($controller_url);
            $form =  array(
                "form"=> array(
                    "legend"=>[
                        "title"=>$this->l("Export, import, edit products"),
                        "icon"=>"icon-cogs"
                    ],
                    "input"=> array(
                        array(
                            "type"=>"text",
                            "name"=>"SITEIX_GOOGLE_SHEET_API_KEY",
                            "label"=>"API",
                            "placeholder"=>" Enter the api key ...."

                        )
                        ),
                    "submit"=> array(
                        "title"=>$this->l("save"),
                        "class" => 'btn btn-default pull-right'
                    )
                )
            );
            $helperForm                   = new HelperForm();
            $helperForm->module           = $this;
            $helperForm->controller_name  = $this->name;
            $helperForm->identifier       = $this->identifier;
            $helperForm->token            = Tools::getAdminTokenLite('AdminModules');
            $helperForm->currentIndex     = AdminController::$currentIndex . '&configure=' . $this->name;
            $helperForm->show_toolbar     = false;
            $helperForm->title            = $this->displayName;
            $helperForm->submit_action    = "SitefixGoogleSheet";
            $helperForm->tpl_vars         = [
                "fields_value"=>[
                    "SITEIX_GOOGLE_SHEET_API_KEY"=>""
                ]
            ];
            // generate form using helperForm
            return $helperForm->generateForm([$form]);
        }
        public function getContent(){

            return $this->generateConfigForm();
        }
        public function install(){
            return parent::install();
        }

        public function uninstall(){
            return parent::uninstall();
        }

}