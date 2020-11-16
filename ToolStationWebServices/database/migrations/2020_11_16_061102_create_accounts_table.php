<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->string('kota')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('mobile')->unique()->nullable();
            $table->string('email')->unique();
            $table->date('ttl')->nullable();
            $table->boolean('member')->default(false);
            $table->boolean('status')->default(false);
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->date('masa_berlaku')->nullable();
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts',function(Blueprint $table){
            $table->dropForeign('accounts_user_id_foreign');
            $table->dropIndex('accounts_user_id_index');
            $table->dropColumn('user_id');
        });
    }
}
