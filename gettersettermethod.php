<?php 

class person
{
    private $height;
    public function setHeight($height)
    {
        if ($height > 30)
        {
            $this->height= $height;
        }
    }
    public function getHeight()
    {
    echo "The person's height is " . $this->height . " inches tall";
    }
}

    $person1 = new person;
    $person1->setHeight(40);
    $person1->getHeight();

?>
