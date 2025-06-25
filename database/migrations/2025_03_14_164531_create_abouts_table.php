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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم المستخدم
            $table->date('birthday'); // تاريخ الميلاد
            $table->integer('age'); // العمر
            $table->string('phone')->unique(); // رقم الهاتف
            $table->string('city'); // المدينة
            $table->string('degree'); // الدرجة العلمية
            $table->string('email')->unique(); // البريد الإلكتروني
            $table->string('img')->nullable(); // صورة الملف الشخصي
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
