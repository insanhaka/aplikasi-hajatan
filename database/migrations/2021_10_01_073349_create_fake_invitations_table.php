<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakeInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fake_invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id')->nullable();
            $table->foreign('theme_id')->references('id')->on('invitation_themes')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('man_nickname');
            $table->string('man_fullname');
            $table->string('man_parentname');
            $table->string('man_photo');

            $table->string('women_nickname');
            $table->string('women_fullname');
            $table->string('women_parentname');
            $table->string('women_photo');

            $table->string('couple_photo_one');
            $table->string('couple_photo_two');

            $table->longText('open_greeting');
            $table->longText('close_greeting');

            $table->date('akad_time');
            $table->string('akad_place');
            $table->date('resepsi_time');
            $table->string('resepsi_place');

            $table->string('thumbnail')->nullable();
            $table->string('url');

            $table->boolean('is_active');
            $table->boolean('sales_status')->nullable();

            $table->string('created_by', 50);
            $table->string('updated_by', 50)->nullable();
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
        Schema::dropIfExists('fake_invitations');
    }
}
