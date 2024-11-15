<?php
require('connection.inc.php');
require('functions.inc.php');

if(isset($_POST['registerbtn']))
{
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    // $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // if(password_verify($password, $passwordHash)){
    //     // echo"sdddc";
    // }
    // else{
    //     // echo"not";
    // }

    $email_query = "SELECT * FROM admin WHERE email='$email' ";
    $email_query_run = mysqli_query($con, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: Register.php');  
    }
    else
    {
        if($password === $cpassword)
        {
            $query = "INSERT INTO admin (name,email,password) VALUES ('$username','$email','$password')";
            $query_run = mysqli_query($con, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: Register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: Register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: Register.php');  
        }
    }

}

// edit
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE admin SET name='$username', email='$email', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: Register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: Register.php'); 
    }
}
//delete
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admin WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: Register.php'); 
    }    
}

// login

if(isset($_POST['login'] ))
{
    $email_login = $_POST['email']; 
    $password_login = $_POST['password']; 

    $query = "SELECT * FROM admin WHERE email='$email_login' AND password='$password_login' LIMIT 1";

    $query_run = mysqli_query($con, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['name'] = $email_login;
        header('Location: index.php');
   } 
   else
   {
        $_SESSION['status'] = "Email / Password is Invalid";
        header('Location: login.php');
   }
    
}

if(isset($_POST['logout_btn']))
{
    session_destroy();
    unset($_SESSION['name']);
    header('Location: login.php');
}
//^^^^^^^^^^^^^^^^^^^categories

// if(isset($_POST['add_category_btn']))
// {
//     $name = $_POST['name'];
//     $slug = $_POST['slug'];
//     $description = $_POST['description'];
//     $meta_title = $_POST['meta_title'];
//     $meta_description = $_POST['meta_description'];
//     $meta_keyword = $_POST['meta_keyword'];
//     $status = isset($_POST['status']) ? '1':'0';
//     $popular = isset($_POST['popular']) ? '1':'0';

//     $image = $_FILES['image']['name'];
//     $path = "images";
//     $image_ext = pathinfo($image, PATHINFO_EXTENSION);
//     $filename = time().'.'.$image_ext;

//     $cate_query = "INSERT INTO categories 
//     (name, slug, description, meta_title, meta_description, meta_keyword, status, popular, image)
//     VALUES ('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keyword', '$status', '$popular', 'filename')
//     ";
//     $cate_query_run = mysqli_query($con, $cate_query);
    
//     if($cate_query_run){
//         move_uploaded_file($_FILES['image']['tmp_name'], $path . '/'. $filename);
//         redirect("categories.php", "category Added Successfully");

//     }
//     else{
//         redirect("categories.php", "Something went wrong");
//     }
// }


?>