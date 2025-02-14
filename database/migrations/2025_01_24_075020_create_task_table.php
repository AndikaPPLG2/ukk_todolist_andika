<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

return new class extends Migration {
    public function up(): void {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->enum("status", ["selesai", "belum selesai"]);
            $table->date('tanggal'); 
            $table->enum("prioritas", ["1", "2", "3", "4"]);
            $table->unsignedBigInteger("id_list");
            
            $table->timestamps();

            
        });
    }

    public function down(): void {
        Schema::dropIfExists('task');
    }
};
