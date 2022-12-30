<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "Classes".
 *
 * @property string $class_name
 *
 * @property Student[] $students
 */
class Classes extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'Classes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['class_name'], 'required'],
            [['class_name'], 'string', 'max' => 50],
            [['class_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'class_name' => 'Class Name',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::class, ['class_name' => 'class_name']);
    }
}
