<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceCatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_creates_a_service_that_a_customer_can_request(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $customer = User::factory()->create(['role' => 'customer']);
        $serviceDetails = [
            'name' => 'Air Conditioning Service',
            'description' => 'Air conditioner inspections and repairs.',
        ];

        $this->actingAs($admin)->get(route('Admin.services.index'))->assertOk();
        $this->post(route('Admin.services.store'), $serviceDetails)
            ->assertRedirect(route('Admin.services.index'));

        $service = Service::where('name', $serviceDetails['name'])->firstOrFail();

        $this->actingAs($customer)->post(route('Admin.services.store'), $serviceDetails)
            ->assertForbidden();
        $this->get(route('Customer.services'))
            ->assertOk()
            ->assertSeeText($service->name)
            ->assertSeeText($service->description)
            ->assertSeeText('Electrical Service');
        $this->get(route('Customer.request.create', ['service' => $service->id]))
            ->assertOk()
            ->assertViewHas('selectedService', $service->id);

        $requestDetails = [
            'name' => $customer->name,
            'address' => '123 Test Street',
            'phone' => '0771234567',
            'description' => 'The unit is leaking.',
            'request_date' => now()->addDay()->toDateString(),
            'request_time' => '10:00',
        ];

        $this->post(route('Customer.request.store'), $requestDetails + ['service_id' => 999999])
            ->assertSessionHasErrors('service_id');
        $this->assertDatabaseCount('service_requests', 0);

        $this->post(route('Customer.request.store'), $requestDetails + [
            'service_id' => $service->id,
            'service_name' => 'Unlisted service',
        ])->assertRedirect(route('Customer.requests'));

        $this->assertDatabaseHas('service_requests', [
            'user_id' => $customer->id,
            'service_name' => $service->name,
        ]);
    }
}
