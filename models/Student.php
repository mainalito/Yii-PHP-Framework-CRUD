<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Student".
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $class_name
 * @property int $student_id
 *
 * @property Classes $className
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'class_name', 'student_id'], 'required'],
            [['student_id'], 'integer'],
            [['first_name', 'last_name', 'class_name'], 'string', 'max' => 50],
            [['student_id'], 'unique'],
            [['class_name'], 'exist', 'skipOnError' => true, 'targetClass' => Classes::class, 'targetAttribute' => ['class_name' => 'class_name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'class_name' => 'Class Name',
            'student_id' => 'Student ID',
        ];
    }

    /**
     * Gets query for [[ClassName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClassName()
    {
        return $this->hasOne(Classes::class, ['class_name' => 'class_name']);
    }
}
