<?php 

class Orders
{
    private $db;
    private $table = "order";

    public function __construct()
    {
        $this->db = new DB();
    }


    /**
     * insert new product in db
     * @param array $data => fileds and values of product row 
     */
//    public function getUserOrder($id)
//    {
//        $UserOrder=$this->db->connect()->where('userID',$id);
//        return $UserOrder->getOne($this->table);
//
//    }
    public function insertOrder($data)
    {
        return $this->db->connect()->insert($this->table,$data);
    }
    public function getUserOrder($id)
    {
        return $this->db->rawQuery("select * from `$this->table` where userID=$id");
    }

    public function order_details($userId)
    {

        return $this->db->rawQuery(" SELECT `order`.`id`as`o_id`,`user`.`id`,`product`.`picture`, `product`.`name` ,`orderdetails`.`totalPriceProduct`,`orderdetails`.`quantity`  FROM `order` , `orderdetails` ,`product`,`user` WHERE   `order`.`id`=`orderdetails`.`orderID` and
        `orderdetails`.`productID`=`product`.`id` and `order`.`userID`=`user`.`id` and `user`.`id`=$userId" ) ;
    }


    public function deleteOrder($id)
    {
        return $this->db->rawQuery("DELETE FROM `$this->table` where id=$id");
    }


}