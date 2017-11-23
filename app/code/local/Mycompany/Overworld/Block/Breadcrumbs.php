<?php

class Mycompany_Overworld_Block_Breadcrumbs extends Mage_Catalog_Block_Breadcrumbs
{
    public function getTitleSeparator($store = null)
    {
        return ' >> ';
    }
}