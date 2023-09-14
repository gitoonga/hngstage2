<?php
$method = $_SERVER['REQUEST_METHOD'];
include "./database.php";
include "./person.php";
include "./Phone.php";

function getUserid()
{
    $requesturl = $_SERVER['REQUEST_URI'];
    $url = explode('/', $requesturl);
    return end($url);
}

if ($method === 'PUT') {
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);

    $phone = new phone();

    $data['phone'] = $phone->formatphone($data['phone']);

    $p = new Person();

    if ($p->createPerson($data)) {
        // Successfully created the person
        http_response_code(201); // Created
        echo json_encode(['message' => 'Person created successfully']);
    } else {
        // Failed to create the person
        http_response_code(400); // Bad Request
        echo json_encode(['message' => 'Failed to create person']);
    }
}

if ($method === 'PATCH') {
    $input = file_get_contents("php://input");
    $data = json_decode($input, true);
    $requesturl = $_SERVER['REQUEST_URI'];
    $url = explode('/', $requesturl);
    $userid = end($url);

    // Define an array to store the fields to update
    $toupdate = [
        'name' => null,
        'phone' => null,
        'email' => null,
    ];

    // Populate $toupdate with non-null values from $data
    if (isset($data['name'])) {
        $toupdate['name'] = $data['name'];
    }

    if (isset($data['phone'])) {
        $toupdate['phone'] = $data['phone'];
    }

    if (isset($data['email'])) {
        $toupdate['email'] = $data['email'];
    }

    // Create a Person instance
    $p = new Person();

    // Call the updatePerson method with the user ID and the fields to update
    $personUpdated = $p->updatePerson($userid, $toupdate);

    // Check if the update was successful and return a response
    if ($personUpdated) {
        // Successfully updated the person
        http_response_code(200); // OK
        echo json_encode(['message' => 'Person updated successfully']);
    } else {
        // Failed to update the person or no fields to update
        http_response_code(400); // Bad Request
        echo json_encode(['message' => 'Failed to update person']);
    }
}

if ($method === 'GET')
{
    $userid = getUserid();

    $p = new Person();

    $person = $p->getPerson($userid);
    if ($person) {
        http_response_code(200);
        echo json_encode(['person' => $person]);
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Failed to get person']);
    }
}

if ($method === 'DELETE')
{
    $userid = getUserid();

    $p = new Person();

    $person = $p->deletePerson($userid);
    if ($person) {
        http_response_code(200);
        echo json_encode(['message' => 'Person Deleted']);
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Failed to delete person']);
    }
}
