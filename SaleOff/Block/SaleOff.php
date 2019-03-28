<?php

class Uchinka_SaleOff_Block_SaleOff extends Mage_Core_Block_Template {

    protected function _beforeToHtml()
    {

        $this->assign('products', $this->indexSaleOff());
        return parent::_beforeToHtml();
    }

    public function indexSaleOff () {
        /** @var Mage_Catalog_Model_Category $category */
        /** @var Mage_Catalog_Model_Resource_Product_Collection $products */
        $category = Mage::getModel('catalog/category');
        /* TODO - make a config to set category id in admin */
        $categoryIdConfig = Mage::getStoreConfig('catalogsaleoff/general/category_id');
        $countConfig = Mage::getStoreConfig('catalogsaleoff/general/product_count');
        $transitionEffectConfig = Mage::getStoreConfig('catalogsaleoff/slider/transition_effect');
        $delayConfig = Mage::getStoreConfig('catalogsaleoff/slider/delay');
        $category = $category->load($categoryIdConfig);
        $products = $category->getProductCollection();
        $products->addAttributeToSelect('*')->setPageSize($countConfig);
        return [
            'list' => $products->getItems(),
            'config' => [
                'fx' => $transitionEffectConfig,
                'delay' => $delayConfig,
            ]
        ];
    }
}