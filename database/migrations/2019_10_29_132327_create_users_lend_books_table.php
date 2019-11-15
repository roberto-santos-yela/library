<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLendBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_lend_books', function (Blueprint $table) {
            $table->primary(['user_id','book_id']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('book_id');
            $table->foreign ('user_id')->references('id')->on('users');
            $table->foreign ('book_id')->references('id')->on('books');
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
        Schema::dropIfExists('users_lend_books');
    }
}
