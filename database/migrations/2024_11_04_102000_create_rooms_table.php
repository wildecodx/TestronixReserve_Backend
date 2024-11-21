    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->string('room-venue');
                $table->string('room-location');
                $table->string('room-capacity');
                $table->string('room-image');
                $table->string('room-features');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('rooms');
        }
    };
