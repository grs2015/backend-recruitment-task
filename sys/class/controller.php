<?php

// Otrzymywanie danych z modelu + oraz zewnętrzne dane (plik JSON)
// define("JSONFile", "../../dataset/users.json");
// require_once 'model.php';

// $jsonData = new Model(JSONFile);

// Praca z formularzem (add/remove wiersz) + wywołanie metody modelu Model dla odpowiedniego przetwarzania danych na JSON pliku
// Przygotowanie zmiennych dla pliku View.php

class Controller
{   
    private $jsonData;

    public function __construct()
    {        
        $data = new Model(JSONFile);
        $this->jsonData = $data;
    }

    public function index()
    {           
        $tableData = $this->jsonData->loadJSON();
        include "./sys/views/view.php";
    }

    public function update($entryData)
    {
        $tableData = $this->jsonData->addRow($entryData);
        include "./sys/views/view.php";
    }

    public function delete($id)
    {   
        $tableData = $this->jsonData->deleteRow($id);        
        include "./sys/views/view.php";
        
    }
}



?>
