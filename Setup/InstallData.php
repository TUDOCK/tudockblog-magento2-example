<?php
/**
 * Insert a demo product text.
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */

namespace Tudock\HelloWorld\Setup;

use Magento\Framework\Setup\InstallDataInterface;

use Magento\Catalog\Model\ResourceModel\Eav\Attribute;
use Magento\Catalog\Model\Product;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {

	/**
	 * Hello World Model Factory
	 * @var EavSetupFactory
	 */
	private $_helloTextFactory;

	/**
	 * Init
	 * @param \Tudock\HelloWorld\Model\HelloTextFactory $helloTextFactory
	 */
	public function __construct(
		\Tudock\HelloWorld\Model\HelloTextFactory $helloTextFactory
	)
	{
		$this->_helloTextFactory = $helloTextFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
		$setup->startSetup();
		$helloText = $this->_helloTextFactory->create();
		$helloText
			->setData('product',14)
			->setText('Das ist nur ein Test')
			->save();
		$setup->endSetup();
	}
}