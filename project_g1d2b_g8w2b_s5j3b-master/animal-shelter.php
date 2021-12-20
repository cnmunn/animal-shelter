<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/styles.css">
</head>
<body>
    <h1 style="text-align: center; margin: 50px;">Animal Shelter Database</h1>
    <div class="d-flex align-items-start offset-md-3">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link" id="v-pills-insert-tab" data-bs-toggle="pill" data-bs-target="#v-pills-insert" type="button" role="tab" aria-controls="v-pills-insert" aria-selected="false">Insert Adoption Application</button>
          <button class="nav-link" id="v-pills-update-tab" data-bs-toggle="pill" data-bs-target="#v-pills-update" type="button" role="tab" aria-controls="v-pills-update" aria-selected="false">Update Volunteer Hours</button>
          <button class="nav-link" id="v-pills-delete-tab" data-bs-toggle="pill" data-bs-target="#v-pills-delete" type="button" role="tab" aria-controls="v-pills-delete" aria-selected="false">Delete Worker</button>
          <button class="nav-link" id="v-pills-select-tab" data-bs-toggle="pill" data-bs-target="#v-pills-select" type="button" role="tab" aria-controls="v-pills-select" aria-selected="false">Custom Selection</button>
          <button class="nav-link" id="v-pills-project-tab" data-bs-toggle="pill" data-bs-target="#v-pills-project" type="button" role="tab" aria-controls="v-pills-project" aria-selected="false">Display Animal Info</button>
          <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Find Animals in City</button>
          <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Count Dogs</button>

        </div>

        <div class="tab-content" id="v-pills-tabContent">
          

          <div class="tab-pane fade" id="v-pills-insert" role="tabpanel" aria-labelledby="v-pills-insert-tab">

          <h2>Adopt An Animal!</h2>
            <form method="POST" action="animal-shelter.php"> 

                <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
                Your Name: <input type="text" name="insOwnerName"> <br /><br />
                Your Street Number: <input type="text" name="insStreetNumber"> <br /><br />
                Your Street Name: <input type="text" name="insStreetName"> <br /><br />
                Your Postal Code: <input type="text" name="insPostalCode"> <br /><br />
                Adoption Date: <input type="date" name="insDate"> <br /><br />
                Animal's ID <input type="text" name="insAID"> <br /><br />
                Species: <input type="text" name="insSpecies"> <br /><br />


                <input type="submit" value="Insert" name="insertSubmit"></p>
            </form>

          </div>
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
          <h2>Find animals in a given city</h2>
          <form method="GET" action="animal-shelter.php"> <!--refresh page when submitted-->
            <input type="hidden" id="displayCityRequest" name="displayCityRequest">
            City: <input type="text" name="cityName"> <br /><br />
            <input type="submit" name="displayCity"></p>
        </form>

          </div>
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
         
          <h2>Count the Dogs in Animal Shelter</h2>
        <form method="GET" action="animal-shelter.php"> <!--refresh page when submitted-->
            <input type="hidden" id="countTupleRequest" name="countTupleRequest">
            <input type="submit" name="countTuples"></p>
        </form>

          </div>

          <div class="tab-pane fade" id="v-pills-update" role="tabpanel" aria-labelledby="v-pills-update-tab">
          <h2>Update Volunteer Hours</h2>
        <p>Enter a valid Volunteer ID and update the hours</p>

        <form method="POST" action="animal-shelter.php"> <!--refresh page when submitted-->
            <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
            Volunteer ID: <input type="text" name="volunteerID"> <br /><br />
            New Hours: <input type="text" name="newHours"> <br /><br />

            <input type="submit" value="Update" name="updateSubmit"></p>
        </form>

          </div>

          <div class="tab-pane fade" id="v-pills-delete" role="tabpanel" aria-labelledby="v-pills-delete-tab">
          <h2>Delete a Worker</h2>
        <p>Enter a valid Worker ID to remove them from the database</p>

        <form method="POST" action="animal-shelter.php"> <!--refresh page when submitted-->
            <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
            Worker ID: <input type="text" name="workerID"> <br /><br />

            <input type="submit" value="Delete" name="deleteSubmit"></p>
        </form>

          </div>

          

          <div class="tab-pane fade" id="v-pills-project" role="tabpanel" aria-labelledby="v-pills-project-tab">
          <h2>Project Animal Details: </h2>
        
        <form method="GET" action="animal-shelter.php">
        <input type="hidden" id="displayProjectAnimalRequest" name="displayProjectAnimalRequest">

        Species <input type="checkbox" id="species" name="project_animal[]" value="Species">
        Breed<input type="checkbox" id="breed" name="project_animal[]" value="Breed">
        Animal ID <input type="checkbox" id="animalID" name="project_animal[]" value="ID">
        Ward Number <input type="checkbox" id="wardNumber" name="project_animal[]" value="WardNumber">
        Birth Date <input type="checkbox" id="birthDate" name="project_animal[]" value="BirthDate">

           <input type="submit" name="projectAnimal" value="Submit"></p>

        </form>

          </div>

          <div class="tab-pane fade" id="v-pills-select" role="tabpanel" aria-labelledby="v-pills-select-tab">
          <h2>Custom Selection</h2>

            <form method="GET" action="animal-shelter.php"> 
                <input type="hidden" id="displaySpecificRequest" name="displaySpecificRequest">
                Table Name: <input type="text" name="table_name"> <br /><br />
                Attribute 1: <input type="text" name="field1"> <br /><br />
                Value 1: <input type="text" name="var1"> <br /><br />
                Attribute 2: <input type="text" name="field2"> <br /><br />
                Value 2: <input type="text" name="var2"> <br /><br />
                <input type="submit" value="Select" name="displaySpecific"></p>
            </form>
          

          </div>

        </div>
      </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>

<?php
        //this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

            return $statement;
        }

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
        In this case you don't need to create the statement several times. Bound variables cause a statement to only be
        parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
        See the sample code below for how this function is used */

            global $db_conn, $success;
            $statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
                }

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table PostalCode:<br>";
            echo "<table>";
            echo "<tr><th>Postal Code</th><th>City</th><th>Province</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["POSTALCODE"] . "</td><td>" . $row["CITY"] . "</td><td>" . $row["PROVINCE"] . "</td></tr>"; //or just use "echo $row[0]" 
            }

            echo "</table>";
        }

        
        function printSpecificResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table:<br>";


            while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {

                $i = 0;
                $keys = array_keys($row);
                foreach ($row as $r) {
                    echo $keys[$i++] . ":  ";
                    echo $r . "  | ";

                }

                echo nl2br("<tr><td> \n</td></tr>");
            }


        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 

            // ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_cnmunn", "a83846378", "dbhost.students.cs.ubc.ca:1522/stu");
            // $db_conn = OCILogon("ora_dnsrkn", "a96902614", "dbhost.students.cs.ubc.ca:1522/stu");


            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleUpdateRequest() {
            global $db_conn;

            $volunteer_id = $_POST['volunteerID'];
            $new_hours = $_POST['newHours'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("UPDATE volunteer SET VolunteerHours='" . $new_hours . "' WHERE ID='" . $volunteer_id . "'");
            OCICommit($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            // executePlainSQL("DROP TABLE Veterinarian");

            // Create new table
            echo "<br> creating new table <br>";
            executePlainSQL("start init_tables2.sql");
            OCICommit($db_conn);
        }

        function handleInsertRequest() {
            global $db_conn;

            $adoptionDate = strtotime($_POST['insDate']);


            $ownerName = $_POST['insOwnerName'];
            $streetNum = $_POST['insStreetNumber'];
            $streetName = $_POST['insStreetName'];
            $postCode = $_POST['insPostalCode'];
            $adoptionDate =  date('Y-m-d', $adoptionDate);
            $animalID =  $_POST['insAID'];
            $species =  $_POST['insSpecies'];

            //executeBoundSQL("insert into PostalCode values (:bind1, :bind2, :bind3)", $alltuples);
            executePlainSQL("insert into adoptionapplication values ('" . $ownerName . "'," . $streetNum . ",'" . $streetName . "','" . $postCode . "',date '" . $adoptionDate . "','" . $animalID . "','" . $species . "')");            
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM animal WHERE species='Dog'");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> Number of dogs currently in the system: " . $row[0] . "<br>";
            }
        }

        function handleDisplayRequest() {
            global $db_conn; 

            $result = executePlainSQL("SELECT * FROM PostalCode");

            printResult($result);
        }

        function handleDeleteRequest() {
            global $db_conn; 

            $worker_id = $_POST['workerID'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("DELETE FROM Worker WHERE ID='" . $worker_id . "'");
            OCICommit($db_conn);
        }


        function handleDisplayCityRequest(){

            global $db_conn; 

            $city_name = $_GET['cityName'];

            // you need the wrap the old name and new name values with single quotations
            $result = executePlainSQL("SELECT ID, Species, Breed FROM PostalCode, Animal WHERE PostalCode.City='" . $city_name . "' and PostalCode.PostalCode=Animal.PostalCode");
            printAmount($result);

        }

        function handleProjectAnimalRequest(){
            global $db_conn; 
            
            $animalString = "";
            $animals = $_GET['project_animal'];

            foreach($animals as $animal  => $element){
                if($animal == array_key_last($animals)){
                    $animalString .= $element;
                }else{
                    $animalString .= $element . ", ";
                }
            }

            $result = executePlainSQL("SELECT " . $animalString . " FROM animal");
            printAmount($result);

        }

        function printAmount($result){

            echo "<br>Retrieved data from table:<br>";

            while ($row = OCI_Fetch_Array($result, OCI_ASSOC)) {

                $i = 0;
                $keys = array_keys($row);
                foreach ($row as $r) {
                    echo $keys[$i++] . ":  ";
                    echo $r . "  | ";

                }

                echo nl2br("<tr><td> \n</td></tr>");
            }
        }

        function handleDisplaySpecificRequest() {
        	global $db_conn; 

            $table_name = $_GET['table_name'];
            $field1 = $_GET['field1'];
            $field2 = $_GET['field2'];
            $var1 = $_GET['var1'];
            $var2 = $_GET['var2'];

            $result = executePlainSQL("SELECT * FROM " . $table_name . " WHERE " . $field1 . "=" . $var1 . " AND " . $field2 . "=" . $var2 . "");

        	printSpecificResult($result);
        }

        // HANDLE ALL POST ROUTES
    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                }else if (array_key_exists('deleteQueryRequest', $_POST)) {
                    handleDeleteRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                }else if (array_key_exists('displayTuples', $_GET)) {
                    handleDisplayRequest();
                }else if (array_key_exists('displayCity', $_GET)) {
                    handleDisplayCityRequest();
                }else if (array_key_exists('projectAnimal', $_GET)) {
                    handleProjectAnimalRequest();
                }else if (array_key_exists('displaySpecific', $_GET)) {
                    handleDisplaySpecificRequest();
                }

                disconnectFromDB();
            }
        }

        if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['deleteSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['displaySpecificRequest']) || isset($_GET['countTupleRequest']) || isset($_GET['displayTupleRequest']) || isset($_GET['displayCityRequest'])|| isset($_GET['displayProjectAnimalRequest'])) {
            handleGETRequest();
        }

        ?>