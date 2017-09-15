<?php

$installer = $this;

$installer->startSetup();

$tableName = $installer->getTable('mycompanyhelloworld/blogpost');

$installer->getConnection()->insert($tableName, [
    'title' => 'Test Post',
    'post' => 'Some content for test post goes here. It is just a sample description text.'
]);

$installer->endSetup();