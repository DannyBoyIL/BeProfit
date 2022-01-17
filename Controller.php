<?php

require_once 'InternalService.php';
require_once 'ExternalService.php';

/**
 * Description of controller
 *
 * @author Daniel
 */
class Controller {

    private $service;

    public function __construct() {
        $this->service = new InternalService();
    }

    /**
     * Fetch data from external API and store into DB.
     * 
     * @return string.
     */
    public function init(): string {
        $response = ExternalService::invoke()->call();
        return $this->service->insert($response);
    }

    /**
     * Fetch all data from DB.
     * 
     * @return string;
     */
    public function index(): string {
        return $this->service->index();
    }

    /**
     * Fetch data summery from DB.
     * 
     * @param type $from
     * @param type $to
     * @return string
     */
    public function summery($from, $to): string {
        return $this->service->summery($from, $to);
    }

    /**
     * Attempt to insert or updates duplicate key into DB.
     * 
     * @param type $data
     * @return type
     */
    public function createOrUpdate($data) {
        return $this->service->createOrUpdate($data);
    }

    /**
     * Fetch single record from DB.
     * 
     * @param type $id
     * @return string
     */
    public function show($id): string {
        return $this->service->get($id);
    }

    /**
     * Delete single record from DB.
     * 
     * @param type $id
     * @return type
     */
    public function delete($id) {
        return $this->service->delete($id);
    }

}

$request = $_REQUEST;
$method = array_pop($request);
$controller = new Controller();
echo !empty($request) ? $controller->$method(...$request) : $controller->$method();
