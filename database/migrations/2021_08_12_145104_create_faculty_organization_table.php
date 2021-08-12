<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultyOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_organization', function (Blueprint $table) {
            $table->foreignId('faculty_id')->constrained();
            $table->foreignId('organization_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faculty_organization', function (Blueprint $table) {
            $table->dropForeign(['faculty_id']);
            $table->dropForeign(['organization_id']);
        });
        Schema::dropIfExists('faculty_organization');
    }
}
