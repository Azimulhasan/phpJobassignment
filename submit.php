
<style>
    body{    
        background-color:black;
        color:white;
    }
    .message-box{
        width:80%;
        max-width: 700px;
        padding:25px;
        border: 1.5px solid white;
        border-radius: 10px;
        margin: auto;

    }
    .entryshow{
        width:90%;
        max-width: 900px;
        padding:10px;
        border: 1.5px solid white;
        border-radius: 10px;
        margin: auto;
    }
    .goodbtn{
        margin: 10px auto;
        display: block;
        padding: 10px;
        background-color: black;
        color: aliceblue;
        border: 2px solid white;
    }
    .goodbtn:hover{
        background-color: gray;
    }
    .entrytable{
        text-align: center;
    }
    .entrytable th,td{
        padding: 3px;
        border: 1px solid #333333;
    }
</style>
<div>
    
        <?php
            require_once("./conn.php");

            if( isset($_REQUEST['registrationsubmit']) ){
            echo "<div class='message-box'>";
                $customername = $_REQUEST["customername"];
                $totalsales = $_REQUEST["totalsales"];
                $country = $_REQUEST["country"];
                $state = $_REQUEST["state"];
                $city = $_REQUEST["city"];

                $target_dir = "./uploads/";

                $irandomname= "invoice".rand(0,1999999999);
                $irandompdf = $irandomname.".".pathinfo($_FILES['invoice']['name'],PATHINFO_EXTENSION);
                $invoice = $target_dir . $irandompdf ;
                $file_type_i=$_FILES['invoice']['type'];
                if ($file_type_i=="application/pdf") {
                    if(move_uploaded_file($_FILES['invoice']['tmp_name'], $invoice)){
                        echo "- The file ". $irandompdf. " is uploaded<br>";
                    }else {
                        echo "- Problem uploading file<br>";
                    }
                }else {
                    echo "- You may only upload PDFs.<br>";
                }

                $crandomname= "customerpic".rand(0,1999999999);
                $crandompic = $crandomname.".".pathinfo($_FILES['customerpic']['name'],PATHINFO_EXTENSION);
                $customerpic = $target_dir . $crandompic ;
                $file_type_c=$_FILES['customerpic']['type'];
                if ($file_type_c=="image/gif" || $file_type_c=="image/jpeg"|| $file_type_c=="image/jpg" || $file_type_c=="image/png" ) {
                    if(move_uploaded_file($_FILES['customerpic']['tmp_name'], $customerpic)){
                        echo "- The file ". $crandompic. " is uploaded<br>";
                    }else {
                        echo "- Problem uploading file\n";
                    }
                }else {
                    echo "-  You may only upload PNGS ,JPEGs or GIF files.<br>";
                }

                $invoicedate = $_REQUEST['invoicedate'];

                $sql = 'INSERT INTO `entrypage` (`customername`, `totalsales`, `country`, `state`, `city`, `invoice`, `customerpic`, `invoicedate`, `currenttime`) VALUES ("'.$customername.'", '.$totalsales.', "'.$country.'", "'.$state.'", "'.$city.'", "'.$irandomname.'", "'.$crandomname.'", "'.$invoicedate.'", current_timestamp());';
                if ($conn->query($sql) === TRUE) {
                echo "<h2>Your Entry has been recorded succesfully</h2>";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            echo "</div>";
            }
            
        ?>
    
    <div>
        <form>
            <button class="goodbtn" name="view">Show All Entries</button>
        </form>
    </div>
    
        <?php
        
            if( isset($_REQUEST['view']) ){
            
                echo "<div class='entryshow'>";

                $sql = "SELECT `customername`, `totalsales`, `country`, `state`, `city`, `invoice`, `customerpic`, `invoicedate` FROM entrypage";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<table class='entrytable'>";
                    echo "<tr>
                    <th>Customer name</th>
                    <th>Total Sales</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Invoice (PDF)</th>
                    <th>Customer Picture</th>
                    <th>Date of Submittion</th>
                    </tr>";

                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['customername']. "</td>";
                        echo "<td>" . $row['totalsales']. "</td>";
                        echo "<td>" . $row['country']. "</td>";
                        echo "<td>" . $row['state']. "</td>";
                        echo "<td>" . $row['city']. "</td>";
                        echo "<td><a href='./uploads/" . $row['invoice']. ".pdf'>".$row['invoice'].".pdf</a></td>";
                        echo "<td><a href='./uploads/" . $row['customerpic']. ".png'>".$row['customerpic'].".png</a></td>";
                        echo "<td>" . $row['invoicedate']. "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                echo "0 results";
                }
                $conn->close();

                echo "</div>";
            }
        ?>
</div>












