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

namespace Ced\Onbuy\Block\Adminhtml\Account\Edit;

/**
 * Class Tabs
 * @package Ced\Onbuy\Block\Adminhtml\Account\Edit
 */
class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId('account_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Account Information'));
    }

    /**
     * @return \Magento\Backend\Block\Widget\Tabs
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'info',
            [
                'label' => __('Account Information'),
                'title' => __('Account Information'),
                'content' => $this->getLayout()->createBlock('Ced\Onbuy\Block\Adminhtml\Account\Edit\Tab\Info')->toHtml(),
                'active' => true
            ]
        );

        return parent::_beforeToHtml();
    }

    /**
     * @return string
     */
    public function getAttributeTabBlock()
    {
        return 'Ced\Onbuy\Block\Adminhtml\Account\Edit\Tab\Info';
    }
}
