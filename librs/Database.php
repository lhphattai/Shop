<?php
class Database
{
    protected $conn;
    protected $table = 'categories';

    public function __construct()
    {
        $this->conn = new Mysqli(HOST, USER, PASSWORD, DB);
    }
    public static function select($limit = 3)
    {   $_this = new static;
        $sql =  "SELECT * FROM $_this->table Order by id ASC LIMIT  $limit";
        $query = $_this->conn->query($sql);
        while ($row = $query->fetch_object()) {
            $result[] = $row; //trả về array row object
        }
        return $result;
    }
    public static function find($id)
    {   
        $_this = new static;
        $sql =  "SELECT * FROM $_this->table WHERE id = $id";
        $query = $_this->conn->query($sql);
        return   $query->fetch_object(); // trả về row object

    }
    public static function delete($id)
    {   $_this = new static;
        $sql = "DELETE FROM $_this->table WHERE id = $id";
        return $_this->conn->query($sql); //true hoặc false
    }
    public static function create($data)
    {$_this = new static;
        $keys = array_keys($data); // lấy danh sách keys của mảng $data ['name','status']
        $keys = implode(',', $keys); //Nối các phần tử trong mảng $keys thành một chuỗi, phân tách bằng dấu ,(name,status)
        $values = array_values($data); //Lấy danh sách các giá trị từ mảng $data ['sản phẩm A','0']
        $values = "'" . implode("','", $values) . "'"; //Nối các giá trị lại thành một chuỗi, mỗi giá trị được bao bởi dấu '(sản phẩm A,0)
        $sql = "INSERT INTO $_this->table($keys) VALUES ($values)";
        return $_this->conn->query($sql); //true hoặc false
    }
    public static function update($id, $data)
    {
        $_this = new static;
        $sql = "UPDATE $_this->table SET";
        foreach ($data as $key => $value) {
            $sql .= " $key= '$value', ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE id = $id";
        return $_this->conn->query($sql); //true hoặc false
    }
}
