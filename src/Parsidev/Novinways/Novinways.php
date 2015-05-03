<?php

namespace Parsidev\Novinways;

class Novinways {

    protected $confg;
    protected $client;

    public function __construct($config, $client) {
        $this->confg = $config;
        $this->client = $client;
    }
	
	public function getFunctions(){
		return $this->client->__getFunctions();
	}
}
