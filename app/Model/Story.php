<?php
class Story extends AppModel {
    var $name='Story';
    public $belongsTo = array(
        'Category'=>array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        )
    );
}