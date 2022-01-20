<?php
$insert = false;
if(isset($_POST['transfercredit'])){  
    //set connection variable
    include 'connection.php';
    //echo "success connecting to the db";
    //Collect post values
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $credit = $_POST['credit'];    

    $sql = "INSERT INTO transfercredit (sender, receiver, credit) VALUES ('$sender', '$receiver', '$credit');";
    //echo $sql;
    // excecute the query
    if($con->query($sql) == true){
        //echo "successfully inserted data ";
        //flag for successfull insertion
        $insert = true;
    }
    else{
        echo "ERROR : $sql <br> $con->error";        
    }       
    // Close connection
    mysqli_close($con);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="credit5.css">
    <title>Select user</title>
    <style>
        body{
            background-image: linear-gradient(rgba(250,250,250,0.6),rgba(250,250,250,0.6)) , url("bg22.jpg");
            background-repeat: repeat;
            z-index:-1;
        }
    </style>
    <?php include 'links.php'?>
    <script type="text/javascript">
        function validate(){
            var varsender = document.creditform.sender;
            var varreceiver = document.creditform.receiver;
            var varcredit = document.creditform.credit;
            console.log(varsender.value);
            if(varsender.value == 'select sender'){
                alert('Enter Valid Sender Name');
                varsender.focus();
                return false;
            }

            else if(varreceiver.value == 'select receiver'){
                alert('Enter Valid Receiver Name');
                varreceiver.focus();
                return false;
            }

            else if(varsender.value == varreceiver.value){
                alert("Sender and Receiver name must be different!!!");
                varsender.focus();
                varreceiver.focus();
                return false;
            }

            else if(varcredit.value.length <=0){
                alert("Enter credit");
                varcredit.focus();
                return false;
            }
            
            else if(varcredit.value <= 0){
                alert("SORRY!! Credit should be equal to or greater than 0.");
                varcredit.focus();
                return false;
            }     
                    
            else{   
                //window.location.reload();
                return true;
            }              
        }
    </script>
</head>
<body>    
    <div class="container">
    <form action="" method="post" name="creditform" onsubmit ="return validate()">
        <h1>Transfer Credit</h1>
            <div class="transaction">            
                <label for="sender">Sender's Name : </label>
                    <select name="sender" class="sel">
                    <option value="select sender">Select Sender</option>
                    <option value="Arav">Arav</option>
                    <option value="Aksh">Aksh</option>
                    <option value="Akash">Akash</option>
                    <option value="Anav">Anav</option>
                    <option value="Anupama">Anupama</option>
                    <option value="Anika">Anika</option>
                    <option value="Ayana">Ayana</option>
                    <option value="Arya">Arya</option>
                    <option value="Ansh">Ansh</option>
                    <option value="Aadi">Aadi</option>
                    </select></br>
            
                <label for="receiver">Receiver's Name : </label>
                    <select name="receiver" class="sel">
                        <option value="select receiver">Select Receiver</option>
                        <option value="Arav">Arav</option>
                        <option value="Aksh">Aksh</option>
                        <option value="Akash">Akash</option>
                        <option value="Anav">Anav</option>
                        <option value="Anupama">Anupama</option>
                        <option value="Anika">Anika</option>
                        <option value="Ayana">Ayana</option>
                        <option value="Arya">Arya</option>
                        <option value="Ansh">Ansh</option>
                        <option value="Aadi">Aadi</option>
                        </select>
                        <br>
            
                    <label for="credit">Credit : </label><input type="text" name="credit" class="credit"><br>
                               
            <div class="choose">
                <input type="submit" name="transfercredit" class="btn" value="Transfer Credit" onclick="return success()"></button>    
                <a href="view_user.php"><input type="button"  name="back" class="btn" value="Back"></button></a>
            </div>
    </form>
    </div>
    <?php       if(isset($_POST['transfercredit'])){     
                include 'connection.php';
                $transen = $_POST['sender'];
                $maxcredit = "SELECT cd_credit FROM viewuser WHERE cd_name = '$transen' ";
                $result = mysqli_query($con,$maxcredit);
                $avlbalance = mysqli_fetch_array($result);
                //echo ($avlbalance['cd_credit']);  
                if($avlbalance['cd_credit'] < $credit){  
            ?>                         
                <script>
                    alert("Sender can be transfer maximum of <?php echo($avlbalance['cd_credit']);?> credit! ");
                </script>          
            <?php  
                return false;
                }  
            }                
            ?>   
<?php            

    if($insert == true){
?>
    <script type="text/javascript">
        alert("SUCCESSFULLY CREDITED!");
    </script>    
<?php
    }
?>
 
       
<?php 
    include 'connection.php';
    if($insert == true){
        $transectcredit = "UPDATE viewuser
            SET  cd_credit = CASE WHEN cd_name = '$sender' THEN cd_credit - '$credit'
                                  WHEN cd_name = '$receiver' THEN cd_credit + '$credit'                               
                             END
                
            WHERE cd_name IN ('$sender','$receiver')";

            $transect = mysqli_query($con,$transectcredit);

            if($transect){
                //echo ('ok');
            }else{
                echo ('Something went wrong! User details is not updated! ');
            }
        }
    ?>    
</body>
</html>
