<?php

class Developer_Newslider_Block_Adminhtml_Newslider_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('newsliderGrid');
  
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
      
     
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('newslider/newslider')->getCollection();
     
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('newslider_id', array(
          'header'    => Mage::helper('newslider')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'newslider_id',
      ));
     

      $this->addColumn('title', array(
          'header'    => Mage::helper('newslider')->__('Title'),
          'align'     =>'left',
          'index'     => 'title',
      ));

	  /*
      $this->addColumn('content', array(
			'header'    => Mage::helper('newslider')->__('Item Content'),
			'width'     => '150px',
			'index'     => 'content',
      ));
	  */

      $this->addColumn('status', array(
          'header'    => Mage::helper('newslider')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
        $this->addColumn('filename',
    array(
        'header'=> Mage::helper('catalog')->__('Thumbnail'),
        'width' => '50px',
        'index' => 'filename',
        'frame_callback' => array($this, 'callback_image')
));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('newslider')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('newslider')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		
		$this->addExportType('*/*/exportCsv', Mage::helper('newslider')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('newslider')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('newslider_id');
        $this->getMassactionBlock()->setFormFieldName('newslider');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('newslider')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('newslider')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('newslider/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('newslider')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('newslider')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }
  
  
  public function callback_image($value)
          
  {
      //Mage::log($collection);
    $width = 70;
    $height = 70;
    return "<img src='".Mage::getBaseUrl('media').$value."' width=".$width." height=".$height."/>";
    
    
    
    }

}