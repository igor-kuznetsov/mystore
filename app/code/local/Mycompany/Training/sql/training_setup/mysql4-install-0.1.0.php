<?php

$installer = $this;

$installer->startSetup();

// add price attributes to new product type
$fieldList = [
    'price',
    'special_price',
    'special_from_date',
    'special_to_date',
    'minimal_price',
    'cost',
    'tier_price',
    'tax_class_id'
];

$entity_type = Mage_Catalog_Model_Product::ENTITY;
$product_type = Mycompany_Training_Model_Product_Type::TYPE_TRAININGVIDEO;

foreach ($fieldList as $field) {
    $applyTo = explode(',', $installer->getAttribute(
        $entity_type,
        $field,
        'apply_to'
    ));

    if (!in_array($product_type, $applyTo)) {
        $applyTo[] = $product_type;
        $installer->updateAttribute(
            $entity_type,
            $field,
            'apply_to',
            implode(',', $applyTo)
        );
    }
}

// add custom attributes to new product type
$installer->addAttribute($entity_type, 'preview_video_url', [
    'type' => 'varchar',
    'label' => 'Preview Video URL',
    'input' => 'text',
    'apply_to' => $product_type
]);

$installer->addAttribute($entity_type, 'main_video_url', [
    'type' => 'varchar',
    'label' => 'Main Video URL',
    'input' => 'text',
    'apply_to' => $product_type
]);

// make attribute 'weight' not applicable to trainingvideo products
$applyTo = explode(',', $installer->getAttribute(
    $entity_type,
    'weight',
    'apply_to'
));

if (in_array($product_type, $applyTo)) {
    $newApplyTo = array();
    foreach ($applyTo as $key => $value) {
        if ($value != $product_type) {
            $newApplyTo[] = $value;
        }
    }

    $installer->updateAttribute(
        $entity_type,
        'weight',
        'apply_to',
        implode(',', $newApplyTo)
    );
} else {
    $installer->updateAttribute(
        $entity_type,
        'weight',
        'apply_to',
        implode(',', $applyTo)
    );
}

$installer->endSetup();