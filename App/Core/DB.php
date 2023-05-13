<?php
class DB 
{

    private $pdo="mysql:dbname=".DB_NAME.";host=".DB_HOST.";port=".DB_PORT."";
    public $conn;

    function __construct()
    {
        try
        {
        $this->conn=new PDO($this->pdo,DB_USER,DB_PASS);
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }

    }

    // public function connect(){
    //     try {
    //        $this->conn = new PDO($this->pdo, DB_USER, DB_PASS);
    //         return $this->conn ;
    
    //     } catch (Exception $e){
    //         echo $e->getMessage();
    //     }
    // }
    public function selectUserByRole($q){
        $query =$q;
        $select_stmt = $this->conn->prepare($query);
        $res=$select_stmt->execute();
        $data = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    function select($table)
    {
        try
        {
        $query="select *from {$table}";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e)
        {
            return false;
        }

    }


    function selectById($table,$id)
    {
        try
        {
        $query="select *from {$table} where id=:id";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e)
        {
            return false;
        }

    }


    function insert($table,$file,$arr)
    {
        try 
        {
        $query="insert into {$table} (";

        foreach($arr as $k=>$v)
        {
            $query.="`$k` , ";

        }
        $query.=" `picture` ) values (";

        foreach($arr as $k=>$v)
        {
            $query.=":$k ,";
        }
        $query.=" :picture )";

        $image_new_name=$this->storeImage($file);

        $stmt=$this->conn->prepare($query);
    

        foreach($arr as $k=>&$v)
        {
            //echo $k ." =>".$v."<br>";
            $stmt->bindParam(":$k",$v,PDO::PARAM_STR);
        }
        
        $stmt->bindParam(":picture",$image_new_name);

        //var_dump($stmt);
        //exit;

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

      }catch(PDOException $e)
      {
       return false;
      }

        



    }


    function update($table,$id,$arr)
    {

        try 
        {
        $query="update  {$table} set ";

      
        foreach($arr as $k=>$v)
        {
            $query.=" `$k` = :$k ,";
        }
        $query=rtrim($query,',');
        $query.="where `id`= :id";

        $stmt=$this->conn->prepare($query);


        foreach($arr as $k=>&$v)
        {
            $stmt->bindParam(":$k",$v,PDO::PARAM_STR);
        }
    
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

      }catch(PDOException $e)
      {
        return false;
      }

    }


    function delete($table,$id)
    {
        try 
        {
        $user=$this->selectById($table,$id);
        $query="delete from {$table} where id=:id";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
        }catch(PDOException $e)
        {
            return false;
        }

    }



    function storeImage($file)
    {
        $tmp_img = $file['picture']['tmp_name'];
        $picture= file_get_contents($tmp_img);
           return $picture;
    }
function rawQuery($query)
{
    $select_stmt = $this->conn->prepare($query);
    if ($select_stmt->execute()) {
        $data = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    return false;
}



}



?>