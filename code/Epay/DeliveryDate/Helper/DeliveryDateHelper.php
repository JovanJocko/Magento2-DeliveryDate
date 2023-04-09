<?php
namespace Epay\DeliveryDate\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\ScopeInterface;

class DeliveryDateHelper extends AbstractHelper
{

    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function showDeliveryDate(): bool
    {
        return (bool) $this->scopeConfig->getValue('delivery_date/general/enable_delivery_date',
            ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return int
     */
    public function getDeliveryDateDelay(): int
    {
        return (int) $this->scopeConfig->getValue('delivery_date/general/max_delivery_date',
            ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getDeliveryDateLabel(): string
    {
        return $this->scopeConfig->getValue('delivery_date/general/delivery_date_label',
            ScopeInterface::SCOPE_STORE);
    }
}
