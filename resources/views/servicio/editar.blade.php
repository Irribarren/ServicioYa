<h1>ACTUALIZAR  SERVICIO</h1>
<form method="post" action="/detalleServicio/{{$detalleServicio->id}}">
    @csrf
    <a>NUEVA UBICACION</a> <br>
    <input type="text" name="ubicacion" value="{{$detalleServicio->ubicacion}}"><br>
    <a>NUEVA DESCRIPCION</a> <br>
    <input type="text" name="descripcion" value="{{$detalleServicio->descripcion}}"><br>
    <a>NUEVA FECHA DE ENTREGA</a> <br>
    <input type="date" name="fecha_entrega" value="{{$detalleServicio->fecha_entrega}}"><br>
    <a>NUEVO PRECIO</a> <br>
    <input type="text" name="precio" value="{{$detalleServicio->precio}}"><br>
    <a>NUEVA FOTO DE SERVICIO</a> <br>
    <input type="image" name="foto_servicio" value="{{$detalleServicio->foto_servicio}}"><br>


    <input type="submit" value="Actualizar">
    @method("PUT")
</form>
<?php

