<?php

namespace Sols\BlockPerCategory\Api\Data;

interface BlockpercategoryInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return integer|null
     */
    public function getBlockId();

    /**
     * @return integer|null
     */
    public function getCategoryId();

}