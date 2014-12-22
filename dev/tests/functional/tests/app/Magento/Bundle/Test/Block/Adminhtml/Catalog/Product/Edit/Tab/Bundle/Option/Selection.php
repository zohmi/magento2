<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Bundle\Test\Block\Adminhtml\Catalog\Product\Edit\Tab\Bundle\Option;

use Mtf\Block\Form;

/**
 * Class Selection
 * Assigned product row to bundle option
 */
class Selection extends Form
{
    /**
     * Fill data to product row
     *
     * @param array $fields
     * @return void
     */
    public function fillProductRow(array $fields)
    {
        unset($fields['product_id']);
        $mapping = $this->dataMapping($fields);
        $this->_fill($mapping);
    }

    /**
     * Get data item selection
     *
     * @param array $fields
     * @return array
     */
    public function getProductRow(array $fields)
    {
        $mapping = $this->dataMapping($fields);
        $newFields = $this->_getData($mapping);
        if (isset($mapping['getProductName'])) {
            $newFields['getProductName'] = $this->_rootElement->find(
                $mapping['getProductName']['selector'],
                $mapping['getProductName']['strategy']
            )->getText();
        }
        return $newFields;
    }
}