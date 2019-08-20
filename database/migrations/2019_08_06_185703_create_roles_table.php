<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        DB::table('roles')->insert([
                [
                    'role'        => 'ADMIN',
                    'description' => 'Can enter to admin panel, create, update, delete everything, change permissions'
                ],
                [
                    'role'        => 'ORGANIZER',
                    'description' => 'Can enter to admin panel, view, create, update, delete own events'
                ],
                [
                    'role'        => 'USER',
                    'description' => 'Regular user'
                ]
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
