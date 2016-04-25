<?php

class Yogesh_Test_Model_Test extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test/test');
    }
  public function insertData($row_array){
       return $this->setData($row_array)->save();
   }
   
   public function deleteData($id){
       return $this->setId($id)->delete($id);
   }
    
      public function myData(){
          
              $model = Mage::getModel('test/test')->getCollection();
     // $data= $this->getCollection($data);
       return  $model;
   }
   
   
   
    public function updateData($data){
       return $this->setId($edit_id)->addData($data)->save();
   }
    
}

?>