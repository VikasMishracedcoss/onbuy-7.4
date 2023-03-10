<?php
/**
 * CedCommerce
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the End User License Agreement(EULA)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://cedcommerce.com/license-agreement.txt
 *
 * @category  Ced
 * @package   Ced_Onbuy
 * @author    CedCommerce Core Team <connect@cedcommerce.com>
 * @copyright Copyright CEDCOMMERCE(http://cedcommerce.com/)
 * @license   http://cedcommerce.com/license-agreement.txt
 */

namespace Ced\Onbuy\Controller\Adminhtml\Request;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Exception\NotFoundException;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Help
 * @package Ced\Onbuy\Controller\Adminhtml\Request
 */
class Help extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    public $resultPageFactory;

    /**
     * Help constructor.
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
     {
          $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
          $objectManager->create('Ced\Onbuy\Cron\UpdateInventory')->execute();die('done');

            /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
            $resultPage = $this->resultPageFactory->create();
            $resultPage->setActiveMenu('Ced_Onbuy::Onbuy_knowledge_base');
            $resultPage->getConfig()->getTitle()->prepend(__('OnBuy Knowledge Base'));

            return $resultPage;
    }

    /**
     * @return bool
     */
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ced_Onbuy::Onbuy');
    }
}