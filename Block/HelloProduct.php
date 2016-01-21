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
	 * Get the name of the current product
	 * @return string
	 */
	public function getProductName() {
		return $this->getProduct()->getName();
	}
}