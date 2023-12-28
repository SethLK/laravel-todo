<?php

// database/migrations/xxxx_xx_xx_xxx_create_tasks_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("name", 500);
            $table->boolean("completed")->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}

// migration/xxxx_xx_xx_xxx_create_tasks_table.php