<?php
class Chapter extends AppModel {
    var $name='Chapter';
    public $belongsTo = array(
        'Story'=>array(
            'className' => 'Story',
            'foreignKey' => 'story_id'
        )
    );
}