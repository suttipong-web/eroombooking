<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cmu_oauth', function (Blueprint $table) {
            $table->id();
            $table->string('cmuitaccount',254);        
            $table->string('prename_TH',254);
            $table->string('firstname_TH',254);
            $table->string('lastname_TH',254);
            $table->string('positionName',254);     
            $table->tinyInteger('isAdmin')->default(0);
            $table->tinyInteger('isDean')->default(0);            
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
        Schema::dropIfExists('cmu_oauth');
    }
};
