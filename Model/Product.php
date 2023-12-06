<?php
class Product
{
  protected float $price;
  protected int $sconto;

  protected int $quantity;

  public function __construct($price, $quantity, $sconto)
  {
    $this->price = $price;
    $this->quantity = $quantity;
    $this->sconto = $sconto;
  }

}