
<?

abstract class Transport
{
    public $name_model = none;
    public $consumption = null;
   public $fuel = 0;


    public function __construct($name_model, $consumption, $fuel)
    {
        $this->name_model = $name_model;
        $this->consumption = $consumption;
        $this->fuel = $fuel;
    }

    public function startRuta($d)
    {
        $this->fuel -= $d / 100 * $this->consumption;
    }

    public function fuels($f)
    {
        $this->fuel += $f;
    }

    public function last_fuel()
    {
        echo "Осталось " . $this->fuel . "топлива";
    }

    public function get_fuel()
    {
        return $this->fuel;
    }

    public function get_km()
    {
        return $this->consumption;
    }

    public function m_dis()
    {
        return $this->fuel / $this->consumption * 100;
    }

    public function set_fuel($f)
    {
        $this->fuel += $f;
    }

}


class Bus extends Transport
{

    public function startRuta($d)
    {
        $fuel = $this->get_fuel();
        $this->set_fuel(-$d / 100 * $this->get_km());
        if ($this->get_fuel() <= 0) {
            echo "Информация:" . $fuel / $this->get_km() * 100 . "/" . $d;
        }
    }
}


?>