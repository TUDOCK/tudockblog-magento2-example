<?php
/**
 * Block used to display the name of the current product in the info-section of the
 * product view page.
 * The template is helloproduct.phtml.
 * The layout file is catalog_product_view.xml.
 *
 * You can also specify the template with <code>$this->setTemplate(...)</code> like in Magento 1.
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */
namespace Tudock\HelloWorld\Block;

class HelloProduct extends \Magento\Catalog\Block\Product\View\AbstractView {

	protected $_helloTextFactory;

	/**
	 * @param \Magento\Catalog\Block\Product\Context $context
	 * @param \Magento\Framework\Stdlib\ArrayUtils $arrayUtils
	 * @param array $data
	 */
	public function __construct(
		\Magento\Catalog\Block\Product\Context $context,
		\Magento\Framework\Stdlib\ArrayUtils $arrayUtils,
		array $data,

		\Tudock\HelloWorld\Model\HelloTextFactory $helloTextFactory
	) {
		parent::__construct($context, $arrayUtils, $data);

		$this->_helloTextFactory = $helloTextFactory;
	}

	/**
	 * Get the name of the current product
	 * @return string
	 */
	public function getProductName() {
		return $this->getProduct()->getName();
	}

	/**
	 * Get product-specifc text
	 * @todo Currently only generates a fixed text
	 * @return string
	 */
	public function getText() {
		$helloText = $this->_helloTextFactory->create();
		$helloText
			->setProduct($this->getProduct())
			->setText('Das ist ein Test');
		return $helloText->getText();
	}

	/**
	 * Get the URL that points to the helloworld_index_index route.
	 */
	public function getHelloWorldUrl() {
		return $this->getUrl('helloworld/index/index');
	}
}