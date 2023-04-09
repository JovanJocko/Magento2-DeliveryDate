<?php

namespace Epay\DeliveryDate\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Quote\Model\Quote\Item;
use Epay\DeliveryDate\Helper\DeliveryDateHelper;

class SalesModelServiceQuoteSubmitBeforeObserver implements ObserverInterface
{
    private $quoteItems = [];

    private $quote = null;
    private $order = null;

    public function __construct(
        protected DeliveryDateHelper $deliveryDateHelper
    ) {}

    /**
     * Add delivery_date to sales_order_item table
     *
     * @param EventObserver $observer
     * @return void
     */
    public function execute(EventObserver $observer)
    {

        if ($this->deliveryDateHelper->showDeliveryDate()) {
            $this->quote = $observer->getQuote();
            $this->order = $observer->getOrder();

            /* @var  \Magento\Sales\Model\Order\Item $orderItem */
            foreach ($this->order->getItems() as $orderItem) {
                if (!$orderItem->getParentItemId()) {
                    if ($quoteItem = $this->getQuoteItemById($orderItem->getQuoteItemId())) {
                        if ($quoteItem->getDeliveryDate()) {
                            $orderItem->setDeliveryDate($quoteItem->getDeliveryDate());
                        }
                    }
                }
            }
        }
    }

    /**
     * @param $id
     * @return Item|mixed|null
     */
    private function getQuoteItemById($id){
        if(empty($this->quoteItems)){
            /* @var  Item $item */
            foreach($this->quote->getItems() as $item){

                if(!$item->getParentItemId()){
                    $this->quoteItems[$item->getId()] = $item;
                }
            }
        }

        if(array_key_exists($id, $this->quoteItems)){
            return $this->quoteItems[$id];
        }

        return null;
    }
}
