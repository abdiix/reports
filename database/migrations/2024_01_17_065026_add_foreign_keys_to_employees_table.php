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
        Schema::table('employees', function (Blueprint $table) {
            $table->foreign(['reportsTo'], 'employees_ibfk_1')->references(['employeeNumber'])->on('employees');
            $table->foreign(['officeCode'], 'employees_ibfk_2')->references(['officeCode'])->on('offices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropForeign('employees_ibfk_1');
            $table->dropForeign('employees_ibfk_2');
        });
    }
};
