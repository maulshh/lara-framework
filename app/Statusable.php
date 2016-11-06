<?php

namespace App;

trait Statusable
{

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return self::$status_list[$this->status];
    }

    /**
     * @param string $id_status
     * @return bool
     */
    public function updateStatus($id_status = 'next')
    {
        if ($id_status == 'next') {
            if ($this->status < max(array_keys(self::$status_list)))
                $this->status++;
            else
                return false;
        } else if ($id_status == 'fail') {
            $this->status *= -1;
        } else {
            if (self::$status_list[$id_status] != null)
                $this->status = $id_status;
            else
                return false;
        }

        return $this->save();
    }

    /**
     * @param $stat
     * @return bool
     */
    public function isStatus($stat)
    {
        return $stat == self::$status_list[$this->status];
    }

    public static function statusId($string)
    {
        return array_search($string, self::$status_list);
    }
}