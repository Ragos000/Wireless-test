<?php
use PHPUnit\Framework\TestCase;
use App\Crawler;

final class CrawlerTest extends TestCase
{
	private $crawler;
	
	protected function setUp(): void{
		$this->crawler = new Crawler('https://wltest.dns-systems.net/');
	}
	
	protected function tearDown(): void{
		$this->crawler = null;
	}
	
	 public function testGetTitles(): void{
		 
		 $expected = ["Basic: 500MB Data - 12 Months\n", "Standard: 1GB Data - 12 Months\n", "Optimum: 2 GB Data - 12 Months\n", "Basic: 6GB Data - 1 Year\n", "Standard: 12GB Data - 1 Year\n", "Optimum: 24GB Data - 1 Year\n"];		 	
			
		$result = $this->crawler->getTitles();
		
		var_dump($result);
				
        $this->assertEquals($expected, $result);
    }
	
    /*public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    public function testCannotBeCreatedFromInvalidEmailAddress(): void
    {
        $this->expectException(InvalidArgumentException::class);

        Email::fromString('invalid');
    }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }*/
}