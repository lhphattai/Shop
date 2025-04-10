<?php
class Database
{
    private $conn;
    protected $table = 'categories';

    public function __construct()
    {
        $this->conn = new Mysqli(HOST, USER, PASSWORD, DB);
    }
    public function select()
    {
        $sql =  "SELECT * FROM $this->table Order by id DESC";
        $query = $this->conn->query($sql);
        while ($row = $query->fetch_object()) {
            $result[] = $row; //trả về array row object
        }
        return $result;
    }
    public function find($id)
    {
        $sql =  "SELECT * FROM $this->table WHERE id = $id";
        $query = $this->conn->query($sql);
        return   $query->fetch_object(); // trả về row object

    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return $this->conn->query($sql); //true hoặc false
    }
    public function create($data)
    {
        $keys = array_keys($data); // lấy danh sách keys của mảng $data ['name','status']
        $keys = implode(',', $keys); //Nối các phần tử trong mảng $keys thành một chuỗi, phân tách bằng dấu ,(name,status)
        $values = array_values($data); //Lấy danh sách các giá trị từ mảng $data ['sản phẩm A','0']
        $values = "'" . implode("','", $values) . "'"; //Nối các giá trị lại thành một chuỗi, mỗi giá trị được bao bởi dấu '(sản phẩm A,0)
        $sql = "INSERT INTO $this->table($keys) VALUES ($values)";
        return $this->conn->query($sql); //true hoặc false
    }
    public function update($id, $data)
    {

        $sql = "UPDATE $this->table SET";
        foreach ($data as $key => $value) {
            $sql .= " $key= '$value', ";
        }
        $sql = rtrim($sql, ', ');
        $sql .= " WHERE id = $id";
        return $this->conn->query($sql); //true hoặc false
    }
}
