<?php

namespace Parsidev\Novinways;

class Novinways {

    protected $confg;
    protected $client;

    private function getAuthArray() {
        $param = array(
            'WebserviceId' => $this->confg['webServiceId'],
            'WebservicePassword' => $this->confg['webServicePassword']
        );
        return $param;
    }

    public function __construct($config, $client) {
        $this->confg = $config;
        $this->client = $client;
    }

    public function ReCharge($price, $type, $phone, $reqId) {
        $param = array(
            'Auth' => $this->getAuthArray(),
            'Amount' => $price,
            'Type' => $type,
            'Account' => $phone,
            'ReqId' => $reqId
        );
        $response = $this->client->ReCharge($param);
        return json_encode($response);
    }

    public function CheckCharge($transId) {
        $param = array(
            'Auth' => $this->getAuthArray(),
            'TranId' => $transId
        );
        $response = $this->client->CheckCharge($param);
        return json_encode($response);
    }

    public function PinRequest($price, $type, $reqId) {
        $param = array(
            'Auth' => $this->getAuthArray(),
            'Amount' => $price,
            'Type' => $type,
            'ReqId' => $reqId
        );
        $response = $this->client->PinRequest($param);
        return json_encode($response);
    }

    public function BuyProduct($productId, $reqId, $count = 1) {
        $param = array(
            'Auth' => $this->getAuthArray(),
            'ProductId' => $productId,
            'Number' => $count,
            'ReqId' => $reqId
        );
        $response = $this->client->BuyProduct($param);
        return json_encode($response);
    }

    public function ProductsInfo() {
        $param = array('Auth' => $this->getAuthArray());
        $response = $this->client->ProductsInfo($param);
        return ($response->Information);
    }

    public function CheckCredit() {
        $param = array('Auth' => $this->getAuthArray());
        $response = $this->client->CheckCredit($param);
        return json_encode($response);
    }

    public function PayBill($billId, $paymentId, $reqId) {
        $param = array(
            'Auth' => $this->getAuthArray(),
            'BillId' => $billId,
            'PaymentId' => $paymentId,
            'ReqId' => $reqId
        );

        $response = $this->client->PayBill($param);
        return ($response);
    }

    public function CheckBill($billId, $paymentId) {
        $param = array(
            'Auth' => $this->getAuthArray(),
            'BillId' => $billId,
            'PaymentId' => $paymentId
        );
        $response = $this->client->CheckBill($param);
        return ($response);
    }

    public function TopUpOperatorStatus($operator) {
        $param = array(
            'Auth' => $this->getAuthArray(),
            'Operator' => $operator
        );
        $response = $this->client->TopUpOperatorStatus($param);
        return ($response);
    }

    public function getFunctions() {
        $functions = $this->client->__getFunctions();
        $response = "<ol>\n";
        foreach ($functions as $function) {
            $response .= "\t<li>" . $function . "</li>\n";
        }
        return $response . "</ol>";
    }

}
