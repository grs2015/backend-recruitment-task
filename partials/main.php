<?php


$controller = new Controller();

if (isset($_POST['remove_item'])) {
    $entryId = $_POST['remove_item'];      
    $controller->delete($entryId);  
} elseif (isset($_POST['add_item'])) {    
    $entryData = serialize([
        'name' => htmlentities($_POST['name_field'], ENT_QUOTES),
        'username' => htmlentities($_POST['username_field'], ENT_QUOTES),
        'email' => htmlentities($_POST['email_field'], ENT_QUOTES),
        'street' => htmlentities($_POST['street_field'], ENT_QUOTES),
        'city' => htmlentities($_POST['city_field'], ENT_QUOTES),
        'zipcode' => htmlentities($_POST['zipcode_field'], ENT_QUOTES),
        'phone' => htmlentities($_POST['phone_field'], ENT_QUOTES),
        'company' => htmlentities($_POST['company_field'], ENT_QUOTES)
    ]);    
    $controller->update($entryData);
} else {
    $controller->index();
}

