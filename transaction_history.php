<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="credit5.css">
    <title>TRANSACTION HISTORY</title>
    <?php include 'links.php';?>
    <style>
        body{
            background-image: linear-gradient(rgba(250,250,250,0.6),rgba(250,250,250,0.6)) , url("bg22.jpg");
            background-repeat: repeat;
            z-index:-1;
        }
    </style>
</head>
<body>
    <div class="choose">
        <a href="index.html"><input type="button"  name="back" class="btn" value="Back"></button></a>
    </div>
    <div class="container">
        <h1>TRANSACTION HISTORY</h1>
        <div class="centre">
                <table>
                    <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Credit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // database connection
                        include 'connection.php';
                        // select query from database
                        $selectquery = "SELECT * FROM transfercredit";
                        // go to main table
                        $query = mysqli_query($con,$selectquery);
                        $nums = mysqli_num_rows($query);
                        //echo "$nums";

                        while($res = mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <td><?php echo $res["sender"]; ?></td>
                                <td><?php echo $res["receiver"]; ?></td>
                                <td><?php echo $res["credit"]; ?></td>
                            </tr>
                        <?php
                        }
                    ?>                        
                    </tbody>
                </table>
        </div>

    </div>
</body>
</html>
