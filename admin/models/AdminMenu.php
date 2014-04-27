<?php

namespace admin\models;

use Yii;

/**
 * This is the model class for table "ys_admin_menu".
 *
 * @property string $id
 * @property string $root
 * @property string $lft
 * @property string $rgt
 * @property integer $level
 * @property string $label
 * @property string $url
 * @property string $params
 * @property string $ajaxoptions
 * @property string $htmloptions
 * @property integer $is_visible
 * @property integer $uid
 * @property string $group_code
 */
class AdminMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['root', 'lft', 'rgt', 'level', 'is_visible', 'uid'], 'integer'],
            [['lft', 'rgt', 'level', 'label'], 'required'],
            [['params', 'ajaxoptions', 'htmloptions'], 'string'],
            [['label', 'url'], 'string', 'max' => 255],
            [['group_code'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'root' => Yii::t('app', 'Root'),
            'lft' => Yii::t('app', 'Lft'),
            'rgt' => Yii::t('app', 'Rgt'),
            'level' => Yii::t('app', 'Level'),
            'label' => Yii::t('app', 'Label'),
            'url' => Yii::t('app', 'Url'),
            'params' => Yii::t('app', 'Params'),
            'ajaxoptions' => Yii::t('app', 'Ajaxoptions'),
            'htmloptions' => Yii::t('app', 'Htmloptions'),
            'is_visible' => Yii::t('app', 'Is Visible'),
            'uid' => Yii::t('app', 'Uid'),
            'group_code' => Yii::t('app', 'Group Code'),
        ];
    }
}
