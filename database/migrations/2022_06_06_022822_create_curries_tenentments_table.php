<?php

use App\Models\Currier;
use App\Models\Tenentment;
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
        Schema::create('curries_tenentments', function (Blueprint $table) {
            $table->id();
            $table->integer('currier_id')->unsigned()->foreignIdFor(Currier::class);
            $table->integer('tenentment_id')->unsigned()->foreignIdFor(Tenentment::class);
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
        Schema::dropIfExists('curries_tenentments');
    }
};
