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
            Schema::create('projects', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('short_description', 500); // Deskripsi singkat, batasi 500 karakter
                $table->json('main_features')->nullable(); // Fitur utama (JSON array)
                $table->json('technologies_used')->nullable(); // Teknologi yang digunakan (JSON array)
                $table->string('github_link')->nullable(); // Tautan GitHub
                $table->string('demo_link')->nullable(); // Tautan demo proyek
                $table->string('image_url')->nullable(); // URL gambar proyek
                $table->integer('order')->default(0); // Urutan tampilan proyek
                $table->timestamps(); // created_at dan updated_at
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('projects');
        }
    };
    