<?php

namespace YiiMan\YiiLibMeta\module\models;

use Yii;

/**
 * This is the model class for table "{{%module_metadata}}".
 * @property int        $id
 * @property string     $module_name
 * @property string     $content
 * @property int        $module_id
 * @property string     $meta_key
 * @property string     $type
 * @property string     $updated_at
 * @property int        $parent_meta
 * @property Metadata   $parentMeta
 * @property Metadata[] $metadatas
 */
class Metadata extends \yii\db\ActiveRecord
{
    const TYPE_SINGLE = 'single';
    const TYPE_OBJECT = 'object';
    const TYPE_ARRAY = 'array';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%module_metadata}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['content'],
                'required'
            ],
            [
                ['content'],
                'safe'
            ],
            [
                [
                    'module_id',
                    'parent_meta'
                ],
                'integer'
            ],
            [
                [
                    'meta_key',
                    'updated_at'
                ],
                'string',
                'max' => 255
            ],
            [
                'type',
                'string',
                'max' => 20
            ],
            [
                ['parent_meta'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => \YiiMan\YiiLibMeta\module\models\Metadata::className(),
                'targetAttribute' => ['parent_meta' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('metadata', 'ID'),
            'content'     => Yii::t('metadata', 'Content'),
            'module_id'   => Yii::t('metadata', 'Module ID'),
            'meta_key'    => Yii::t('metadata', 'Meta Key'),
            'parent_meta' => Yii::t('metadata', 'Parent Meta'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentMeta()
    {
        return $this->hasOne(Metadata::className(), ['id' => 'parent_meta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetadatas()
    {
        return $this->hasMany(Metadata::className(), ['parent_meta' => 'id']);
    }
}
