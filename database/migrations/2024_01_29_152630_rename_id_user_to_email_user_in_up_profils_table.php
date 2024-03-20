<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameIdUserToEmailUserInUpProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('up_profils', function (Blueprint $table) {
            $table->string('emailUser')->after('idUser')->nullable();
            $table->dropColumn('idUser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('up_profils', function (Blueprint $table) {
            $table->renameColumn('emailUser', 'idUser');
        });
    }
}
