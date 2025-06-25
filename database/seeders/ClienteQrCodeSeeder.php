<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;
use App\Models\QRCode;

class ClienteQrCodeSeeder extends Seeder
{
    public function run()
    {
        // 1) Cria um cliente novo (ou busca um existente)
        $cliente = Cliente::create([
            'nome'     => 'Cliente de Teste',
            'cpf'      => '000.000.000-00',
            'email'    => 'teste@cliente.com',
            'telefone' => '(11) 99999-9999',
        ]);

        // 2) Busca o QRCode pelo code
        $qr = QRCode::where('code', 'de790b7d-66a1-4ef0-a1e7-5f36392415f3')->first();

        if (! $qr) {
            $this->command->error("QRCode não encontrado!");
            return;
        }

        // 3) Atualiza o cliente_id do QRCode
        $qr->cliente_id = $cliente->id;
        $qr->save();

        $this->command->info("Cliente #{$cliente->id} vinculado ao QRCode {$qr->code}");
    }
}

