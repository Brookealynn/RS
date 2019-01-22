<?php

function getName($email)
{
    $query = "SELECT NAME FROM users WHERE EMAIL = '$email'";
    $db = mysqli_connect('localhost', 'resea620_superya', 'november20', 'resea620_participants');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            echo $row["NAME"];
        }
    } else {
        // echo "Error!";
    }
}

function getStudyName($study_id)
{
    $query = "SELECT NAME FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["NAME"];
        }
    } else {
        // echo  "Error!";
    }
}

//Want to print out all the study details and put it on a frontend page...
function getStudyDetails($study_id)
{
    // $query = "SELECT DETAILS FROM studies WHERE ID = '$study_id'";
    $query = "SELECT * FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["DETAILS"];
        }
    } else {
        // echo  "Error!";
    }
}

function getStudyLab($study_id)
{
    $query = "SELECT LAB FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["LAB"];
        }
    } else {
        // echo  "Error!";
    }
}

function getStudyWho($study_id)
{
    $query = "SELECT WHO FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["WHO"];
        }
    } else {
        // echo  "Error!";
    }
}

function getStudyContact($study_id)
{
    $query = "SELECT CONTACT_INFO FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["CONTACT_INFO"];
        }
    } else {
        // echo  "Error!";
    }
}

function getStudyLocation($study_id)
{
    $query = "SELECT LOCATION FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["LOCATION"];
        }
    } else {
        // echo  "Error!";
    }
}

function getStudyCompensation($study_id)
{
    $query = "SELECT COMPENSATION FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["COMPENSATION"];
        }
    } else {
        // echo  "Error!";
    }
}

function getStudyCriteria($study_id)
{
    $query = "SELECT CRITERIA FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["CRITERIA"];
        }
    } else {
        // echo  "Error!";
    }
}

function getStudyExpectations($study_id)
{
    $query = "SELECT EXPECTATIONS FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["EXPECTATIONS"];
        }
    } else {
        // echo  "Error!";
    }
}

function getStudyEmail($study_id)
{
    $query = "SELECT EMAIL FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["EMAIL"];
        }
    } else {
        // echo  "Error!";
    }
}
//This should work but its giving errors...
function getStudy($study_id)
{
    $query = "SELECT * FROM studies WHERE ID = '$study_id'";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
        	$study['name'] = $row['NAME'];
        	$study['details'] = $row['DETAILS'];
        	$study['lab'] = $row['LAB'];
        	$study['who'] = $row['WHO'];
        	$study['contactinfo'] = $row['CONTACT_INFO'];
        	$study['location'] = $row['LOCATION'];
        	$study['compensation'] = $row['COMPENSATION'];
        	$study['criteria'] = $row['CRITERIA'];
        	$study['expectations'] = $row['EXPECTATIONS'];
            //var_dump($study); This didnt work...

            return $study;
        }
    } else {
        // echo  "Error!";
    }
}

function countStudies()
{
    $query = "SELECT COUNT(*) FROM studies";
    $db = mysqli_connect('localhost', 'root', '', 'qicsi');
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) > 0) {
        while ($row = mysqli_fetch_assoc($results)) {
            return $row["COUNT(*)"];
        }
    } else {
        // echo  "Error!";
    }
}

?>
