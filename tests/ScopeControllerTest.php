<?php

use PHPUnit\Framework\TestCase;

class ScopeControllerTest extends TestCase
{
    public function testShouldGetScopes()
    {
        $controller = new \Mycools\Passport\Http\Controllers\ScopeController;

        \Mycools\Passport\Passport::tokensCan($scopes = [
            'place-orders' => 'Place orders',
            'check-status' => 'Check order status',
        ]);

        $result = $controller->all();

        $this->assertCount(2, $result);
        $this->assertContainsOnlyInstancesOf(\Mycools\Passport\Scope::class, $result);
        $this->assertSame(['id' => 'place-orders', 'description' => 'Place orders'], $result[0]->toArray());
        $this->assertSame(['id' => 'check-status', 'description' => 'Check order status'], $result[1]->toArray());
    }
}
