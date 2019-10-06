<?php
namespace Sols\BlockPerCategory\Api;

interface BlockpercategoryRepositoryInterface
{
    /**
     * @return \Sols\BlockPerCategory\Api\Data\BlockpercategoryInterface[]
     */
    public function getList();
}

