<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Magento
 * @package    tools
 * @copyright  Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Db adapters factory
 */
class Tools_Migration_Acl_Db_Adapter_Factory
{
    /**
     * Get db adapter
     *
     * @param array $config
     * @param string $type
     * @throws InvalidArgumentException
     * @return Zend_Db_Adapter_Abstract
     */
    public function getAdapter(array $config, $type = null)
    {
        $dbAdapterClassName = 'Varien_Db_Adapter_Pdo_Mysql';

        if (false == empty($type)) {
            $dbAdapterClassName = $type;
        }

        if (false == class_exists($dbAdapterClassName, true)) {
            throw new InvalidArgumentException('Specified adapter not exists: ' . $dbAdapterClassName);
        }
        $adapter = new $dbAdapterClassName($config);

        if (false == ($adapter instanceof Zend_Db_Adapter_Abstract)) {
            unset($adapter);
            throw new InvalidArgumentException('Specified adapter is not instance of Zend_Db_Adapter_Abstract');
        }
        return $adapter;
    }
}
