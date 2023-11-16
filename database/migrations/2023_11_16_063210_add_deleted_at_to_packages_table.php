<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->softDeletes()->after('updated_at'); // Add `deleted_at` column after `updated_at`
        });
    }

    public function down()
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropSoftDeletes(); // To rollback migration if necessary
        });
    }
}
