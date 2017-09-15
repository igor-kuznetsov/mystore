<?php

//exit('install my module');

$installer = $this;

$installer->startSetup();

$tableName = $installer->getTable('mycompanyhelloworld/blogpost');

//$installer->run("
//    CREATE TABLE `$tableName` (
//      `blogpost_id` int(11) NOT NULL auto_increment,
//      `title` text,
//      `post` text,
//      `date` datetime default NULL,
//      `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP,
//      PRIMARY KEY  (`blogpost_id`)
//    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
//");

$table = $installer->getConnection()->newTable($tableName)
    ->addColumn('blogpost_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'unsigned' => true,
        'nullable' => false,
        'primary' => true,
        'identity' => true,
    ], 'Blogpost ID')
    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, null, [
        'nullable' => false,
    ], 'Blogpost Title')
    ->addColumn('post', Varien_Db_Ddl_Table::TYPE_TEXT, null, [
        'nullable' => true,
    ], 'Blogpost Body')
    ->addColumn('date', Varien_Db_Ddl_Table::TYPE_DATETIME, null, [], 'Blogpost Date')
    ->addColumn('timestamp', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, [
        'default' => Varien_Db_Ddl_Table::TIMESTAMP_INIT
    ], 'Timestamp')
    ->setComment('Mycompany_Helloworld Blogpost entity table');

$installer->getConnection()->createTable($table);

$installer->endSetup();