<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('number_card');
            $table->string('name');
            $table->string('gambar');
            $table->foreignId('kelas_id')->constrained();
            $table->enum('role', ['admin', 'siswa']);
            $table->enum('gender', ['Laki-laki', 'Perempuan', 'Rahasia']);
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('users');
    }
};
