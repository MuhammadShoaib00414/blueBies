<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToSupportRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('support_requests', function (Blueprint $table) {
        $table->softDeletes();
    });
}

public function down()
{
    Schema::table('support_requests', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
}
