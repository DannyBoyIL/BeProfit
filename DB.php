<?php

/**
 * Description of DB
 *
 * @author Daniel
 */
class DB {

    private $instance;
    private static $dbconf = 'mysql:host=localhost;dbname=be_profit;charset=utf8';

    function __construct() {
        try {
            $this->instance = new PDO(static::$dbconf, 'root', '');
        } catch (PDOException $e) {
            echo 'Failed: ' . $e->getMessage();
        }
    }

    /**
     * Get all records from orders table.
     * 
     * @return boolean|mixed
     */
    public function index() {
        $sql = 'SELECT * FROM orders';

        try {
            $orders = $this->instance->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print_r($e->getMessage());
            return false;
        }
        return $orders;
    }

    /**
     * Attempts to create new records or update existing records in orders table.
     * 
     * @param array $rows
     * @return boolean|number
     */
    public function createOrUpdateRecords(array $rows) {
        $sql = 'INSERT INTO orders(order_id, shop_id, total_price, '
                . 'subtotal_price, total_weight, total_tax, currency, '
                . 'financial_status, total_discounts, name, fulfillment_status, '
                . 'country, province, total_production_cost, total_items, '
                . 'total_order_shipping_cost, total_order_handling_cost, '
                . 'processed_at, created_at, updated_at, closed_at) VALUES';

        foreach ($rows as $row) {
            $sql .= " ('$row[order_ID]', '$row[shop_ID]', $row[total_price], "
                    . "$row[subtotal_price], $row[total_weight], "
                    . "$row[total_tax], '$row[currency]', '$row[financial_status]', "
                    . "$row[total_discounts], '$row[name]', '$row[fulfillment_status]', "
                    . "'$row[country]', '$row[province]', $row[total_production_cost], "
                    . "$row[total_items], $row[total_order_shipping_cost], "
                    . "$row[total_order_handling_cost], '$row[processed_at]', "
                    . "'$row[created_at]', '$row[updated_at]', '$row[closed_at]'),";
        }

        $sql = rtrim($sql, ',');

        $sql .= ' ON DUPLICATE KEY UPDATE '
                . 'total_order_shipping_cost = values(total_order_shipping_cost), '
                . 'total_tax = values(total_tax), '
                . 'total_production_cost = values(total_production_cost);';

        try {
            $response = $this->instance->exec($sql);
        } catch (PDOException $e) {
            print_r($e->getMessage());
            return false;
        }
        return $response;
    }

    /**
     * Attempts to create new record or update existing record in orders table.
     * 
     * @param array $data
     * @return boolean
     */
    public function createOrUpdateRecord(array $data) {
        $sql = 'INSERT INTO orders(order_id, shop_id, total_price, '
                . 'subtotal_price, total_weight, total_tax, currency, '
                . 'financial_status, total_discounts, name, fulfillment_status, '
                . 'country, province, total_production_cost, total_items, '
                . 'total_order_shipping_cost, total_order_handling_cost, '
                . 'processed_at, created_at, updated_at, closed_at) VALUES '
                . '(:oi, :si, :tp, :sp, :tw, :tt, :cu, :fis, :td, :n, :fus, :co, '
                . ':p, :tpc, :ti, :tosc, :tohc, :pa, :cra, :ua, :cla) '
                . 'ON DUPLICATE KEY UPDATE '
                . 'total_order_shipping_cost = values(total_order_shipping_cost), '
                . 'total_tax = values(total_tax), '
                . 'total_production_cost = values(total_production_cost);';

        try {
            $statement = $this->instance->prepare($sql);
            $statement->bindParam(':oi', $data['order_id']);
            $statement->bindParam(':si', $data['shop_id']);
            $statement->bindParam(':tp', $data['total_price']);
            $statement->bindParam(':sp', $data['subtotal_price']);
            $statement->bindParam(':tw', $data['total_weight']);
            $statement->bindParam(':tt', $data['total_tax']);
            $statement->bindParam(':cu', $data['currency']);
            $statement->bindParam(':fis', $data['financial_status']);
            $statement->bindParam(':td', $data['total_discounts']);
            $statement->bindParam(':n', $data['name']);
            $statement->bindParam(':fus', $data['fulfillment_status']);
            $statement->bindParam(':co', $data['country']);
            $statement->bindParam(':p', $data['province']);
            $statement->bindParam(':tpc', $data['total_production_cost']);
            $statement->bindParam(':ti', $data['total_items']);
            $statement->bindParam(':tosc', $data['total_order_shipping_cost']);
            $statement->bindParam(':tohc', $data['total_order_handling_cost']);
            $statement->bindParam(':pa', $data['processed_at']);
            $statement->bindParam(':cra', $data['created_at']);
            $statement->bindParam(':ua', $data['updated_at']);
            $statement->bindParam(':cla', $data['closed_at']);

            if ($statement->execute()) {
                return (bool) $statement->rowCount();
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        return false;
    }

    /**
     * Get single record from orders table.
     * 
     * @param string $id
     * @return boolean|mixed
     */
    public function read(string $id) {
        $sql = "SELECT * FROM orders WHERE order_id = ?;";

        try {
            $statement = $this->instance->prepare($sql);
            $statement->execute([$id]);
            $order = $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print_r($e->getMessage());
            return false;
        }
        return $order;
    }

    /**
     * Remove single record from orders table.
     * 
     * @param string $id
     * @return boolean
     */
    public function delete(string $id) {
        $sql = 'DELETE FROM orders WHERE order_id = :order_id';

        try {
            $statement = $this->instance->prepare($sql);
            $statement->bindParam(':order_id', $id);

            if ($statement->execute()) {
                return (bool) $statement->rowCount();
            }
        } catch (PDOException $e) {
            print_r($e->getMessage());
        }
        return false;
    }

    /**
     * Get summery of predefined records from orders table.
     * 
     * @param string $from
     * @param string $to
     * @return boolean|mixed
     */
    public function summery(string $from, string $to) {
        $sql = "SELECT IF(financial_status IN ('paid', 'partially_paid'), SUM(total_price), 0) net_sales, "
                . "IF(financial_status IN ('refunded'), SUM(total_price), 0) refunds, "
                . "IF(financial_status IN ('paid', 'partially_paid'), SUM(total_production_cost), 0) production_costs, "
                . "IF(fulfillment_status NOT IN ('unfulfilled'), SUM(total_order_shipping_cost + total_order_handling_cost), 0) shipping "
                . "FROM orders WHERE processed_at BETWEEN ? AND ?;";

        try {
            $query = $this->instance->prepare($sql);
            $query->execute([$from, $to]);
            $summery = $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print_r($e->getMessage());
            return false;
        }
        return $summery;
    }

}
