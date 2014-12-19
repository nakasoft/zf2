<?php
namespace Timeline\Form;

use Zend\Form\Form;

class TimelineForm extends Form
{
    public function __construct($name = null)
    {
        // we want to ignore the name passed
        parent::__construct('timeline');

        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'startdate',
            'type' => 'Date',
            'options' => array(
                'label' => 'Start Date',
                'format'=> 'Y-m-d',
            ),
        ));
        $this->add(array(
            'name' => 'enddate',
            'type' => 'Date',
            'options' => array(
                'label' => 'End Date',
            ),
        ));
        $this->add(array(
            'name' => 'headline',
            'type' => 'Text',
            'options' => array(
                'label' => 'Headline',
            ),
        ));
        $this->add(array(
        'name' => 'text',
        'type' => 'Text',
        'options' => array(
        'label' => 'Text',
        ),
        ));
        $this->add(array(
            'name' => 'media',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media',
            ),
        ));
        $this->add(array(
            'name' => 'mediacredit',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Credit',
            ),
        ));
        $this->add(array(
            'name' => 'mediacaption',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Caption',
            ),
        ));
        $this->add(array(
            'name' => 'mediathumbnail',
            'type' => 'Text',
            'options' => array(
                'label' => 'Media Thumbnail',
            ),
        ));$this->add(array(
            'name' => 'type',
            'type' => 'Text',
            'options' => array(
                'label' => 'Type',
            ),
        ));$this->add(array(
            'name' => 'tag',
            'type' => 'Select',
            'options' => array(
                'label' => 'Tag',
            ),
        ));
        $this->add(array(
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}

