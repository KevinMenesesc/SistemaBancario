<?php
class filtro
{
  public function  evaluar($dato)
  {
     $dato=trim($dato);
     $dato= stripcslashes($dato);
     $dato=htmlspecialchars($dato);
     return $dato;
  }
}