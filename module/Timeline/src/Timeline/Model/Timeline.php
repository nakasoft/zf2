<?php
namespace Timeline\Model;

// Add these import statements
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Timeline implements InputFilterAwareInterface
 {
    public $id;
    public $startdate;
    public $enddate;
    public $headline;
    public $text;
    public $media;
    public $mediacredit;
    public $mediacaption;
    public $mediathumbnail;
    public $type;
    public $tag;
    protected $inputFilter;                       // <-- Add this variable

     public function exchangeArray($data)
     {
         $this->id             = (isset($data['id_timeline'])) ? $data['id_timeline'] : null;
         $this->startdate      = (isset($data['start_date'])) ? $data['start_date'] : null;
         $this->enddate        = (isset($data['end_date'])) ? $data['end_date'] : null;
         $this->headline       = (isset($data['headline'])) ? $data['headline'] : null;
         $this->text           = (isset($data['text'])) ? $data['text'] : null;
         $this->media          = (isset($data['media'])) ? $data['media'] : null;
         $this->mediacredit    = (isset($data['media_credit'])) ? $data['media_credit'] : null;
         $this->mediacaption   = (isset($data['media_caption'])) ? $data['media_caption'] : null;
         $this->mediathumbnail = (isset($data['media_thumbnail'])) ? $data['media_thumbnail'] : null;
         $this->type           = (isset($data['type'])) ? $data['type'] : null;
         $this->tag            = (isset($data['tag_id_tag'])) ? $data['tag_id_tag'] : null;
     }
     
     // Add the following method:
     public function getArrayCopy()
     {
         return get_object_vars($this);
     }
     
     // Add content to these methods:
     public function setInputFilter(InputFilterInterface $inputFilter)
     {
         throw new \Exception("Not used");
     }

     public function getInputFilter()
     {
         if (!$this->inputFilter) {
             $inputFilter = new InputFilter();

             $inputFilter->add(array(
                 'name'     => 'id',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'Int'),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'startdate',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $inputFilter->add(array(
                 'name'     => 'enddate',
                 'required' => true,
                 'filters'  => array(
                     array('name' => 'StripTags'),
                     array('name' => 'StringTrim'),
                 ),
                 'validators' => array(
                     array(
                         'name'    => 'StringLength',
                         'options' => array(
                             'encoding' => 'UTF-8',
                             'min'      => 1,
                             'max'      => 100,
                         ),
                     ),
                 ),
             ));

             $this->inputFilter = $inputFilter;
         }

         return $this->inputFilter;
     }
 }