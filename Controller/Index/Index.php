<?php
/**
 * This is the Index Action for the Index Controller of the route "helloworld" defined in
 * etc/frontend/routes.xml
 *
 * This will render blocks defined in view/frontend/layout/helloworld.xml
 * using the resultPageFactory.
 *
 * @category  Magento 2
 * @package   Tudock_HelloWorld
 * @copyright Copyright (c) 2016 Tudock GmbH (http://www.tudock.de/)
 * @author    Marco Köpcke <marco.koepcke@tudock.de>
 * @license   The MIT License (https://opensource.org/licenses/MIT)
 */
namespace Tudock\HelloWorld\Controller\Index;

use \Magento\Framework\App\Action\Action;

class Index extends Action
{
	/** @var  \Magento\Framework\View\Result\Page */
	protected $resultPageFactory;
	/**
	 *
	 * Dependency Injection.
	 * This will be explained in the next part of the blog series/next tag.
	 *
	 * @param \Magento\Framework\App\Action\Context $context
	 */
	public function __construct(\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory) {
		$this->resultPageFactory = $resultPageFactory;
		parent::__construct($context);
	}

	/**
	 * Index, shows the content defined in view/frontend/layout/helloworld.xml
	 *
	 * @return \Magento\Framework\View\Result\PageFactory
	 */
	public function execute() {
		return $this->resultPageFactory->create();
	}
}