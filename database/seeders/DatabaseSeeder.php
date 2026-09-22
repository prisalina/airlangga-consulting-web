<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\PostCategory;
use App\Models\Sector;
use App\Models\Service;
use App\Models\Stat;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Stats
        Stat::insert([
            ['label' => 'Proyek Terselesaikan', 'value' => '150+', 'sort_order' => 1, 'is_active' => true],
            ['label' => 'Klien Institusi & Korporasi', 'value' => '60+', 'sort_order' => 2, 'is_active' => true],
            ['label' => 'Konsultan Spesialis', 'value' => '25+', 'sort_order' => 3, 'is_active' => true],
            ['label' => 'Tahun Pengalaman', 'value' => '12+', 'sort_order' => 4, 'is_active' => true],
        ]);

        // 2. Services & Service Items
        $services = [
            [
                'name' => 'Konsultasi Manajemen',
                'slug' => 'konsultasi-manajemen',
                'icon' => 'fa-briefcase',
                'short_description' => 'Pendampingan strategis untuk merumuskan ulang sistem tata kelola, evaluasi bisnis, dan peningkatan efisiensi operasional organisasi.',
                'items' => [
                    'Penyusunan Rencana Strategis (Renstra)',
                    'Evaluasi Kinerja & Perbaikan Operasional',
                    'Perancangan KPI & Manajemen Kinerja',
                ],
            ],
            [
                'name' => 'Pengembangan Organisasi & SDM',
                'slug' => 'pengembangan-organisasi-sdm',
                'icon' => 'fa-users',
                'short_description' => 'Layanan asesmen, pemetaan talenta, dan perancangan struktur organisasi yang agile untuk menjawab tantangan industri modern.',
                'items' => [
                    'Pelatihan & Pengembangan Kompetensi SDM',
                    'Asesmen & Pemetaan Talenta (Assessment Center)',
                    'Desain Organisasi & Analisis Jabatan',
                ],
            ],
            [
                'name' => 'Perencanaan Bisnis',
                'slug' => 'perencanaan-bisnis',
                'icon' => 'fa-chart-pie',
                'short_description' => 'Penyusunan business plan, riset kelayakan, dan penyusunan strategi pemasaran yang komprehensif untuk ekspansi bisnis Anda.',
                'items' => [
                    'Business Plan & Studi Kelayakan',
                    'Riset Pasar & Strategi Pemasaran',
                    'Pendampingan UMKM & Koperasi',
                ],
            ],
            [
                'name' => 'Pendampingan Transformasi Organisasi',
                'slug' => 'pendampingan-transformasi-organisasi',
                'icon' => 'fa-rotate-right',
                'short_description' => 'Mengawal setiap perubahan struktur, digitalisasi sistem, dan budaya kerja organisasi secara end-to-end tanpa mengganggu proses bisnis harian.',
                'items' => [
                    'Manajemen Perubahan (Change Management)',
                    'Penyusunan SOP & Sistem Manajemen Mutu',
                    'Transformasi Digital & Produktivitas Berbasis AI',
                ],
            ],
            [
                'name' => 'Kajian & Riset',
                'slug' => 'kajian-dan-riset',
                'icon' => 'fa-microscope',
                'short_description' => 'Layanan kajian kebijakan publik, naskah akademik, survei, hingga survei indeks kepuasan dengan pendekatan saintifik.',
                'items' => [
                    'Kajian Kebijakan Publik & Naskah Akademik',
                    'Survei, Analisis Data, & Polling',
                    'Monitoring & Evaluasi (Monev) Program',
                ],
            ],
        ];

        foreach ($services as $idx => $s) {
            $service = Service::create([
                'name' => $s['name'],
                'slug' => $s['slug'],
                'icon' => $s['icon'],
                'short_description' => $s['short_description'],
                'description' => $s['short_description'],
                'content' => '<p>'.$s['short_description'].'</p>',
                'sort_order' => $idx + 1,
                'is_active' => true,
            ]);

            foreach ($s['items'] as $itemIdx => $itemName) {
                $service->items()->create([
                    'name' => $itemName,
                    'slug' => str($itemName)->slug(),
                    'description' => 'Layanan '.$itemName.' dari Airlangga Consulting difokuskan untuk memberikan hasil yang terukur dan aplikatif.',
                    'content' => "<p>Detail lengkap mengenai layanan {$itemName}. Pendekatan yang kami gunakan didesain agar adaptif terhadap dinamika lapangan.</p>",
                    'sort_order' => $itemIdx + 1,
                    'is_active' => true,
                ]);
            }
        }

        // 3. Teams
        Team::insert([
            ['name' => 'Dr. Budi Santoso, M.M.', 'position' => 'Senior Partner', 'bio' => 'Memiliki pengalaman lebih dari 15 tahun di bidang transformasi BUMN dan kebijakan publik.', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Rina Andriani, Psikolog', 'position' => 'Head of HR Consulting', 'bio' => 'Pakar asesmen kompetensi dan manajemen talenta dengan lisensi sertifikasi nasional.', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Ahmad Fauzi, M.B.A.', 'position' => 'Business Strategy Lead', 'bio' => 'Konsultan ahli strategi bisnis dan riset pasar untuk korporasi menengah ke atas.', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Diana Lestari, S.E., M.Si.', 'position' => 'Senior Researcher', 'bio' => 'Berpengalaman menangani riset kepuasan pelanggan dan evaluasi program pemerintah daerah.', 'sort_order' => 4, 'is_active' => true],
        ]);

        // 4. Testimonials
        Testimonial::insert([
            ['name' => 'Direktur HRD, BUMN Sektor Karya', 'position' => 'Klien Organisasi', 'content' => 'Pendampingan restrukturisasi yang dilakukan tim Airlangga sangat solutif dan aplikatif. Kami berhasil memangkas birokrasi dan meningkatkan produktivitas hingga 30% dalam 6 bulan.', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Kepala Dinas Provinsi Jatim', 'position' => 'Klien Instansi Pemerintah', 'content' => 'Laporan naskah akademik yang disusun komprehensif, berbasis data yang kuat, dan disajikan dengan sangat rapi. Sangat membantu perumusan kebijakan dinas kami.', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'CEO Startup EduTech', 'position' => 'Klien Perusahaan', 'content' => 'Sistem KPI yang disusunkan oleh konsultan Airlangga sangat clear dan mengubah cara tim kami bekerja secara signifikan menjadi lebih terukur.', 'sort_order' => 3, 'is_active' => true],
        ]);

        // 5. Sectors
        Sector::insert([
            ['name' => 'Kementerian & Lembaga Negara', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Badan Usaha Milik Negara (BUMN/BUMD)', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Pemerintah Daerah (Provinsi/Kab/Kota)', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Perusahaan Swasta & Manufaktur', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'Pendidikan Tinggi & Rumah Sakit', 'sort_order' => 5, 'is_active' => true],
            ['name' => 'Non-Governmental Organization (NGO)', 'sort_order' => 6, 'is_active' => true],
        ]);

        // 6. FAQs
        Faq::insert([
            ['question' => 'Apakah Airlangga Consulting melayani klien di luar Surabaya?', 'answer' => 'Ya, kami melayani klien di seluruh Indonesia. Tim kami siap ditugaskan ke berbagai wilayah kerja klien ataupun melaksanakan pendampingan secara hybrid.', 'sort_order' => 1, 'is_active' => true],
            ['question' => 'Berapa lama proses pembuatan proposal atau penawaran harga?', 'answer' => 'Proposal awal (Term of Reference/TOR) umumnya kami siapkan dalam 2-4 hari kerja setelah sesi diskusi awal atau asesmen kebutuhan dengan calon klien.', 'sort_order' => 2, 'is_active' => true],
            ['question' => 'Apakah kami bisa berkonsultasi terlebih dahulu tanpa dikenakan biaya?', 'answer' => 'Tentu. Anda dapat menjadwalkan sesi konsultasi gratis (Discovery Session) selama 45-60 menit bersama konsultan utama kami untuk membahas kendala yang dihadapi.', 'sort_order' => 3, 'is_active' => true],
            ['question' => 'Apakah Airlangga menyediakan jasa In-House Training?', 'answer' => 'Ya. Hampir semua layanan pengembangan SDM kami dapat dikemas dalam format In-House Training yang disesuaikan secara khusus dengan kultur organisasi Anda.', 'sort_order' => 4, 'is_active' => true],
        ]);

        // 7. Blog Categories
        PostCategory::insert([
            ['name' => 'Manajemen Bisnis', 'slug' => 'manajemen-bisnis', 'sort_order' => 1],
            ['name' => 'Pengembangan SDM', 'slug' => 'pengembangan-sdm', 'sort_order' => 2],
            ['name' => 'Transformasi Digital', 'slug' => 'transformasi-digital', 'sort_order' => 3],
        ]);
    }
}
