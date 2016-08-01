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

	/**
	 * A factory used to load a helloText collection
	 *
	 * @var \Tudock\HelloWorld\Model\ResourceModel\HelloText\CollectionFactory
	 */
	protected $_helloTextCollectionFactory;

	/**
	 * The data helper of this module
	 * @var \Tudock\HelloWorld\Helper\Data
	 */
	protected $_dataHelper;

	/**
	 * @param \Magento\Catalog\Block\Product\Context $context
	 * @param \Magento\Framework\Stdlib\ArrayUtils $arrayUtils
	 * @param array $data
	 */
	public function __construct(
		\Magento\Catalog\Block\Product\Context $context,
		\Magento\Framework\Stdlib\ArrayUtils $arrayUtils,
		array $data,
		\Tudock\HelloWorld\Model\ResourceModel\HelloText\CollectionFactory $helloTextCollectionFactory,
		\Tudock\HelloWorld\Helper\Data $dataHelper
	) {
		parent::__construct($context, $arrayUtils, $data);

		$this->_helloTextCollectionFactory = $helloTextCollectionFactory;
		$this->_dataHelper = $dataHelper;
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
	 * @return string
	 */
	public function getText() {
		$helloTextCollection = $this->_helloTextCollectionFactory->create();
		$helloTextCollection->addProductFilter($this->getProduct());

		$entireText = "";
		foreach($helloTextCollection as $helloText) {
			$entireText .= $helloText->getText();
		}

		if ($entireText == "") {
			$entireText = "Leider hat mich niemand lieb :(";
		}
		return $entireText;
	}

	/**
	 * Return the color for the HelloProduct text.
	 * @return string
	 */
	public function getColor() {
		return $this->_dataHelper->getSomeColor();
	}

	/**
	 * Returns the text that was injected in the ProductLoadInjecter
	 * @return string
	 */
	public function getObserverText() {
		return $this->getProduct()->getData('tudock_helloworld');
	}

	/**
	 * Get the URL that points to the helloworld_index_index route.
	 */
	public function getHelloWorldUrl() {
		return $this->getUrl('helloworld/index/index');
	}
}