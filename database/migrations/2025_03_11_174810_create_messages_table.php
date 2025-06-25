<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المرسل
            $table->string('phone'); // رقم الهاتف
            $table->string('email'); // البريد الإلكتروني
            $table->text('content'); // محتوى الرسالة
            $table->boolean('is_answered')->default(false); // تم الرد أم لا (افتراضيًا: لم يتم الرد)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
