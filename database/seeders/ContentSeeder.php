<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use App\Models\Post;
use App\Models\Product;
use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Program & Jadwal
        Program::insert([
            [
                'title' => 'Certified Human Resource Professional (CHRP)',
                'slug' => 'certified-human-resource-professional-chrp',
                'format' => 'Offline',
                'location' => 'Hotel JW Marriott, Surabaya',
                'start_date' => now()->addDays(15),
                'end_date' => now()->addDays(17),
                'price' => 5500000,
                'quota' => 30,
                'description' => 'Pelatihan sertifikasi kompetensi HR yang dirancang untuk HR Supervisor hingga HR Manager dengan pendekatan praktis dan studi kasus terkini.',
                'content' => '<p>Program CHRP dirancang untuk membekali para praktisi SDM dengan kompetensi strategis yang dibutuhkan oleh perusahaan modern...</p>',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Workshop Menyusun Key Performance Indicator (KPI)',
                'slug' => 'workshop-menyusun-kpi',
                'format' => 'Online',
                'location' => 'Zoom Meeting',
                'start_date' => now()->addDays(25),
                'end_date' => now()->addDays(25),
                'price' => 1250000,
                'quota' => 50,
                'description' => 'Pelatihan intensif satu hari untuk memahami cara merumuskan, menurunkan (cascading), dan mengevaluasi KPI organisasi.',
                'content' => '<p>Menyusun KPI seringkali menjadi tantangan bagi para leader. Workshop ini akan memberikan template dan framework yang mudah diaplikasikan.</p>',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 2. Produk Digital
        Product::insert([
            [
                'title' => 'Master Template: SOP & Job Description (All Division)',
                'slug' => 'master-template-sop-job-description',
                'category' => 'Template Dokumen',
                'price' => 350000,
                'description' => 'Kumpulan 100+ template Standard Operating Procedure (SOP) dan Deskripsi Pekerjaan siap pakai untuk berbagai divisi.',
                'content' => '<p>Tidak perlu menyusun dari nol. Gunakan template kami yang telah distandardisasi sesuai best practices ISO dan manajemen modern.</p>',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Toolkit Asesmen Kompetensi & Wawancara Perilaku',
                'slug' => 'toolkit-asesmen-kompetensi',
                'category' => 'HR Toolkit',
                'price' => 250000,
                'description' => 'Kamus kompetensi lengkap beserta panduan pertanyaan wawancara berbasis Targeted Selection (Behavioral Event Interview).',
                'content' => '<p>Dapatkan panduan lengkap untuk melakukan rekrutmen dan promosi jabatan yang objektif dan berbasis kompetensi terukur.</p>',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 3. Studi Kasus
        CaseStudy::insert([
            [
                'title' => 'Restrukturisasi Organisasi untuk BUMN Sektor Manufaktur',
                'slug' => 'restrukturisasi-organisasi-bumn-manufaktur',
                'client' => 'PT XYZ (BUMN)',
                'sector' => 'Manufaktur',
                'service_type' => 'Pengembangan Organisasi & SDM',
                'completed_at' => now()->subMonths(3),
                'excerpt' => 'Bagaimana kami membantu perusahaan BUMN memangkas birokrasi dan mendesain ulang struktur organisasi yang lebih lincah dan berorientasi profit.',
                'content' => '<p>Tantangan utama dari klien adalah gemuknya struktur yang memperlambat pengambilan keputusan. Melalui asesmen selama 2 bulan, kami merancang...</p>',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Penyusunan Rencana Strategis (Renstra) RSUD Kota',
                'slug' => 'penyusunan-renstra-rsud',
                'client' => 'RSUD Kota ABC',
                'sector' => 'Kesehatan / Pemerintah Daerah',
                'service_type' => 'Konsultasi Manajemen',
                'completed_at' => now()->subMonths(6),
                'excerpt' => 'Pendampingan penyusunan dokumen Renstra 5 tahunan RSUD untuk meningkatkan kualitas layanan pasien dan efisiensi anggaran BLUD.',
                'content' => '<p>Penyusunan Renstra RSUD memerlukan keselarasan dengan visi kepala daerah sekaligus pemenuhan standar layanan minimal...</p>',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 4. Posts / Blog
        Post::insert([
            [
                'post_category_id' => 1, // Asumsi 1 adalah Manajemen Bisnis
                'title' => 'Mengapa Transformasi Organisasi Sering Gagal di Tahap Eksekusi?',
                'slug' => Str::slug('Mengapa Transformasi Organisasi Sering Gagal di Tahap Eksekusi?'),
                'excerpt' => 'Riset menunjukkan 70% inisiatif transformasi gagal. Artikel ini membedah akar masalahnya dan bagaimana mengatasinya melalui pendekatan change management.',
                'content' => '<p>Banyak perusahaan yang sangat antusias di awal ketika merencanakan perubahan (transformasi). Namun...</p>',
                'published_at' => now()->subDays(2),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_category_id' => 2, // Asumsi 2 adalah Pengembangan SDM
                'title' => 'Pentingnya Assessment Center dalam Promosi Jabatan',
                'slug' => Str::slug('Pentingnya Assessment Center dalam Promosi Jabatan'),
                'excerpt' => 'Mempromosikan karyawan terbaik di bidang teknis menjadi manajer bisa menjadi bumerang tanpa alat ukur leadership yang tepat.',
                'content' => '<p>Seringkali kita melihat "Star Employee" di lapangan yang gagal ketika diangkat menjadi leader. Mengapa? Karena skill teknis berbeda dengan...</p>',
                'published_at' => now()->subDays(5),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'post_category_id' => 3, // Asumsi 3 adalah Transformasi Digital
                'title' => 'Digitalisasi HR: Mengubah Administrasi Menjadi Keputusan Strategis',
                'slug' => Str::slug('Digitalisasi HR Mengubah Administrasi Menjadi Keputusan Strategis'),
                'excerpt' => 'Peran HR harus berevolusi dari sekadar pengurus presensi menjadi mitra strategis bisnis dengan bantuan otomatisasi dan analitik data.',
                'content' => '<p>Di era digital, masih banyak tim HR yang menghabiskan 80% waktunya untuk urusan administratif. Padahal, dengan Human Resource Information System (HRIS)...</p>',
                'published_at' => now()->subDays(10),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
