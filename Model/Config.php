<?php
/**
 * Config
 *
 * @copyright Copyright © 2019 Solswebdesign. All rights reserved.
 * @author    sols@solswebdesign.nl
 */

namespace Sols\BlockPerCategory\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_ENABLED = 'catalog/sols_general/enabled';
    const XML_PATH_DEBUG_ENABLED = 'catalog/sols_general/debug_enabled';

    private $config;

    public function __construct(ScopeConfigInterface $config)
    {
        $this->config = $config;
    }

    public function isEnabled()
    {
        return $this->config->getValue(self::XML_PATH_ENABLED);
    }

    public function isDebugEnabled()
    {
        return $this->config->getValue(self::XML_PATH_DEBUG_ENABLED);
    }
}