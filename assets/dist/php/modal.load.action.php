<?php

include 'Account.php';

$userid = $_POST['userid'];

$person = new Account($userid);

$name = $person->getValue('name');
$blood_type = $person->getValue('blood_type');
$age = $person->getValue('age');
$sex = $person->getValue('sex');
$address = $person->getValue('address');
$province = $person->getValue('province');
$email = $person->getValue('email');
$contact = $person->getValue('contact_number');
$id = $person->getId();
?>

<input type="text" id="edit_id" value='<?php echo $id; ?>' hidden readonly>
<div class="input-group">
    <span class="input-group-text">Name</span>
    <input type="text" name="full_name" id="edit_name" class="form-control" value='<?php echo $name; ?>'>
</div>
<br>
<div class="input-group">
    <span class="input-group-text">Blood Type</span>
    <select class="form-select" id="edit_blood_type" name="bloodtype">
        <option id="edit_blood_type"><?php echo $blood_type; ?></option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>
    <span class="input-group-text">Age</span>
    <input type="number" id='edit_age' name="age" class="form-control" value='<?php echo $age; ?>'>
    <span class="input-group-text">Sex</span>
    <select class="form-select" id="edit_sex" name="sex">
        <option><?php echo $sex; ?></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
</div>
<br>
<div class="input-group">
    <span class="input-group-text">Address</span>
    <input type="text" id="edit_address" name="address" class="form-control" value='<?php echo $address; ?>'>
    <span class="input-group-text">Province</span>
    <select class="form-select" name="province" id="edit_province">
        <option id="edit_province"><?php echo $province; ?></option>
        <option value="Pampanga">Pampanga</option>
        <option value="Zambales">Zambales</option>
        <option value="Bulacan">Bulacan</option>
        <option value="Bataan">Bataan</option>
    </select>
</div>
<br>
<div class="input-group">
    <span class="input-group-text">Email Address</span>
    <input type="email" name="email" id="edit_email" class="form-control" value='<?php echo $email; ?>'>
    <span class="input-group-text">Contact No.</span>
    <input type="text" name="contact" id="edit_contact" class="form-control" value='<?php echo $contact; ?>'>
</div>