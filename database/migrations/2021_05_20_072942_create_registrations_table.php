<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('doc_type');
            $table->string('doc_name');
            $table->string('gender', 6);
            $table->string('fullname', 50);
            $table->string('address', 50);
            $table->string('email', 50);
            $table->integer('amount');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->text('bsc_address');
            $table->enum('status', ['0', 'declined', 'accepted']);
            $table->enum('notified', [true, false])->default(false);
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
        Schema::dropIfExists('registrations');
    }
}
