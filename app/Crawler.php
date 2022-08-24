<?php
namespace App;

use \simplehtmldom\HtmlWeb;

/* This class could have been split into two.
	One that handles the crawling of the individual parts 
	and one that is dealing with the business logic.
	The creation of the httpClient could have been placed 
	into a Singleton class.
*/
	
class Crawler{
	
	private $httpClient;
	private $response;
	private $titles;
	private $names;
	private $descriptions;
	private $prices;
	
	public function __construct($url){
		$this->httpClient = new HtmlWeb($url);		
		$this->response = $this->httpClient->load($url);
	}
	
	public function crawl(){		
		$this->titles = $this->getTitles();
		$this->names = $this->getNames();
		$this->descriptions = $this->getDescriptions();
		$this->prices = $this->getPrices();
		
		$this->assembleResults();
	}
	
	public function getTitles(){
		$titles = $this->response->find('h3');
		$results = [];
		
		foreach($titles as $title){
			$results[] = $title->plaintext . PHP_EOL . PHP_EOL;
		}	
		return $results;
	}
	
	public function getNames(){
		$names = $this->response->find('.package-name');
		$results = [];
		
		foreach($names as $name){
			$results[] = $name->plaintext . PHP_EOL . PHP_EOL;
		}	
		return $results;
	}
	
	public function getDescriptions(){
		$descriptions = $this->response->find('.package-description');
		$results = [];
		
		foreach($descriptions as $description){
			$results[] = $description->plaintext . PHP_EOL . PHP_EOL;
		}	
		return $results;		
	}
	
	public function getPrices(){		
		$priceInfos = $this->response->find('.package-price');		
		$results = [];
		
		foreach($priceInfos as $priceInfo){		
			$price = $priceInfo->firstChild()->plaintext . PHP_EOL . PHP_EOL;
			$discount = $priceInfo->lastChild()->plaintext . PHP_EOL . PHP_EOL;
			
			$results['price'][] = $price;
			$results['discount'][] = $discount;	
		}
		return $results;
	}
	
	private function assembleResults(){
		$broadbandInfo = [];		
				
		foreach($this->titles as $k => $v){
			$broadbandInfo[$k]['option title'] = $v;
			$broadbandInfo[$k]['name'] = $this->names[$k];
			$broadbandInfo[$k]['description'] = $this->descriptions[$k];
			$broadbandInfo[$k]['price'] = $this->prices['price'][$k];
			$broadbandInfo[$k]['discount'] = $this->prices['discount'][$k];
		}

		$json = json_encode($broadbandInfo, JSON_UNESCAPED_UNICODE);
		echo $json;
		
	}
	
}