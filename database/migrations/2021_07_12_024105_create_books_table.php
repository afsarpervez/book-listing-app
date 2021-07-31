<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->string('author');
            $table->string('edition');
            $table->string('part')->nullable();
            $table->decimal('price', 9, 2)->default(0);
            $table->decimal('sales_price', 9, 2)->default(0);
            $table->string('keywords')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('up_file')->nullable();
            $table->unsignedInteger('download_counts')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
