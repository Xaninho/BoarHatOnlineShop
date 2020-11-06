
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
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Please enter a valid name.";
        } else{
            $name = $input_name;
        }
        
        // Validate price
        $input_price = trim($_POST["price"]);
        if(empty($input_price)){
            $price_err = "Please enter the Price amount.";     
        } elseif(!ctype_digit($input_price)){
            $price_err = "Please enter a positive integer value.";
        } else{
            $price = $input_price;
        }

        $category = $_POST["category"];

        $files = $_FILES['dishUpload'];
        $image = upload_dish('./assets/images/dishes/', $files);
        
        // Check input errors before inserting in database
        if(empty($name_err) && empty($price_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO dish (item_id, item_name, category_id, item_price, item_image, item_register) VALUES (' ', ?, ?, ?, ?, NOW())";
            
            if($stmt = mysqli_prepare($db->con, $sql)){

                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, 'ssss', $param_name, $param_category, $param_price, $param_image);
                
                // Set parameters
                $param_name = $name;
                $param_category = $category;
                $param_price = $price;
                $param_image = $image;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records created successfully. Redirect to landing page
                    header("location: dashboard-admin.php");
                    exit();
                } else{
                    echo "Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($link);
    }
