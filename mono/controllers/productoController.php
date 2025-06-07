<?php

namespace app\controlador;


use app\models\entities\Producto;

class productoController
{

    public function queryAllProducto()
    {
        $productos = new Producto();
        $data = $productos->all();
        return $data;
    }


  
    public function saveNewProducto($request)
    {
        $producto = new Producto();
        $producto->set('nombre', $request['nombreInput']);
        $producto->set('precio_unitario', $request['precio_unitarioInput']);
        $producto->set('cantidad', $request['cantidadInput']);
        return $producto->save();
    }


    public function updateProucto($request)
    {
        $productos = new Producto();
        $productos->set('id', $request['idInput']);
        $productos ->set('nombre', $request['nombreInput']);
        $productos->set('cantidad', $request['cantidadInput']);
        $productos->set('precio_unitario', $request['precio_unitario']);
        return $productos->update();
    }

}