<?php
/**
 * Model for custom HelloWorld text messages for specific products
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */

namespace Tudock\HelloWorld\Model;

class HelloText extends \Magento\Framework\Model\AbstractModel implements \Tudock\HelloWorld\Api\Data\HelloTextInterface {

	protected $_productFactory;

	/**
	 * @param \Magento\Framework\Model\Context $context
	 * @param \Magento\Framework\Registry $registry
	 * @param array $data
	 * @param \Magento\Catalog\Model\ProductFactory $productFactory
	 */
	public function __construct(
		\Magento\Framework\Model\Context $context,
		\Magento\Framework\Registry $registry,
		\Magento\Catalog\Model\ProductFactory $productFactory
	) {
		parent::__construct($context, $registry);

		$this->_productFactory = $productFactory;
	}

	/**
	 * Get the product associated with this text
	 * @return \Magento\Catalog\Api\Data\ProductInterface
	 */
	public function getProduct() {
		return $this->_productFactory
			->create()
			->load($this->getData('product'));
	}

	/**
	 * Set the project associated with this text8
	 * @param \Magento\Catalog\Api\Data\ProductInterface $productInterface
	 * @return \Tudock\HelloWorld\Api\Data\HelloTextInterface
	 */
	public function setProduct(\Magento\Catalog\Api\Data\ProductInterface $productInterface) {
		$this->setData('product', $productInterface->getId());
		return $this;
	}

	/**
	 * Get the text
	 * @return string
	 */
	public function getText() {
		return $this->getData('text');
	}

	/**
	 * Set the text
	 * @param string $text
	 * @return \Tudock\HelloWorld\Api\Data\HelloTextInterface
	 */
	public function setText($text) {
		$this->setData('text', $text);
		return $this;
	}
}