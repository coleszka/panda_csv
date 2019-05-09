<?php

class ViewChart extends Db
{
  private $nameFile;
  private $data;
  private $countries = array();
  private $dataCountryCounter = array();

  function __construct()
  {
    $this->nameFile = $_SESSION['file_name'];
    $this->data = array_map('str_getcsv', file($this->nameFile));
  }

  public function howManyCountries()
  {
    foreach ($this->data as $key => $value) {

      if ($key != 0) {
        if (in_array($value['5'], $this->countries)) {
          #element znajduje sie w tablicy
        }
        else {
          $this->countries[]=$value['5'];
        }
      }
    }
  }

  public function countCountries():array
  {
    foreach ($this->countries as $key => $country) {
      $this->dataCountryCounter[$country]=array_count_values(array_column($this->data, '5'))[$country];
    }
    return $this->dataCountryCounter;
  }

  public function addDataToDb()
  {
    try {
            $result = $this->connect()->prepare("INSERT INTO temp (id)
            VALUES ('1')");
            $result->execute();
            //echo "Rejestracja przebiegła pomyślnie! Możesz się teraz zalogować!<br>";
            //echo "<a href='../../index.php'>Zaloguj się!</a>";
        }
        catch (PDOException $e) {
            $_SESSION['errReg']=$e->getMessage()."\n";
            //$_SESSION['errReg']="Wystąpił problem z rejestracją, skontaktuj się za administracją!";

        }
  }

  public function saveJson()
  {
    echo ltrim($this->nameFile, '\.\./upload/')."</br>";
    $json_data = json_encode($this->dataCountryCounter,JSON_PRETTY_PRINT);
    file_put_contents('../../json/myfile.json', $json_data);
  }

}


 ?>
