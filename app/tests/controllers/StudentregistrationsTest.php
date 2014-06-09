<?php

use Mockery as m;
use Way\Tests\Factory;

class StudentregistrationsTest extends TestCase {

    public function __construct()
    {
        $this->mock = m::mock('Eloquent', 'Studentregistration');
        $this->collection = m::mock('Illuminate\Database\Eloquent\Collection')->shouldDeferMissing();
    }

    public function setUp()
    {
        parent::setUp();

        $this->attributes = Factory::studentregistration(['id' => 1]);
        $this->app->instance('Studentregistration', $this->mock);
    }

    public function tearDown()
    {
        m::close();
    }

    public function testIndex()
    {
        $this->mock->shouldReceive('all')->once()->andReturn($this->collection);
        $this->call('GET', 'studentregistrations');

        $this->assertViewHas('studentregistrations');
    }

    public function testCreate()
    {
        $this->call('GET', 'studentregistrations/create');

        $this->assertResponseOk();
    }

    public function testStore()
    {
        $this->mock->shouldReceive('create')->once();
        $this->validate(true);
        $this->call('POST', 'studentregistrations');

        $this->assertRedirectedToRoute('studentregistrations.index');
    }

    public function testStoreFails()
    {
        $this->mock->shouldReceive('create')->once();
        $this->validate(false);
        $this->call('POST', 'studentregistrations');

        $this->assertRedirectedToRoute('studentregistrations.create');
        $this->assertSessionHasErrors();
        $this->assertSessionHas('message');
    }

    public function testShow()
    {
        $this->mock->shouldReceive('findOrFail')
                   ->with(1)
                   ->once()
                   ->andReturn($this->attributes);

        $this->call('GET', 'studentregistrations/1');

        $this->assertViewHas('studentregistration');
    }

    public function testEdit()
    {
        $this->collection->id = 1;
        $this->mock->shouldReceive('find')
                   ->with(1)
                   ->once()
                   ->andReturn($this->collection);

        $this->call('GET', 'studentregistrations/1/edit');

        $this->assertViewHas('studentregistration');
    }

    public function testUpdate()
    {
        $this->mock->shouldReceive('find')
                   ->with(1)
                   ->andReturn(m::mock(['update' => true]));

        $this->validate(true);
        $this->call('PATCH', 'studentregistrations/1');

        $this->assertRedirectedTo('studentregistrations/1');
    }

    public function testUpdateFails()
    {
        $this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['update' => true]));
        $this->validate(false);
        $this->call('PATCH', 'studentregistrations/1');

        $this->assertRedirectedTo('studentregistrations/1/edit');
        $this->assertSessionHasErrors();
        $this->assertSessionHas('message');
    }

    public function testDestroy()
    {
        $this->mock->shouldReceive('find')->with(1)->andReturn(m::mock(['delete' => true]));

        $this->call('DELETE', 'studentregistrations/1');
    }

    protected function validate($bool)
    {
        Validator::shouldReceive('make')
                ->once()
                ->andReturn(m::mock(['passes' => $bool]));
    }
}