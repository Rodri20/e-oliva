<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_form_requires_core_fields(): void
    {
        $response = $this->from('/')->post('/contacto', []);

        $response
            ->assertRedirect('/')
            ->assertSessionHasErrors(['name', 'email', 'interest']);
    }

    public function test_contact_form_accepts_valid_submission(): void
    {
        $response = $this->from('/')->post('/contacto', [
            'name' => 'Luis',
            'email' => 'luis@example.com',
            'interest' => 'catalogo',
            'phone' => '999999999',
            'message' => 'Quiero recibir novedades del catalogo.',
        ]);

        $response
            ->assertRedirect('/')
            ->assertSessionHasNoErrors()
            ->assertSessionHas('contact_status');
    }
}
