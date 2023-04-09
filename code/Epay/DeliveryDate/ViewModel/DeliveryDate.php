<?php
namespace Epay\DeliveryDate\ViewModel;

use Epay\DeliveryDate\Helper\DeliveryDateHelper;
use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class DeliveryDate extends DataObject implements ArgumentInterface
{

    public function __construct(
        protected DeliveryDateHelper $deliveryDateHelper
    ) {
        parent::__construct();
    }

    /**
     * @return bool
     */
    public function showDeliveryDate(): bool
    {
        return $this->deliveryDateHelper->showDeliveryDate();
    }

    /**
     * @return int
     */
    public function getDeliveryDateDelay(): int
    {
        return $this->deliveryDateHelper->getDeliveryDateDelay();
    }

    /**
     * @return string
     */
    public function getDeliveryDateLabel(): string
    {
        return $this->deliveryDateHelper->getDeliveryDateLabel();
    }
}
