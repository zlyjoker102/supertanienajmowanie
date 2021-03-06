<?php
/**
 * MultiColumnAuthenticateTest file
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Test.Case.Controller.Component.Auth
 * @since         CakePHP(tm) v 2.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
namespace Croogo\Acl\Test\TestCase\Controller\Component\Auth;

use Acl\Controller\Component\Auth\MultiColumnAuthenticate;
use App\Controller\Component\AuthComponent;
use App\Model\AppModel;
use Cake\Network\Request;
use Cake\Network\Response;
use Croogo\TestSuite\CroogoTestCase;

/**
 * Test case for FormAuthentication
 *
 * @package       Cake.Test.Case.Controller.Component.Auth
 */
class MultiColumnAuthenticateTest extends CroogoTestCase
{

    public $fixtures = ['plugin.acl.multi_user'];

/**
 * setup
 *
 * @return void
 */
    public function setUp()
    {
        parent::setUp();
        $this->Collection = $this->getMock('ComponentRegistry');
        $this->auth = new MultiColumnAuthenticate($this->Collection, [
            'fields' => ['username' => 'user', 'password' => 'password'],
            'userModel' => 'MultiUser',
            'columns' => ['user', 'email']
        ]);
        $password = Security::hash('password', null, true);
        $User = ClassRegistry::init('MultiUser');
        $User->updateAll(['password' => $User->getDataSource()->value($password)]);
        $this->response = $this->getMock('Response');
    }

/**
 * test authenticate email or username
 *
 * @return void
 */
    public function testAuthenticateEmailOrUsername()
    {
        $request = new Request('posts/index', false);
        $expected = [
            'id' => 1,
            'user' => 'mariano',
            'email' => 'mariano@example.com',
            'created' => '2007-03-17 01:16:23',
            'updated' => '2007-03-17 01:18:31',
            'token' => '12345'
        ];

        $request->data = ['MultiUser' => [
            'user' => 'mariano',
            'password' => 'password'
        ]];
        $result = $this->auth->authenticate($request, $this->response);
        $this->assertEquals($expected, $result);

        $request->data = ['MultiUser' => [
            'user' => 'mariano@example.com',
            'password' => 'password'
        ]];
        $result = $this->auth->authenticate($request, $this->response);
        $this->assertEquals($expected, $result);
    }

/**
 * test the authenticate method
 *
 * @return void
 */
    public function testAuthenticateNoData()
    {
        $request = new Request('posts/index', false);
        $request->data = [];
        $this->assertFalse($this->auth->authenticate($request, $this->response));
    }

/**
 * test the authenticate method
 *
 * @return void
 */
    public function testAuthenticateNoUsername()
    {
        $request = new Request('posts/index', false);
        $request->data = ['MultiUser' => ['password' => 'foobar']];
        $this->assertFalse($this->auth->authenticate($request, $this->response));
    }

/**
 * test the authenticate method
 *
 * @return void
 */
    public function testAuthenticateNoPassword()
    {
        $request = new Request('posts/index', false);
        $request->data = ['MultiUser' => ['user' => 'mariano']];
        $this->assertFalse($this->auth->authenticate($request, $this->response));

        $request->data = ['MultiUser' => ['user' => 'mariano@example.com']];
        $this->assertFalse($this->auth->authenticate($request, $this->response));
    }

/**
 * test the authenticate method
 *
 * @return void
 */
    public function testAuthenticateInjection()
    {
        $request = new Request('posts/index', false);
        $request->data = [
            'MultiUser' => [
                'user' => '> 1',
                'password' => "' OR 1 = 1"
            ]];
            $this->assertFalse($this->auth->authenticate($request, $this->response));
    }

/**
 * test scope failure.
 *
 * @return void
 */
    public function testAuthenticateScopeFail()
    {
        $this->auth->settings['scope'] = ['user' => 'nate'];
        $request = new Request('posts/index', false);
        $request->data = ['User' => [
            'user' => 'mariano',
            'password' => 'password'
        ]];

        $this->assertFalse($this->auth->authenticate($request, $this->response));
    }
}
