<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Models\Contact;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    private function login()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_cannot_create_contact_with_invalid_data()
    {
        $this->login();

        $response = $this->post('/contacts', [
            'name' => 'Jo',           // < 6 caracteres
            'email' => 'invalid.com', // e-mail inválido
            'phone' => '123',         // < 9 caracteres
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'phone']);
        $this->assertDatabaseCount('contacts', 0);
    }

    public function test_can_create_contact_with_valid_data()
    {
        $this->login();

        $response = $this->post('/contacts', [
            'name' => 'Nícollas Frazão',
            'email' => 'nicollas@example.com',
            'phone' => '123456789',
        ]);

        $response->assertStatus(302); // Redireciona após salvar
        $this->assertDatabaseHas('contacts', [
            'email' => 'nicollas@example.com',
            'phone' => '123456789',
        ]);
    }

    public function test_cannot_update_contact_with_duplicate_email_or_phone()
    {
        $this->login();

        $contact1 = Contact::factory()->create([
            'email' => 'primeiro@example.com',
            'phone' => '111111111',
        ]);

        $contact2 = Contact::factory()->create([
            'email' => 'segundo@example.com',
            'phone' => '222222222',
        ]);

        // Tentando editar o segundo com o e-mail e telefone do primeiro
        $response = $this->put("/contacts/{$contact2->id}", [
            'name' => 'Contato Editado',
            'email' => 'primeiro@example.com', // Já existe
            'phone' => '111111111',            // Já existe
        ]);

        $response->assertSessionHasErrors(['email', 'phone']);
    }

    public function test_can_update_contact_with_own_email_and_phone()
    {
        $this->login();

        $contact = Contact::factory()->create([
            'email' => 'nicollas@example.com',
            'phone' => '123456789',
        ]);

        // Mesmo email/phone, mas é do próprio registro
        $response = $this->put("/contacts/{$contact->id}", [
            'name' => 'Nome Atualizado',
            'email' => 'nicollas@example.com',
            'phone' => '123456789',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'name' => 'Nome Atualizado',
        ]);
    }
}
