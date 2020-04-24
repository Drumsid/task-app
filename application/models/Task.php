<?php

namespace application\models;

use application\core\Model;

class Task extends Model
{
    public function getTasks()
    {
        $result = $this->db->row('SELECT * FROM tasks');
        return $result;
    }

    public function chankTasks($start, $end)
    {
        $result = $this->db->row("SELECT * FROM tasks LIMIT $start, $end");
        return $result;
    }

    public function getLogs()
    {
        $result = $this->db->row('SELECT * FROM logs');
        return $result;
    }
}
