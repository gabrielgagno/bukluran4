<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_student', function (Blueprint $table) {
            $table->foreignId('organization_id')->constrained();
            $table->foreignId('student_id')->constrained();
            $table->boolean('is_officer')->default(false);
            $table->string('officer_position')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('organization_student', function (Blueprint $table) {
            $table->dropForeign(['organization_id']);
            $table->dropForeign(['student_id']);
        });
        Schema::dropIfExists('organization_student');
    }
}