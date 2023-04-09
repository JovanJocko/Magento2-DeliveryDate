# Magento2-DeliveryDate

This extension is developed on **Magento Community Edition 2.4.6**, tested with _Simple_ and _Configurable_ with _Virtual_ options.

## Requested functionallity
1. Delivery Date Feature
   - Added input field above **Add to Cart** button which has datepicker
   - Clicking on **Add to Cart** observer **CheckoutCartProductAddAfterObserver** saves delivery date in **quote_item** table in **delivery_date** column.
   - Upon placing order observer **SalesModelServiceQuoteSubmitBeforeObserver** saves delivery date in **sales_order_item** table in **delivery_date** column.
2. Footer background is changed from custom theme **Epay**, for that change to be visible theme needs to be changed to **Epay**
3. **Add to Cart** button background is also changed within new theme **Epay**

## Additional functionalities
1. Delivery Date can be viewed from admin and customer order view.
2. Added tab **Epay** in system configuration so this functionallity can be turned on and off, frontend label for field can be configured and delivery date delay can be set (max date in datepicker).
