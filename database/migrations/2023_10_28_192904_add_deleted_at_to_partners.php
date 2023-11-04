<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToPartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
    
}
