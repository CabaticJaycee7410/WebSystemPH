<?php 
    include_once _DIR_ . '/connect.php';
         if (isset($_POST['submit'])) 
            {
                 $code = mysqli_real_escape_string($conn, $_POST['code']);
                 $description = mysqli_real_escape_string($conn, $_POST['description']);
                 $address = mysqli_real_escape_string($conn, $_POST['address']);

                 $insert_sql = "INSERT INTO school (code, description, address)
                 VALUES ('$code', '$description', '$address')";

                 if (mysqli_query($conn, $insert_sql)) 
                     {
                         echo "<p>Record added successfully.</p>";
                     }
                 else 
                     {
                         echo "<p>Error adding record: " . mysqli_error($conn) . "</p>";
                     }
            }

         if(isset($_GET['action']) && $_GET['action'] == 'del' && isset($_GET['id'])) 
            {
                 $id = $_GET['id'];
                 $sql_delete = "DELETE FROM school WHERE id = $id";
                 if (mysqli_query($conn, $sql_delete)) 
                     {
                         echo "<p>Record deleted successfully.</p>";
                         header("Location: index.php");
                     } 
                 else 
                     {
                        echo "<p>Error deleting record: " . mysqli_error($conn) . "</p>";
                     }
            }
         if(isset($_POST['subUpdate']))
         {
            $id = $_POST['id'];
            $code = $_POST['code'];
            $description = $_POST['description'];
            $address = $_POST['address'];

            $sql_update = "UPDATE school SET code='$code'",
                            description='$description';
                            address='$address';
                            WHERE id='$id';
            if (mysqli_query($conn, $sql_update))
            {
                echo "Record update Sucessfully";
                header("Loation: index.php");
            }
            
             else
            {
            echo "Error updating record: " . mysqli_error($conn);
            }
         }
?>
</body>
</html>