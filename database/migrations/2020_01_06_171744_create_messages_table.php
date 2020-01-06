<?php

use App\Message;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('chat_id');
            $table->unsignedBigInteger('reply_message_id')->nullable();
            $table->unsignedBigInteger('forward_message_id')->nullable();
            $table->unsignedBigInteger('message_media_id')->nullable();

            $table->enum('state', Message::MESSAGE_STATES)->default(Message::MESSAGE_STATE_PENDING);
            $table->unsignedBigInteger('views')->default(0);

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('chat_id')
                ->references('id')
                ->on('chats');

            $table->foreign('reply_message_id')
                ->references('id')
                ->on('messages');

            $table->foreign('forward_message_id')
                ->references('id')
                ->on('messages');

            $table->foreign('message_media_id')
                ->references('id')
                ->on('messages_media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
