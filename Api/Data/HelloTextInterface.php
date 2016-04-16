<?php
/**
 * API Interface for the HelloText Model. Can be used by other Models and Services
 * for consistent interaction with the model. Can also be implemented by other classes.
 * Is optional.
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */

namespace Tudock\HelloWorld\Api\Data;

interface HelloTextInterface {
	/**
	 * Get the id of the text
	 * @return int
	 * @api
	 */
	public function getId();

	/**
	 * Get the product associated with this text
	 * @return \Magento\Catalog\Api\Data\ProductInterface
	 * @api
	 */
	public function getProduct();

	/**
	 * Set the project associated with this text
	 * @param \Magento\Catalog\Api\Data\ProductInterface $productInterface
	 * @return \Tudock\HelloWorld\Api\Data\HelloTextInterface
	 * @api
	 */
	public function setProduct(\Magento\Catalog\Api\Data\ProductInterface $productInterface);

	/**
	 * Get the text
	 * @return string
	 * @api
	 */
	public function getText();

	/**
	 * Set the text
	 * @param string $text
	 * @return \Tudock\HelloWorld\Api\Data\HelloTextInterface
	 * @api
	 */
	public function setText($text);

	/**
	 * Load another text by id
	 * @param integer $text_id
	 * @return \Tudock\HelloWorld\Api\Data\HelloTextInterface
	 * @api
	 */
	public function load($text_id);

	/**
	 * Saves this text
	 * @return \Tudock\HelloWorld\Api\Data\HelloTextInterface
	 * @api
	 */
	public function save();
}