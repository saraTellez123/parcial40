<?php


namespace app\models\entities;

use app\models\drivers\ConexDB;


class Producto extends Entity
{
    protected $id = null;
    protected $nombre = null;
    protected $cantidad = null;
    protected $precio_unitario  = null;

    public function all()
    {
        $sql = "select * from productos";
        $conex = new ConexDB();
        $resultDb = $conex->execSQL($sql);
        $bills = [];
        if ($resultDb->num_rows > 0) {
            while ($rowDb = $resultDb->fetch_assoc()) {
                $productoArray = new Producto();
                $productoArray->set('id', $rowDb['id']);
                $productoArray->set('nombre', $rowDb['nombre']);
                $productoArray->set('cantidad', $rowDb['cantidad']);
                $productoArray->set('precio_unitario', $rowDb['precio_unitario']);
                array_push($bills, $productoArray);
            }
        }
        $conex->close();
        return $bills;
    }

    public function save()
    {
        $sql = "insert into productos (nombre,cantidad,precio_unitario) values ";
        $sql .= "('" . $this->nombre . "','" . $this->cantidad . "'," . $this->precio_unitario . ")";
        $conex = new ConexDB();
        $resultDb = $conex->execSQL($sql);
        if ($resultDb) {
            $this->id = $conex->lastInsertId(); 
        }
        $conex->close();
        return $resultDb;
    }

    public function update()
    {
        $sql = "update productos set ";
        $sql .= "nombre ='" . $this->nombre. "',";
        $sql .= "cantidad = '" . $this->cantidad . "',";
        $sql .= "precio_unitario =" . $this->precio_unitario;
        $sql .= " where id=" . $this->id;
        $conex = new ConexDB();
        $resultDb = $conex->execSQL($sql);
        $conex->close();
        return $resultDb;
    }


    public function delete()
    {
        $sql = "delete from productos where id=" . $this->id;
        $conex = new ConexDB();
        $resultDb = $conex->execSQL($sql);
        $conex->close();
        return $resultDb;
    }

}






