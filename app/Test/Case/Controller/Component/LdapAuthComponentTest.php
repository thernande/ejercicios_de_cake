<?php
App::uses('ComponentCollection', 'Controller');
App::uses('Component', 'Controller');
App::uses('LdapAuthComponent', 'Controller/Component');

/**
 * LdapAuthComponent Test Case
 *
 */
class LdapAuthComponentTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$Collection = new ComponentCollection();
		$this->LdapAuth = new LdapAuthComponent($Collection);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LdapAuth);

		parent::tearDown();
	}

/**
 * testExistsOrCreateSQLGroup method
 *
 * @return void
 */
	public function testExistsOrCreateSQLGroup() {
	}

/**
 * testExistsOrCreateSQLUser method
 *
 * @return void
 */
	public function testExistsOrCreateSQLUser() {
	}

/**
 * testGetGroups method
 *
 * @return void
 */
	public function testGetGroups() {
	}

}
