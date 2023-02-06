<?php
session_start();
if(isset($_POST['submit'])) {
// log new art work record
$newArt = array("genre" => $_POST['genre'],
                "type" => $_POST['art_type'],
                "subject" => $_POST['subject'],
                "specification" => $_POST['specs'],
                "year" => $_POST['year'],
                "museum" => $_POST['museum']);
// check if array in session already exists        
if (!isset($_SESSION['artDB'])) {
    $_SESSION['artDB'] = array();
}
// append current artwork record array to session array
$_SESSION['artDB'][] = $newArt;
// print_r($_SESSION['artDB']);
}
// if user selects "Clear Record"
if(isset($_REQUEST['clear'])) {
    // array in session is reset 
    $_SESSION['artDB'] = array();
    // clear session
    session_destroy();
    // redirect to cleared page
    header('Location: lab2.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Art Work</title>
        <link rel="stylesheet" href="Lab2-Part1-Team21.css"/>
        <script>

            // adds dropdown option for "Subject" if user selects Painting
            function addForm(value) {
                var element = document.getElementById('paintDetails');
                element.innerHTML = "" //empty 
                if (document.getElementById('selectedType').innerHTML == "Painting") {
                  element.innerHTML = `<label for="subject"><span>Subject:</span>
                    <select name="artDB[subject]" id="subject" onChange="document.getElementById('selectedSubject').innerHTML = this.value;">
                        <option value="none" selected disabled hidden>Select a subject</option>
                        <option value="Landscape">Landscape</option>
                        <option value="Portrait">Portrait</option>
                    </select></label>`;
                } else {
                    element.innerHTML = ""
                    document.getElementById('selectedSubject').innerHTML = ""
                }
            }
        </script> 
    </head>
    <body>
        <!-- Title and page description -->
        <div id="header">
            <h2>Art Work Database</h2>
            <?php
            // check if user has saved artworks
            if (!isset($_SESSION['artDB'])) {
                echo "<p>There are currently no records in the Art Works Database</p>";
            } else {
                $a = array();
                echo "<p>This collection of art pieces contains currently ";
                $count = count($_SESSION['artDB']);
                for ($i = 0; $i < $count; $i++) {
                    // check if genre hasn't already been printed
                    if (!in_array($_SESSION['artDB'][$i]['genre'], $a)) {
                        // print saved genres
                        echo $_SESSION['artDB'][$i]['genre'] . " ";
                    
                }
                    // save printed genres to array
                    array_push($a, $_SESSION['artDB'][$i]['genre']);
                }
                echo "paintings in the Art Work Database. Art Work Count: " . $count . "</p>";
            }
            ?>
        </div>

        <div class="container">
        <!-- Art Work Data Entry Form  -->
        <div class="formDiv">
            <form id="createEntry" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label for="genre"><span>Genre:</span>
                <select name="genre" id="genre" onChange="document.getElementById('selectedGenre').innerHTML = this.value;">
                    <option value="none" selected disabled>Select a genre</option>
                    <option value="Abstract">Abstract</option>
                    <option value="Baroque">Baroque</option>
                    <option value="Gothic">Gothic</option>
                    <option value="Renaissance">Renaissance</option>
                </select></label>

                <label for="art_type"><span>Type:</span>
                <select name="art_type" id="art_type" onChange="document.getElementById('selectedType').innerHTML = this.value; addForm(this.value);">
                    <option value="none" selected disabled hidden>Select a type</option>
                    <option value="Painting">Painting</option>
                    <option value="Sculpture">Sculpture</option>
                </select></label>
                <div class="row" id="paintDetails"></div>

                <label for="specs"><span>Specification:</span>
                <select name="specs" id="specs" onChange="document.getElementById('selectedSpec').innerHTML = this.value;">
                    <option value="none" selected disabled hidden>Select a specification</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Non-commercial">Non-commercial</option>
                    <option value="Derivative Work">Derivative Work</option>
                    <option value="Non-derivative Work">Non-derivative Work</option>
                </select></label>

                <label for="year"><span>Year:</span>
                <input type="number" name="year" min="900" max="2099" step="1" placeholder="2023" onChange="document.getElementById('selectedYear').innerHTML = this.value;"/></label>
                    
                <label for="museum"><span>Museum:</span>
                <input type="text" name="museum" id="museum"  placeholder="Enter a museum" onChange="document.getElementById('selectedMuseum').innerHTML = this.value;"/></label>   
                
                <div id="buttonDiv">
                    <form action="process.php" method="POST">
                    <!-- entered data will be erased from page -->
                    <input type="submit" id=clearButton onclick="clearEnteredData()" name="clear" value="Clear Record">
                    </form>
                    <!-- entered data will be saved in a record in array -->
                    <input type="submit" id="submit" value="Save Record" name="submit">

                </div>
            </form>
        </div>
        <div id="tableDiv">
            <h6>Art Work Record</h6>
            <!-- art work record, updates as user makes selections -->
            
            <table>
                <tr>
                    <th><p><b>Genre</b></p></th>
                    <th><p><b>Type</b></p></th>
                    <th><p><b>Subject</b></p></th>
                    <th><p><b>Specification</b></p></th>
                    <th><p><b>Year</b></p></th>
                    <th><p><b>Museum</b></p></th>
                </tr>
                <tr>
                    <td><p><span id="selectedGenre"></span></p></td>
                    <td><p><span id="selectedType"></span></p></td>
                    <td><p><span id="selectedSubject"></span></p></td>
                    <td><p><span id="selectedSpec"></span></p></td>
                    <td><p><span id="selectedYear"></span></p></td>
                    <td><p><span id="selectedMuseum"></span></p></td>
                </tr>
            </table>
        </div>
         
    </div>
    <div id="indexDiv">
        <form id="getIndex" action="" method="post">
            <label for="arrIndex">Enter an index:</label>
            <input type="number" id="arrIndex" name="arrIndex" min="0" max="100">
            <input type="submit" id="submitIndex" value="Get Element" name="submitIndex">
        </form>
        </div>
        <!-- access index in saved art record session array -->
        <?php
        session_start();
        if(isset($_POST['submitIndex'])) {
        $i = $_POST['arrIndex'];
        $artWork = $_SESSION['artDB'][$i];
        print_r($artWork);
        echo "<br>";
    }
        ?> 

        <script>
            function clearEnteredData() {
                /* clears user selections from page */
                document.getElementById("createEntry").reset();
                for (var i = 0; i < 6; i++) {
                document.getElementById("tableDiv").getElementsByTagName("span")[i].innerHTML = "";
                }
            }
        </script>
    </body>
</html>