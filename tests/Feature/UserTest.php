<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Teste para verificar se usuario tem acesso a rota de produto.
     *
     * @return void
     */

    public function test_permissao_user_route_produto()
    {
        $user = User::first();
        Auth::login($user);
        
        $response = $this->get(route('comum.produto.index'));
        $response->assertStatus(200);
    }

    public function test_nao_permissao_user_route_categoria()
    {
        $user = User::first();
        Auth::login($user);
        
        $response = $this->get(route('comum.categoria.index'));
        $response->assertStatus(403);
    }

    public function test_nao_permissao_user_route_marca()
    {
        $user = User::first();
        Auth::login($user);
        
        $response = $this->get(route('comum.marca.index'));
        $response->assertStatus(403);
    }
}
