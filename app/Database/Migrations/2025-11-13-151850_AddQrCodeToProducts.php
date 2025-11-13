<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQrCodeToProducts extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products', [
            'qr_code' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'price'
            ],
            'stock_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 0,
                'after' => 'qr_code'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', ['qr_code', 'stock_quantity']);
    }
}
