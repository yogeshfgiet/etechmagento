<?php
/**
 * This file is part of PageToCategory extension.
 *
 * @category    IteraResearch
 * @package     IteraResearch_PageToCategory
 * @copyright   Copyright (c) 2003-2015 Itera Research, Inc. All rights reserved. (http://www.itera-research.com/)
 * @license     http://www.gnu.org/licenses Lesser General Public License
 */

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;

$installer->startSetup();

/**
 * Create table 'pagetocategory/relation'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('pagetocategory/relation'))
    ->addColumn('relation_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Page To Category Relation ID')
    ->addColumn('category_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => true,
    ), 'Category ID')
    ->addColumn('page_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
        'nullable'  => true,
    ), 'Page ID')
    ->setComment('CMS Page to Catalog Category Linkage Table');
$installer->getConnection()->createTable($table);

$installer->endSetup();