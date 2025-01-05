<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama_lengkap');
            $table->string('jabatan');
            $table->string('no_hp');
            $table->text('alamat');
            $table->string('foto')->nullable();
            $table->string('kode_status');
            $table->string('kode_dept');
            $table->timestamps();
        });
    }
};
