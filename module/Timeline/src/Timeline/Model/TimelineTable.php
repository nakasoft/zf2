<?php
namespace Timeline\Model;

use Zend\Db\TableGateway\TableGateway;

class TimelineTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getTimeline($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveTimeline(Timeline $timeline)
    {
        $data = array(
            'id' => $timeline->id,
            'startdate'  => $timeline->startdate,
            'enddate' => $timeline->enddate,
            'headline'  => $timeline->headline,
            'text' => $timeline->text,
            'media'  => $timeline->media,
            'mediacredit' => $timeline->mediacredit,
            'mediacaption'  => $timeline->mediacaption,
            'mediathumbnail' => $timeline->mediathumbnail,
            'type'  => $timeline->type,
            'tag' => $timeline->tag,
        );

        $id = (int) $timeline->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getTimeline($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Timeline id does not exist');
            }
        }
    }

    public function deleteTimeline($id)
    {
        $this->tableGateway->delete(array('id' => (int) $id));
    }
}