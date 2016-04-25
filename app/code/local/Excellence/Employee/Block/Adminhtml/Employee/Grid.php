<?php

class Excellence_Employee_Block_Adminhtml_Employee_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('employeeGrid');
        $this->setDefaultSort('employee_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('employee/employee')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('id', array(
            'header' => Mage::helper('employee')->__('ID'),
            'align' => 'right',
            'width' => '10px',
            'index' => 'employee_id',
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('employee')->__('Name'),
            'align' => 'left',
            'index' => 'title',
            'width' => '50px',
        ));


        $this->addColumn('content', array(
            'header' => Mage::helper('employee')->__('Description'),
            'width' => '150px',
            'index' => 'content',
        ));


        $this->addColumn('status', array(
            'header' => Mage::helper('employee')->__('Status'),
            'align' => 'left',
            'width' => '80px',
            'index' => 'status',
            'type' => 'options',
            'options' => array(
                1 => 'Enabled',
                2 => 'Disabled',
            ),
        ));


        $this->addColumn('dropdown1', array(
            'header' => Mage::helper('employee')->__('Employee Type'),
            'align' => 'left',
            'width' => '50px',
            'index' => 'type',
            'type' => 'options',
            'options' => array('1' => 'Normal', '2' => 'Admin', '3' => 'Guest')
        ));




        $this->addColumn('action', array(
            'header' => Mage::helper('employee')->__('Action'),
            'type' => 'action',
            'width' => '50',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => Mage::helper('employee')->__('Edit'),
                    'url' => array('base' => '*/*/edit'),
                    'field' => 'id'
                ),
                array(
                    'caption' => Mage::helper('employee')->__('Delete'),
                    'url' => array('base' => '*/*/delete'),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false
        ));



        $this->addExportType('*/*/exportCsv', Mage::helper('employee')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('employee')->__('XML'));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('employee_id');
        $this->getMassactionBlock()->setFormFieldName('employee');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('employee')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('employee')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('employee/status')->getOptionArray();

        array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('employee')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus', array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('employee')->__('Status'),
                    'values' => $statuses
                )
            )
        ));
        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getGridUrl() {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }

}
