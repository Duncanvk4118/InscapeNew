<?php
class Cars 
{
    private $brand;
    private $color;

    public function __construct($brand, $color = "None")
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    public function useItems()
    {
        return $this->brand . " and " . $this->color;
    }    
}

$car1 = new Cars("Volvo", "Red");
echo $car1->useItems();