<?php

namespace App\Models;

use CodeIgniter\Model;

class MainModel extends Model
{
    protected $db;

    function  __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function objCreate($table, $data)
    {
        $this->db->table($table)
            ->insert($data);

        $result = array();
        if ($this->db->resultID !== null) {
            $result['error'] = 0;
            $result['id'] = $this->db->connID->insert_id;
        } else
            $result['error'] = 1;

        return $result;
    }

    public function objUpdate($table, $data, $id)
    {
        $query = $this->db->table($table)
            ->where('id', $id)
            ->update($data);

        $result = array();

        if ($query == true) {
            $result['error'] = 0;
            $result['id'] = $id;
        } else
            $result['error'] = 1;

        return $result;
    }

    public function updateConsent( $data, $id)
    {
        $query = $this->db->table('consent')
            ->where('id_form', $id)
            ->update($data);

        $result = array();

        if ($query == true) {
            $result['error'] = 0;
            $result['id'] = $id;
        } else
            $result['error'] = 1;

        return $result;
    }

    public function objCheckDuplicate($table, $field, $value, $id = null)
    {
        $query = $this->db->table($table)
            ->where($field, $value);

        if (!empty($id))
            $query->whereNotIn('id', [0 => $id]);

        return $query->get()->getResult();
    }

    public function objDataByField($table, $field, $value)
    {
        $query = $this->db->table($table)
            ->where($field, $value);

        return $query->get()->getResult();
    }

    public function objDataByID($table, $id)
    {
        $query = $this->db->table($table)
            ->where('id', $id);

        return $query->get()->getResult();
    }

    public function getConsent($table, $id)
    {
        $query = $this->db->table($table)
            ->where('id_form', $id);

        return $query->get()->getResult();
    }

    public function objDataByIDAndField($table, $fieldID, $id, $field, $value)
    {
        $query = $this->db->table('consent')
            ->where($fieldID, $id)
            ->where($field, $value);

        return $query->get()->getResult();
    }

    public function getSpecifyConsent($id, $name)
    {
        $query = $this->db->table('consent')
            ->where('id_form', $id)
            ->where('consent_name', $name);

        return $query->get()->getResult();
    }

    public function getPendingEmployees()
    {
        $query = $this->db->table('employee')
            ->where('approved', '0');

        return $query->get()->getResult();
    }

    public function GetAllWorkers()
    {
        $query = $this->db->table('employee')
            ->join('person', 'employee.person_id = person.id')
            ->join('user', 'user.id = person.user_id')
            ->where('rol', 'worker');

        return $query->get()->getResult();
    }

    public function GetWorkersActive()
    {
        $query = $this->db->table('employee')
            ->join('person', 'employee.person_id = person.id')
            ->join('user', 'user.id = person.user_id')
            ->where('rol', 'worker')
            ->where('activate_status', '1');

        return $query->get()->getResult();
    }

    public function GetWorkersInactive()
    {
        $query = $this->db->table('employee')
            ->join('person', 'employee.person_id = person.id')
            ->join('user', 'user.id = person.user_id')
            ->where('rol', 'worker')
            ->where('activate_status', '0');

        return $query->get()->getResult();
    }

    public function GetWorkersApproved()
    {
        $query = $this->db->table('employee')
            ->join('person', 'employee.person_id = person.id')
            ->join('user', 'user.id = person.user_id')
            ->where('rol', 'worker')
            ->where('approved', '1');

        return $query->get()->getResult();
    }

    public function GetWorkersRejected()
    {
        $query = $this->db->table('employee')
            ->join('person', 'employee.person_id = person.id')
            ->join('user', 'user.id = person.user_id')
            ->where('rol', 'worker')
            ->where('approved', '2');

        return $query->get()->getResult();
    }

    public function GetWorkersPending()
    {
        $query = $this->db->table('employee')
            ->join('person', 'employee.person_id = person.id')
            ->join('user', 'user.id = person.user_id')
            ->where('rol', 'worker')
            ->where('approved', '0');

        return $query->get()->getResult();
    }

    public function GetAllClients()
    {
        $query = $this->db->table('person')
            ->join('user', 'user.id = person.user_id')
            ->where('rol', 'patient');

        return $query->get()->getResult();
    }

    public function getPersonByUserID($id)
    {
        $query = $this->db->table('person')
            ->where('user_id', $id);

        return $query->get()->getResult();
    }

    public function getEmployeeByPersonID($id)
    {
        $query = $this->db->table('employee')
            ->where('person_id', $id);

        return $query->get()->getResult();
    }
}
