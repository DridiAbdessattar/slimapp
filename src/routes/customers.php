<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

//GET ALL CUSTOMERS

$app->get('/api/customers', function (Request $request, Response $response)
{
$sql =  "SELECT * FROM `customers` ";


try {
    $db = new db();
	$db = $db->connect();
	$stmt = $db->query($sql);
	$castumers =$stmt->fetchAll(PDO::FETCH_OBJ);


    $data['success'] = true;
	$data['nombre'] = count($castumers);
	$data['castumers'] = $castumers;
	return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));

} catch (Exception $ex) {
    //echo '{"erreur":{"text":'.$ex->getMessage().'}}';
	$data['success'] = false;
	$data['erreur'] = $ex->getMessage();
	return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));
    
}

}
);


//GET SINGLE CUSTOMER

$app->get('/api/customer/{id}', function (Request $request, Response $response)
{
    $id = $request->getAttribute('id');
    $sql =  "SELECT * FROM `customers` where id = $id ";


try {
    $db = new db();
    $db = $db->connect();
    $stmt = $db->query($sql);
    $castumer =$stmt->fetchall(PDO::FETCH_OBJ);
	
	
	$data['success'] = true;
	$data['nombre'] = count($castumer);
	$data['castumers'] = $castumer;
	
    return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));

} catch (Exception $ex) {
	$data['success'] = false;
	$data['erreur'] = $ex->getMessage();
	return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));
    
}

}
);


// Add Customer
$app->post('/api/customer/add', function(Request $request, Response $response){
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $phone = $request->getParam('phone');
    $email = $request->getParam('email');
    $address = $request->getParam('address');
    $city = $request->getParam('city');
    $state = $request->getParam('state');

    $sql = "INSERT INTO customers (first_name,last_name,phone,email,address,city,state) VALUES
    (:first_name,:last_name,:phone,:email,:address,:city,:state)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name',  $last_name);
        $stmt->bindParam(':phone',      $phone);
        $stmt->bindParam(':email',      $email);
        $stmt->bindParam(':address',    $address);
        $stmt->bindParam(':city',       $city);
        $stmt->bindParam(':state',      $state);

        $stmt->execute();
		
		$data['success'] = true;
		$data['notice'] = 'Customer Added';
	
		return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));

    } catch(PDOException $e){
        //echo '{"error": {"text": '.$e->getMessage().'}';
		$data['success'] = false;
		$data['erreur'] = $ex->getMessage();
		return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));
    }
});

// Update Customer
$app->put('/api/customer/update/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $first_name = $request->getParam('first_name');
    $last_name = $request->getParam('last_name');
    $phone = $request->getParam('phone');
    $email = $request->getParam('email');
    $address = $request->getParam('address');
    $city = $request->getParam('city');
    $state = $request->getParam('state');

    $sql = "UPDATE customers SET
				first_name 	= :first_name,
				last_name 	= :last_name,
                phone		= :phone,
                email		= :email,
                address 	= :address,
                city 		= :city,
                state		= :state
			WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name',  $last_name);
        $stmt->bindParam(':phone',      $phone);
        $stmt->bindParam(':email',      $email);
        $stmt->bindParam(':address',    $address);
        $stmt->bindParam(':city',       $city);
        $stmt->bindParam(':state',      $state);

        $stmt->execute();

        //echo '{"notice": {"text": "Customer Updated"}';
		
		$data['success'] = true;
		$data['notice'] = 'Customer Updated';
	
		return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));

    } catch(PDOException $e){
		$data['success'] = false;
		$data['erreur'] = $ex->getMessage();
		return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));
    }
});

// Delete Customer
$app->delete('/api/customer/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM customers WHERE id = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        //echo '{"notice": {"text": "Customer Deleted"}';
		
		$data['success'] = true;
		$data['notice'] = 'Customer Deleted';
	
		return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));
    } catch(PDOException $e){
        $data['success'] = false;
		$data['erreur'] = $ex->getMessage();
		return $response->withHeader('Content-Type', 'application/json') ->write(json_encode($data));
    }
});