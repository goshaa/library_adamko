<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogicalDeleteBehavior
 *
 * @author kukisz
 */
class LogicalDeleteBehavior extends CActiveRecordBehavior {

    public function beforeDelete($event) {
        $this->owner->deleted = 1;
        $this->owner->save();
        $event->isValid = false;
    }

    public function beforeFind($event) {
        $this->owner->getDbCriteria()->mergeWith(array('condition' => 'deleted=0'));
    }

}

?>
