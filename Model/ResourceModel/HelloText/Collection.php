<?php
/**
 * Demo collection for custom HelloWorld text messages,
 * able to filter by products
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */

namespace Tudock\HelloWorld\Model\ResourceModel\HelloText;

use Magento\Catalog\Api\Data\ProductInterface;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Initialization here
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Tudock\HelloWorld\Model\HelloText', 'Tudock\HelloWorld\Model\ResourceModel\HelloText');
	}

	/**
	 * Add Product Filter to Collection
	 *
	 * @param int|array|ProductInterface $product
	 * @return $this
	 */
	public function addProductFilter($product){
		$id = -1;
		if($product instanceof ProductInterface){
			$id = $product->getId();
		} else if(is_numeric($product)){
			$id = $product;
		}
		$this->addFieldToFilter('product',$id);
		return $this;
	}
}