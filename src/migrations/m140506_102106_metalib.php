<?php

/**
 * @link      https://yiiman.ir
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   https://yiiman.ir/license/
 * Initializes RBAC tables.
 * @author    Gholamreza beheshtian (YiiMan) <info@yiiman.ir>
 * @since     2.0
 */
class m140506_102106_metalib extends \yii\db\Migration
{

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%module_metadata}}', [
            'id'          => $this->integer(11)->notNull(),
            'content'     => $this->text(),
            'module_id'   => $this->integer(11),
            'meta_key'    => $this->string(255),
            'parent_meta' => $this->integer(11),
            'type'        => $this->string(20),
            'updated_at'  => $this->dateTime(),
            'PRIMARY KEY ([[id]])',
            'FOREIGN KEY ([[parent_meta]]) REFERENCES {{%module_metadata}} ([[id]])'.
            $this->buildFkClause('ON DELETE SET NULL', 'ON UPDATE CASCADE'),
        ], null);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%module_metadata}}');
    }
}
