<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Php\Support\Laravel\Sorting\Database\Sortable;
use Php\Support\Laravel\Tests\TestClasses\Models\SortCustomColumnModel;
use Php\Support\Laravel\Traits\Database\UUID;

class CreateSortableTableWCustomCol extends Migration
{
    use Sortable, UUID;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'sort_entities_custom_col',
            static function (Blueprint $table) {
                static::columnUUID($table)->primary();
                static::columnSortingPosition($table, SortCustomColumnModel::getSortingColumnName());
                $table->string('title')->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sort_entities_custom_col');
    }

}
