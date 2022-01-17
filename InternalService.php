<?php

require_once 'DB.php';

/**
 * Description of InternalService
 *
 * @author Daniel
 */
class InternalService {

    private $db;

    public function __construct() {
        $this->db = new DB();
    }

    /**
     * Gets records from database and transform into json.
     * 
     * @return string
     */
    public function index(): string {
        $data['data'] = $this->db->index();
        return json_encode($data);
    }

    /**
     * Gets record from database and transform into json.
     * 
     * @param string $id
     * @return string
     */
    public function get(string $id): string {
        $data['data'] = $this->db->read($id);
        return json_encode($data);
    }

    /**
     * Insert new data to database.
     * 
     * @param string $response
     * @return string
     */
    public function insert(string $response): string {

        $data = json_decode($response, JSON_PRETTY_PRINT);

        if (!empty($data)) {

            if (!empty($data['success'])) {
                $data['db'] = $this->db->createOrUpdateRecords($data['data']);
                return json_encode($data);
            }
        }
        return false;
    }

    /**
     * Attempt to insert or updates duplicate key into DB.
     * 
     * @param type $data
     * @return string
     */
    public function createOrUpdate($data): string {

        if (!empty($data)) {
            $response['data'] = $data;
            $response['success'] = $this->db->createOrUpdateRecord($data);
            return json_encode($response);
        }
        return false;
    }

    /**
     * Delete single record from DB.
     * 
     * @param type $id
     * @return string
     */
    public function delete($id): string {
        $data['data']['id'] = $id;
        $data['success'] = $this->db->delete($id);
        return json_encode($data);
    }

    /**
     * Gets records summery from database, manipulates data and transform into json.
     * 
     * @param string $from
     * @param string $to
     * @return string
     */
    public function summery(string $from, string $to): string {
        $f = explode('/', $from);
        $from = "$f[2]-$f[1]-$f[0] 00:00:00";
        $t = explode('/', $to);
        $to = "$t[2]-$t[1]-$t[0] 23:59:59";

        $data['data'] = $this->db->summery($from, $to);

        if (!empty($data['data'])) {
            $data['data']['gross_profit'] = $data['data']['net_sales'] - ($data['data']['production_costs'] + $data['data']['shipping']);
            $data['data']['gross_margin'] = !empty($data['data']['gross_profit']) && !empty($data['data']['gross_profit']) ? (($data['data']['gross_profit'] / $data['data']['net_sales']) * 100) : 0;
        }
        return json_encode($data);
    }

}
