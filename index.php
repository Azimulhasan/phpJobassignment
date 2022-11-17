<!DOCclass="form-control" TYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="./index.js"></script>
    <link href="./main.css" rel="stylesheet">

</head>
<body>
    <?php require_once("./conn.php")?>
    <div class="animebox">
        <div class="upper opening">Let's Get You Registered</div>
        <div class="main container-fluid">
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-6 box">
                    <h1>Form Registration</h1>
                    <form action="submit.php" method="POST" name="submitform" enctype="multipart/form-data">
                        <div class="info">
                            <label for="customername">Customer Name:</label>
                            <input class="form-control" placeholder="Your Name" type="text" name="customername" >
                        </div>
                        <div class="info">
                            <label for="totalsales">Total Sales:</label>
                            <input class="form-control" placeholder="Amount" type="text" name="totalsales">
                        </div>
                        <div class="selector">
                            <label for="country">Country:</label>
                            <select class="form-control country" name="country">
                                <option value="select">Select</option>
                                <?php             
                                    $result = mysqli_query($conn,"SELECT * FROM countries");
                                    while($row = mysqli_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
                                <?php } ?>
                            </select>
                            <label for="state">State:</label>
                            <select class="form-control state" name="state">
                                
                            </select>
                            <label for="city">City:</label>
                            <select class="form-control city" name="city">
                                
                            </select>
                        </div>
                        <div class="uploadinfo">
                            <label for="invoice">Invoice (PDF):</label>
                            <input type="file" id="invoice" name="invoice" multiple="multiple" />
                        </div>
                        <div class="uploadinfo">
                            <label for="customerpic">Customer Picture (jpg,jpeg,png,etc):</label>
                            <input type="file" id="customerpic" name="customerpic" />
                        </div>
                        <div class="info">
                            <label for="invoicedate">Invoice Date</label>
                            <input class="form-control" type="date" name="invoicedate"> 
                        </div>
                        
                        <div>
                            <button class="btn btn-default submitbutton" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-3"></div>
            </div>
        </div>
        <div class="lower opening"><div class="rotate">Let's Get You Registered</div></div>
    </div>
</body> 
</html>