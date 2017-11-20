<?php

class Mycompany_Helloworld_Helper_Query extends Mage_Core_Helper_Abstract
{
    public function makeRawRead()
    {
        $resource = Mage::getSingleton('core/resource');
        $dbRead = $resource->getConnection('core_read');
        $tableName = $resource->getTableName('mycompanyhelloworld/blogpost');

        $sql = "SELECT * FROM `$tableName` LIMIT 3;";
        $results = $dbRead->fetchAll($sql);
        print_r($results);

        $sql = "SELECT `title` FROM `$tableName` LIMIT 3;";
        $results = $dbRead->fetchCol($sql);
        print_r($results);

        $sql = "SELECT COUNT(*) FROM `$tableName`;";
        $result = $dbRead->fetchOne($sql);
        var_dump($result);
    }

    public function makeRawWrite()
    {
        $resource = Mage::getSingleton('core/resource');
        $dbWrite = $resource->getConnection('core_write');
        $tableName = $resource->getTableName('mycompanyhelloworld/blogpost');

        $sql = "UPDATE `$tableName` SET `title` = 'New Title' WHERE `blogpost_id` = 2;";
        $dbWrite->query($sql);
    }

    public function makeDirectRead()
    {
        $resource = Mage::getSingleton('core/resource');
        $dbRead = $resource->getConnection('core_read');
        $tableName = $resource->getTableName('mycompanyhelloworld/blogpost');

        $select = $dbRead->select()
            ->from($tableName, ['blogpost_id', 'title'])
            ->where('blogpost_id > 4');

        $results = $dbRead->fetchAll($select);

        print_r($results);
    }

    public function makeDirectWrite()
    {
        $resource = Mage::getSingleton('core/resource');
        $dbWrite = $resource->getConnection('core_write');
        $tableName = $resource->getTableName('mycompanyhelloworld/blogpost');

        $dbWrite->update(
            $tableName,
            ['title' => 'New Title 2'], // SET
            'blogpost_id = 4' // WHERE
        );

        $dbWrite->insert(
            $tableName,
            [
                'title' => 'New Title 999',
                'post' => 'Post content goes here. Some random text.'
            ]
        );

        $dbWrite->delete(
            $tableName,
            'blogpost_id = 8' // WHERE
        );
    }
}