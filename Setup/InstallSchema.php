<?php
namespace Sols\BlockPerCategory\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('sols_block_per_category')
        ) -> addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item Identity'
        ) -> addColumn(
            'name',
            Table::TYPE_TEXT,
            255, //max length for text field in Magento
            ['nullable' => false],
            'Item name'
        ) -> addColumn(
            'block_id',
            Table::TYPE_INTEGER,
            2,
            ['nullable' => false],
            'Block id'
        ) -> addColumn(
            'category_id',
            Table::TYPE_INTEGER,
            2,
            ['nullable' => false],
            'Category id'
        ) -> addIndex(
            $setup->getIdxName('sols_block_per_category', ['name']),
            ['name']
        ) -> setComment(
            'Block per category'
        );
        // and the real creation:
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
