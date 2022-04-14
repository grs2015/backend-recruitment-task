<div>
    <h2>JSON table</h2>
<?php
    if (!empty($tableData)) {
    echo "<table><tr>";
    foreach ($tableData[0] as $key => $data) {
        if ($key == 'id') continue;
        else echo "<th>$key</th>";
    }
?>    
        <th></th></tr>
<?php
    foreach ($tableData as $dataItem) {
        echo "<tr>";
        foreach ($dataItem as $key => $data) {   
            if ($key == 'id') continue;
            elseif ($key == 'Email') {
                echo "<td><a href=\"mailto:{$data}\">$data</a></td>";
            } else {
                echo "<td>$data</td>";
            }    
        } ?>
        <td>
            <form method="POST" action="">
                <input type="submit" name="remove_btn" value="Remove" class="button" />
                <input type="hidden" name="remove_item" value="<?php echo $dataItem['id']; ?>" />
            </form>
        </td>
        </tr>
<?php    } 
    echo "</table>";
    } else {
        echo 'No data entries!';
    }
?>

    <h2>Add new entry to JSON table</h2>
    <button id="open" class="button">Add Entry</button>

    <div class="modal" id="modal">
        <div class="modal-background"></div>
        <div class="modal-body">
            <form method="POST" action="">
                <div class="text-field">
                    <label class="textfield_label" for="name_field">Name</label>
                    <input class="textfield_input" type="text" name="name_field" id="name_field" placeholder="Name" required />
                </div>
                <div class="text-field">
                    <label class="textfield_label" for="username_field">Username</label>
                    <input class="textfield_input" type="text" name="username_field" id="username_field" placeholder="Username" required />
                </div>
                <div class="text-field">
                    <label class="textfield_label" for="email_field">Email</label>
                    <input class="textfield_input" type="email" name="email_field" id="email_field" placeholder="Email" required /><br/>
                </div>
                <p>Address</p>
                <div class="text-fields">
                    <div class="text-field">
                        <label class="textfield_label" for="street_field">Street</label>
                        <input class="textfield_input" type="text" name="street_field" id="street_field" placeholder="Street" required />
                    </div>
                    <div class="text-field">
                        <label class="textfield_label" for="city_field">City</label>
                        <input class="textfield_input" type="text" name="city_field" id="city_field" placeholder="City" required />
                    </div>
                    <div class="text-field">
                        <label class="textfield_label" for="zipcode_field">Zip code</label>
                        <input class="textfield_input" type="text" name="zipcode_field" id="zipcode_field" placeholder="Zip code" required /><br/>
                    </div>
                </div>
                <div class="text-fields">
                    <div class="text-field">
                        <label class="textfield_label" for="phone_field">Phone</label>
                        <input class="textfield_input" type="text" name="phone_field" id="phone_field" placeholder="Phone" required />
                    </div>
                    <div class="text-field">
                        <label class="textfield_label" for="company_field">Company</label>
                        <input class="textfield_input" type="text" name="company_field" id="company_field" placeholder="Company" required />
                    </div>                    
                </div>
                <input class="button" type="submit" name="add_item" value="Add Entry" />
                <input class="button" type="reset" value="Reset Data" />
                <input class="button" type="button" class="modal-close" id="close" value="Close" />
                
            </form>
        </div>
    </div>

    
</div>