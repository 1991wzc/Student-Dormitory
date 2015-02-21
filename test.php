<form action="" method="post">
  <p>Enter your name:
  <input type="text" name="name" />
  </p>
  <p>Enter your age:
  <input type="text" name="age" />
  </p>
  <p>
    <input type="submit" name="submit" value="submit" />
  </p>
</form>
<?php
if($_POST["submit"]=="submit"){
 echo $_POST["name"]; 
 echo $_POST["age"]; }?>
