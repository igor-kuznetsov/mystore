<?php

class Mycompany_Helloworld_Block_Adminhtml_Blogposts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('mycompany_helloworld_blogposts_grid');
        $this->setDefaultSort('blogpost_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('mycompanyhelloworld/blogpost')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('blogpost_id', [
            'header'=> $this->__('ID'),
            'sortable' => true,
            'width' => '50',
            'index' => 'blogpost_id'
        ]);

        $this->addColumn('title', [
            'header'=> $this->__('Title'),
            'sortable' => true,
            'index' => 'title'
        ]);

        $this->addColumn('date', [
            'header'=> $this->__('Date'),
            'sortable' => true,
            'index' => 'date',
            'type' => 'datetime'
        ]);

        $this->addColumn('timestamp', [
            'header'=> $this->__('Created'),
            'sortable' => true,
            'index' => 'timestamp',
            'type' => 'datetime'
        ]);

        return parent::_prepareColumns();
    }
}