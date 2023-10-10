<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('permission')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'name' => 'konyvtaros', 
            'email' => 'konyvtar@gmail.com', 
            'password' => Hash::make('yes'),
            'permission' => 0]);

        User::create([
            'name' => 'Gazsi', 
            'email' => 'gazsi@gmail.com', 
            'password' => Hash::make('aaa123')]);
        
        User::create([
                'name' => 'Gizi', 
                'email' => 'gizi@gmail.com', 
                'password' => Hash::make('aaa1234')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
