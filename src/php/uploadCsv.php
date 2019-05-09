<?php

class UploadCsv
{
  protected $pathFile;
  private $uploadOk = true;
  private $fileType;

  public function __construct(string $file)
  {
    $this->pathFile = $file;
    $this->fileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
  }

  public function checkFile()
  {
    if ($_FILES["file"]["size"] > 500000) {
        echo "Zbyt duży rozmiar pliku. ";
        $this->$uploadOk = false;
    }
    // if (file_exists($file)) {
    //     $uploadOk = false;
    // }

    if($this->fileType != "csv") {
        echo "Dopuszczalne rozszerzenie plików to .csv. ";
        $this->uploadOk = false;
    }

    if ($this->uploadOk == false) {
        echo "Nie dodano pliku csv. ";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $this->pathFile)) {
            $_SESSION["file_name"]=$this->pathFile;
            header('Location: chart.php');
            exit;
        } else {
            echo "Błąd dodania pliku csv. ";
        }
    }
  }
}
?>
