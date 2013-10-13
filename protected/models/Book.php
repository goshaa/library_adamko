<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property string $isbn
 * @property string $title
 * @property string $publisher
 * @property string $bublisher_date
 */
class Book extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('isbn', 'required'),
			array('isbn', 'length', 'max'=>13),
			array('publisher', 'length', 'max'=>256),
			array('title, bublisher_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('isbn, title, publisher, bublisher_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'isbn' => 'Isbn',
			'title' => 'Title',
			'publisher' => 'Publisher',
			'bublisher_date' => 'Bublisher Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('isbn',$this->isbn,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('publisher',$this->publisher,true);
		$criteria->compare('bublisher_date',$this->bublisher_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}