<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="credit5.css">
    <title>view user</title>
    <?php include 'links.php'; ?> 
    <style>
        body{
            background-image: linear-gradient(rgba(250,250,250,0.6),rgba(250,250,250,0.6)) , url("bg22.jpg");
            background-repeat: repeat;
            z-index:-1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>VIEW USER</h1>
            <div class="centre">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Credit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // database connection
                        include 'connection.php';

                        // select query from database
                        $select_view_query = "SELECT * FROM viewuser";
                        // go to main table
                        $viewquery = mysqli_query($con,$select_view_query);
                        $nums = mysqli_num_rows($viewquery);
                        //echo "$nums";

                        while($viewres = mysqli_fetch_array($viewquery)){
                        ?>
                            <tr>
                                <td><?php echo $viewres["cd_name"]; ?></td>
                                <td><?php echo $viewres["cd_email"]; ?></td>
                                <td><?php echo $viewres["cd_credit"]; ?></td>
                            </tr>
                        <?php
                        }
                    ?>                        
                    </tbody>
                </table>
            </div>
                 
            <div class="choose">
                <a href="selectuser.php"><input type="button" class="btn" value="Select User"></button></a>
                <a href="index.html"><input type="button" class="btn" value="Back"></button></a>
            </div>           
        </div>   
</body>
</html>