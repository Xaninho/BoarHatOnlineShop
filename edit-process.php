
   <?php
   
    // Define variables and initialize with empty values
    $name = $price = "";
    $name_err = $price_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate name
        $input_name = trim($_POST["dishName"]);
        if(empty($input_name)){
            $name_err = "Please enter a name.";
        } else{
            $name = $input_name;
        }
        
        // Validate price
        $input_price = trim($_POST["price"]);
        if(empty($input_price)){
            $price_err = "Please enter the Price amount.";     
        } else{
            $price = $input_price;
        }

        $id = $_POST['id'];
        $category = $_POST["category"];
        $description = $_POST["description"];

        //$files = $_FILES['dishUpload'];
        //$image = upload_dish('./assets/images/dishes/', $files);

        print $name_err;
        print $price_err;
        
        // Check input errors before inserting in database
        if(empty($name_err) && empty($price_err)){

                // Prepare an insert statement
                $sql = "UPDATE dish SET item_name = ?, category_id = ?, item_price = ?, item_description = ?, item_register = NOW() WHERE item_id = ?";
                            
                if($stmt = mysqli_prepare($db->con, $sql)){

                    // Bind variables to the prepared statement as parameters
                    mysqli_stmt_bind_param($stmt, 'sssss', $param_name, $param_category, $param_price, $param_description, $param_id);
                    
                    // Set parameters
                    $param_name = $name;
                    $param_category = $category;
                    $param_price = $price;
                    $param_description = $description;
                    $param_id = $id;
                    
                    // Attempt to execute the prepared statement
                    if(mysqli_stmt_execute($stmt)){
                        // Records created successfully. Redirect to landing page
                        header("location: dashboard-admin.php");
                        exit();
                    } else{
                        print "Something went wrong. Please try again later.";
                    }

                    // Close statement
                    mysqli_stmt_close($stmt);

            }
        }
        
    }
