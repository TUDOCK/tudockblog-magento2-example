<?php
/**
 * Install the module by creating a new hello world database table.
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */

namespace Tudock\HelloWorld\Setup;

use Magento\Framework\DB\Ddl\Table;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
		$setup->startSetup();


		/**
		 * Create table 'tudock_helloworld'
		 */
		$table = $setup->getConnection()->newTable(
			$setup->getTable('tudock_helloworld')
		)->addColumn(
			'id',
			Table::TYPE_INTEGER,
			null,
			['unsigned' => true, 'nullable' => false, 'default' => '0', 'primary' => true],
			'ID of text'
		)->addColumn(
			'product',
			Table::TYPE_INTEGER,
			null,
			['unsigned' => true, 'nullable' => false, 'default' => '0'],
			'Product ID'
		)->addColumn(
			'text',
			Table::TYPE_TEXT,
			255,
			['unsigned' => true, 'nullable' => false, 'default' => '0'],
			'Text'
		)->setComment(
			'HelloWorld demo table'
		)->addIndex(
			$setup->getIdxName('tudock_helloworld', 'id',
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE),
			'id',
			['type' =>\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
		)->addIndex(
			$setup->getIdxName('tudock_helloworld', 'product'),
			'product'
		)->addForeignKey(
			$setup->getFkName(
				'tudock_helloworld',
				'product',
				'catalog_product_entity',
				'entity_id'
			),
			'product',
			$setup->getTable('catalog_product_entity'),
			'entity_id',
			Table::ACTION_CASCADE
		);

		$setup->getConnection()->createTable($table);

		$setup->endSetup();

	}
}