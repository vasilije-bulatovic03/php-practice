<?php


function updateUser($data, $con) {

    $sql = "UPDATE tests SET 
        firstname = '$data->firstname', 
        lastname = '$data->lastname',
        nickname = '$data->nickname', 
        age = '$data->age',  
        gender = '$data->gender',  
        email = '$data->email' 
        WHERE id = $data->id ";

    $result = $con->query($sql);

    return $result ;
}

function readUsers ($conn){

    $sql = "SELECT * FROM tests";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $podaci = array(
                "id" => $row ["id"],
                "firstname"=> $row ["firstname"],
                "lastname" => $row ["lastname"],
                "nickname" => $row ["nickname"],
                "age" => $row ["age"],
                "gender" => $row ["gender"],
                "email" => $row ["email"]
            ) ;
            echo json_encode($podaci);
        }
    } else {
        echo "0 results";
    }
}


// start of read one function

function readOneQuery($data,$conn){

    $lastname = $data->lastname;

    $sql = "SELECT * FROM tests WHERE  lastname = '$lastname' ";
    $result = $conn ->query($sql);

    return $result;
}

function readOneSort($result){

    $response = array();

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
        
            $fetchedData = array(
                "firstname" => $row["firstname"],
                "lastname" => $row["lastname"],
                "nickname" => $row["nickname"],
                "age" => $row["age"],
                "gender" => $row["gender"],
                "email" => $row["email"]
            );

            $response[] = $fetchedData;
            echo json_encode($response);
        }
    } else {
        echo "erro";
        echo json_encode( array(
            "message" => "Nema trazenih rezultata",
            "status" => 401
        ));
    }

}


function readOne($data,$conn) {


    $result =  readOneQuery($data,$conn);

    readOneSort($result);

}

// End of read one function


function updateByOne($data,$conn){

    $field = $data->fieldName;
    $value = $data->fieldValue;
    $id = $data->id;



    //field vaidator
    if($field === "age" && gettype($value) === "integer") {
        $isTypeGood = true;

    }else if ($field === "firstname" && gettype($value) === "string") {
        $isTypeGood = true;   
    }else if ($field === "lastname" && gettype($value) === "string") {
        $isTypeGood = true;   
    }else if ($field === "nickname" && gettype($value) === "string") {
        $isTypeGood = true;   
    }else if ($field === "gender" && gettype($value) === "string") {
        $isTypeGood = true;   
    }else if ($field === "email" && gettype($value) === "string") {
        $isTypeGood = true;   
    }else {
        $isTypeGood = false;
        $message = "Los tip podata poslat";
    }



    if($isTypeGood) {
        
        $sql = "UPDATE tests SET $field = '$value' WHERE id=$id ";

        if ($conn->query($sql)){
            echo json_encode (array("message" => "updated successfuly"));
        }else {
            echo json_encode (array("message" => "error updating"));    
        }

    }else {
        echo json_encode(array(
            "message" => $message
        ));
    }


}



function createUser($data,$conn){

 $sql = "INSERT INTO tests (firstname, lastname, nickname, age, gender, email)
	VALUES (
  		'$data->firstname', 
		'$data->lastname', 
		'$data->nickname', 
		'$data->age', 
		'$data->gender', 
		'$data->email'
		)";


if ($conn->query($sql)) {
  echo json_encode(array ("message"=>"Succsessfuly created"));
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


}


function deleteUser($data,$conn){

    $sql = "DELETE FROM tests where id = $data->id";


    if ($conn->query($sql)) {
        echo json_encode(array("message"=>"Successfuly deleted"));
    }
    
    else {
        echo json_encode(array("message"=>"Error deleting user"));
    }

}







?>