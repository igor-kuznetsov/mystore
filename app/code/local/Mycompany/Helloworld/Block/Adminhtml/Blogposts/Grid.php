<?php

class Mycompany_Helloworld_Block_Adminhtml_Blogposts_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct(); // should be called first

        $this->setId('mycompany_helloworld_blogposts_grid'); // HTML attribute "id"
        $this->setDefaultSort('blogpost_id'); // DB table primary key
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true); // set ajax
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('mycompanyhelloworld/blogpost')->getCollection();
        $this->setCollection($collection);

//        parent::_prepareCollection();
//        return $this;
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('blogpost_id', [
            'type' => 'number', // grid column type, not DB field type
            'header'=> $this->__('ID'),
            'sortable' => true,
            'width' => '50',
            'index' => 'blogpost_id' // DB table field name
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
            'type' => 'date'
        ]);

        $this->addColumn('timestamp', [
            'header'=> $this->__('Created'),
            'sortable' => true,
            'index' => 'timestamp', // DB table field time
            'type' => 'datetime'
        ]);

        return parent::_prepareColumns();
    }

    // ajax source url
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}