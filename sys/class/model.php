<?php

declare(strict_types=1);

class Model
{   
    private $pathToJSONFile;    

    public function __construct(string $pathToJSONFile)
    {
        $this->pathToJSONFile = $pathToJSONFile;
    }

    public function loadJSON()
    {          
        if (!file_exists($this->pathToJSONFile)) {
            $this->saveJSON();            
        }     
            
        $dataArr = json_decode(file_get_contents($this->pathToJSONFile), true); 

        $dataItems = $this->dataTransfer($dataArr);           

        return $dataItems;        
    }

    public function saveJSON($dataToSave = [])
    {
        $dataJSON = json_encode($dataToSave);        
        $file = fopen($this->pathToJSONFile,'w+') or die('Error opening file!');
        fwrite($file, $dataJSON);
        fclose($file);
    }

    public function deleteRow($id)    {   
        
        $dataArr = json_decode(file_get_contents($this->pathToJSONFile), true);
        $dataFiltered = array_values(array_filter($dataArr, function ($v, $k) use ($id) {            
            return $v['id'] !== (int)($id);
        }, ARRAY_FILTER_USE_BOTH));         

        $this->saveJSON($dataFiltered);

        $dataItems = $this->dataTransfer($dataFiltered);        

        return $dataItems;   
    }

    public function addRow($data)
    {
        if (!file_exists($this->pathToJSONFile)) {
            $this->saveJSON();
        };

        $dataArr = json_decode(file_get_contents($this->pathToJSONFile), true);
        
        if (empty($dataArr)) {
            $entryId = 1;
        } else {
            $indexes = [];
            foreach($dataArr as $items) {
                $indexes[] = $items['id'];
            }
            $entryId = max($indexes) + 1;
        }        
        
        $entryData = unserialize($data);               

        $addEntry = [
            'id' => $entryId,
            'name' => $entryData['name'],
            'username' => $entryData['username'],
            'email' => $entryData['email'],
            'address' => [
                'street' => $entryData['street'],
                'suite' => '',
                'city' => $entryData['city'],
                'zipcode' => $entryData['zipcode'],
                'geo' => [
                    'lat' => '',
                    'lng' => ''
                ]
            ],
            'phone' => $entryData['phone'],
            'website' => '',
            'company' => [
                'name' => $entryData['company'],
                'catchPhrase' => '',
                'bs' => ''
            ]
        ];

        array_push($dataArr, $addEntry);

        $this->saveJSON($dataArr);

        $dataItems = $this->dataTransfer($dataArr);       

        return $dataItems;
    }
    
    private function dataTransfer(Array $dataArray) : Array
    {
        if (!empty($dataArray)) {
            foreach($dataArray as $key => $data) {
                $dataItem["id"] = $data["id"];
                $dataItem["Name"] = $data["name"];
                $dataItem["Username"] = $data["username"];
                $dataItem["Email"] = $data["email"];
                $dataItem["Address"] = $data["address"]["street"] . ", " . $data["address"]["city"] . " " . $data["address"]["zipcode"];
                $dataItem["Phone"] = $data["phone"];
                $dataItem["Company"] = $data["company"]["name"];
                $dataItems[$key] = $dataItem;
            }
        } else {
            return $dataItems = [];
        }
        return $dataItems;
    }
}

?>