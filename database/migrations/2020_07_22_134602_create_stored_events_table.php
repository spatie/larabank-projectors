<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoredEventsTable extends Migration
{
    public function up()
    {
        Schema::create('stored_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('aggregate_uuid')
                ->nullable()
                ->unique();
            $table
                ->unsignedBigInteger('aggregate_version')
                ->nullable()
                ->unique();
            $table->integer('event_version')
                ->default(1);
            $table->string('event_class');
            $table->json('event_properties');
            $table->json('meta_data');
            $table->timestamp('created_at');
            $table->index('event_class');
            $table->index('aggregate_uuid');
        });
    }
}
