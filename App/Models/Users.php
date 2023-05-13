<?php
class Users
{
    private $db;
    private $table = "user";

    public function __construct()
    {
        $this->db = new DB();
    }

    public function getAllUsers()
    {
        return $this->db->select($this->table);
    }
    public function getAllUsersByRole($isadmin)
    {
        return $this->db->selectUserByRole("select * from {$this->table} where isAdmin={$isadmin}");
    }
    /**
     * insert new user in db
     * @param array $data => fileds and values of user row
     */
    public function insertUsers($file,$data)
    {
        return $this->db->insert($this->table,$file,$data);
    }

    /**
     * delete user from db
     * @param int $id => id of user
     */
    public function deleteUser($id)
    {
        return $this->db->delete($this->table,$id);
    }


    /**
     * get data of user from database
     * @param int $id
     * @return array
     */

    public function getUser($id)
    {
        return $this->db->selectById($this->table,$id);
    }

    public function updateUser($id,$data)
    {
        return $this->db->update($this->table,$id,$data);
    }
}