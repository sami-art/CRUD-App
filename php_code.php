
<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud app');

	// initialize variables
	$name = "";
	$address = "";
    $gender = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
        $gender = $_POST['gender'];
        if(empty($name)){
            $_SESSION['message'] = "Name can't be empty."; 
		    header('location: index.php');
        }
        elseif(empty($address)){
            $_SESSION['message'] = "Address can't be empty."; 
		    header('location: index.php');
        }
        elseif(empty($gender)){
            $_SESSION['message'] = "Gender can't be empty."; 
		    header('location: index.php');
        }else{
		mysqli_query($db, "INSERT INTO info (name, address, gender) VALUES ('$name', '$address', '$gender')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
        }
	}
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        //Check for empty fields
        if(empty($name)){
            $_SESSION['message'] = "Name can't be empty."; 
		    header('location: index.php');
        }
        elseif(empty($address)){
            $_SESSION['message'] = "Address can't be empty."; 
		    header('location: index.php');
        }
        elseif(empty($gender)){
            $_SESSION['message'] = "Gender can't be empty."; 
		    header('location: index.php');
        }else{
        mysqli_query($db, "UPDATE info SET name='$name', address='$address', gender='$gender' WHERE id=$id");
        $_SESSION['message'] = "Address updated!"; 
        header('location: index.php');
        }
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM info WHERE id=$id");
        $_SESSION['message'] = "Address deleted!"; 
        header('location: index.php');
    }
    ?>