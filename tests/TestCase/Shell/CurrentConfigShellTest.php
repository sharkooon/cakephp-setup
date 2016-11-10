<?php
namespace Setup\Test\TestCase\Shell;

use Cake\Console\ConsoleIo;
use Cake\TestSuite\TestCase;
use Setup\Shell\CurrentConfigShell;
use Tools\TestSuite\ConsoleOutput;

/**
 * CurrentConfig shell test
 */
class CurrentConfigShellTest extends TestCase {

	/**
	 * @var \Setup\Shell\CurrentConfigShell
	 */
	public $Shell;

	public function setUp() {
		parent::setUp();

		$this->out = new ConsoleOutput();
		$io = new ConsoleIo($this->out);

		$this->Shell = $this->getMockBuilder(CurrentConfigShell::class)
			->setMethods(['in', 'err', '_stop'])
			->setConstructorArgs([$io])
			->getMock();
	}

	public function testMain() {
		$this->Shell->runCommand(['clean', TMP]);
		$output = $this->out->output();

		$this->assertContains('[driver]', $output);
		$this->assertContains('[className]', $output);
	}

}
