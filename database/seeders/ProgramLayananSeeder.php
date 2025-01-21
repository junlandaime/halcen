<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramLayanan;
use Illuminate\Support\Str;

class ProgramLayananSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            [
                'nama_program' => 'Kuliah Halal',
                'nama_banner' => 'Program Kuliah Halal',
                'slug' => 'program-kuliah-halal',
                'deskripsi' => 'Program pendidikan formal dengan fokus pada studi halal di berbagai aspek.',
                'deskripsi_lengkap' => '<p>Kuliah Halal dirancang sebagai inisiatif edukasi yang bertujuan untuk memberikan wawasan kehalalan secara menyeluruh kepada masyarakat umum. Kuliah Halal tidak dipungut biaya apapun, dikemas seperti kelas intensif yang dilaksanakan selama 14 pertemuan (dilaksanakan satu kali dalam sepekan) secara daring melalui aplikasi Zoom Meeting. Program ini diharapkan dapat menjawab kebutuhan literasi halal, meningkatkan kesadaran, dan memberikan panduan praktis bagi masyarakat dalam menerapkan prinsip-prinsip halal dalam kehidupan sehari-hari.</p>',
                'tipe_kelas' => 'online',
                'durasi' => '14 Pertemuan, sepekan sekali',
                'materi' => [
                    "Konsep Halal dan Haram dalam Syariat Islam",
                    "Kebijakan dan Regulasi Perundang-undangan di Indonesia tentang Jaminan Produk Halal (JPH)",
                    "Pengetahuan Kehalalan Bahan",
                    "Tata Laksana Sertifikasi Halal Produk di Indonesia",
                    "Pengetahuan dan Wawasan tentang Pariwisata Ramah Muslim"
                ],
                'manfaat' => [
                    "Ilmu dan wawasan baru",
                    "Jejaring",
                    "Sertifikat kepesertaan"
                ],
                'persyaratan' => [
                    "Memahami konsep Halal dan Haram dalam Syariat Islam",
                    "Mengetahui tujuan kebijakan dan regulasi UU JPH yang berlaku di Indonesia",
                    "Memahami tatacara mendapatkan sertifikasi halal (untuk Pelaku Usaha)",
                    "Peningkatan awareness tentang Halal Lifestyle (Gaya Hidup Halal) dan menerapkannya dalam keseharian",
                    "Bijak dalam memilih produk untuk dikonsumsi atau digunakan"
                ],
                'alur_proses' => [
                    // 'Pendaftaran',
                    // 'Seleksi peserta',
                    // 'Mulai perkuliahan',
                    // 'Ujian akhir',
                    // 'Penerbitan ijazah',
                ],
                'gambar_banner' => 'program-layanan/kuliah-halal-banner.jpg'
            ],
            [
                'nama_program' => 'Juleha Kurban',
                'nama_banner' => 'Pelatihan Juru Sembelih Halal (JULEHA) Kurban',
                'slug' => 'pelatihan-juleha-kurban',
                'deskripsi' => 'Pelatihan tata cara penyembelihan hewan kurban sesuai syariat Islam dan kesehatan hewan.',
                'deskripsi_lengkap' => '<p>Pelatihan Juru Sembelih Halal (JULEHA) Kurban dilatarbelakangi oleh masih maraknya ditemukannya fenomena tata cara penyembelihan yang salah yang dilakukan oleh para Juru Sembelih hewan ruminansia (sapi, kambing, domba, dan sejenisnya). Padahal, tata cara penyembelihan yang sesuai syariat Islam adalah tolok ukur sekaligus penentu awal kehalalan produk ini. Selain itu, konsumennya adalah mayoritas masyarakat muslim yang tinggal di sekitar lingkungan masjid tempat diselenggarakannya penyembelihan dan pemotongan hewan kurban.</p>

                <p>Oleh karena itu, pelatihan Juru Sembelih Halal (JULEHA) Kurban di Masjid Salman ITB dirancang sebagai inisiatif edukasi yang bertujuan untuk memberikan wawasan dan peningkatan skill kepada para Takmir Masjid dan para Juru Sembelih tentang tata cara penyembelihan Kurban yang sesuai dengan syariat Islam dan Ilmu Kesehatan Masyarakat Veteriner (KESMAVET).</p>

                <p>Pelaksanaan pelatihan ini berbentuk Workshop yang dilaksanakan selama satu hari yang terbagi dalam 2 sesi. Sesi pertama akan diberikan pemaparan teori/pematerian Syariah oleh Asatidz Bidang Dakwah Masjid Salman ITB, serta narasumber Tenaga Ahli di bidang KESMAVET. Kemudian sesi kedua akan dilakukan praktik penyembelihan di luar ruangan. Pelatihan ini tidak dipungut biaya, dan para peserta diberi sertifikat (non-keprofesian) sebagai bukti bahwa ia telah menerima edukasi penyembelihan halal oleh Masjid Salman ITB.</p>

                <p>&nbsp;</p>
',
                'tipe_kelas' => 'offline',
                'durasi' => '1 hari',
                'materi' => [
                    "Fiqh Udhiyah (Tatacara penyembelihan hewan sesuai syariat Islam)",
                    "Pengetahuan dan wawasan tentang kesehatan hewan sembelihan",
                    "Tata cara memperlakukan hewan sembelihan",
                    "Teknis penyembelihan hewan kurban",
                    "Tata cara memperlakukan daging hasil sembelihan untuk didistribusikan",
                    "Konsep Kurban Ramah Lingkungan"
                ],
                'manfaat' => [

                    "Ilmu dan wawasan baru",
                    "Keterampilan kemampuan",
                    "Jejaring",
                    "Sertifikat kepesertaan"
                ],
                'persyaratan' => [
                    "Memahami dan menerapkan Fiqh Udhiyah serta wawasan kesehatan hewan dalam teknis penyembelihan",
                    "Keterampilan yang baik dalam menyembelih hewan kurban",
                    "Memahami dan menerapkan konsep Kurban Ramah Lingkungan di masing-masing tempat penyembelihan"
                ],
                'alur_proses' => [
                    // 'Pendaftaran',
                    // 'Teori dan praktik penyembelihan',
                    // 'Evaluasi pelatihan',
                    // 'Penerbitan sertifikat',
                ],
                'gambar_banner' => 'program-layanan/juleha-kurban-banner.jpg'
            ],
            [
                'nama_program' => 'Juleha Unggas',
                'nama_banner' => 'Pelatihan Juru Sembelih Halal (JULEHA) Unggas',
                'slug' => 'pelatihan-juleha-unggas',
                'deskripsi' => 'Pelatihan tata cara penyembelihan unggas sesuai syariat Islam dan kesehatan unggas.',
                'deskripsi_lengkap' => '<p>Pelatihan Juru Sembelih Halal (JULEHA) Unggas dilatarbelakangi oleh masih maraknya ditemukannya fenomena tata cara penyembelihan unggas yang salah yang dilakukan oleh pedagang unggas atau ayam potong di pasar-pasar tradisional di Kota Bandung. Padahal, tata cara penyembelihan yang sesuai syariat Islam adalah tolok ukur sekaligus penentu awal kehalalan produk ini. Selain itu, pembeli dari produk mereka adalah mayoritas keluarga muslim maupun pemilik usaha rumah makan yang harus diberikan jaminan tentang kehalalan produk yang mereka beli.</p>

                <p>Oleh karena itu, pelatihan Juru Sembelih Halal (JULEHA) Unggas di Masjid Salman ITB dirancang sebagai inisiatif edukasi yang bertujuan untuk memberikan wawasan dan peningkatan skill kepada para pedagang unggas dan ayam potong di pasar-pasar tradisional di Kota Bandung tentang tata cara penyembelihan unggas yang sesuai dengan syariat Islam dan Ilmu Kesehatan Masyarakat Veteriner (KESMAVET).</p>

                <p>Penyelenggaraan pelatihan ini berbentuk Workshop yang dilaksanakan selama satu hari yang terbagi dalam 2 sesi. Sesi pertama akan diberikan pemaparan teori/pematerian Syariah oleh Asatidz Bidang Dakwah Masjid Salman ITB, serta narasumber Tenaga Ahli di bidang KESMAVET (Dosen/Pegawai Dinas Ketahanan Pangan dan Pertanian). Kemudian sesi kedua akan dilakukan praktik penyembelihan di luar ruangan. Pelatihan ini tidak dipungut biaya, dan para peserta diberi sertifikat (non-keprofesian) sebagai bukti bahwa ia telah menerima edukasi penyembelihan halal oleh Masjid Salman ITB.</p>
',
                'tipe_kelas' => 'offline',
                'durasi' => '1 hari',
                'materi' => [
                    "Fiqh Udhiyah (Tatacara penyembelihan sesuai syariat Islam)",
                    "Pengetahuan dan wawasan tentang kesehatan unggas",
                    "Tata cara memperlakukan unggas sembelihan",
                    "Teknis penyembelihan hewan unggas",
                    "Tata cara memperlakukan daging unggas sembelihan"
                ],
                'manfaat' => [
                    "Ilmu dan wawasan baru",
                    "Keterampilan kemampuan",
                    "Jejaring",
                    "Sertifikat kepesertaan"
                ],
                'persyaratan' => [
                    "Memahami dan menerapkan Fiqh Udhiyah serta wawasan kesehatan hewan dalam teknis penyembelihan",
                    "Keterampilan yang baik dalam menyembelih hewan unggas"
                ],
                'alur_proses' => [
                    // 'Pendaftaran',
                    // 'Teori dan praktik penyembelihan',
                    // 'Evaluasi pelatihan',
                    // 'Penerbitan sertifikat',
                ],
                'gambar_banner' => 'program-layanan/juleha-unggas-banner.jpg'
            ],
            [
                'nama_program' => 'P3H',
                'nama_banner' => 'Pelatihan Pendamping Proses Produk Halal (P3H)',
                'slug' => 'pelatihan-p3h',
                'deskripsi' => 'Pelatihan untuk mencetak tenaga pendamping sertifikasi halal bagi UMKM.',
                'deskripsi_lengkap' => '<p>Pelatihan Pendamping Proses Produk Halal (P3H) adalah program pelatihan yang bertujuan untuk mencetak tenaga pendamping yang memiliki kemampuan dan keahlian khusus dalam mendampingi pelaku usaha, terutama usaha mikro, kecil, dan menengah (UMKM), untuk memenuhi persyaratan sertifikasi halal sesuai dengan regulasi di Indonesia. Pendamping P3H berperan penting dalam mendukung proses percepatan sertifikasi halal yang dikelola oleh Badan Penyelenggara Jaminan Produk Halal (BPJPH) Republik Indonesia.</p>
',
                'tipe_kelas' => 'offline',
                'durasi' => '3 hari',
                'materi' => [
                    "Ketentuan Syariat Islam terkait Jaminan Produk Halal",
                    "Kebijakan dan regulasi pemerintah terkait implementasi Sistem Jaminan Produk Halal",
                    "Pengetahuan bahan tentang Proses Produk Halal (PPH)",
                    "Teknis Pelaksanaan Pendampingan Sertifikasi Halal dan Etika Pendampingan"
                ],
                'manfaat' => [
                    "Ilmu dan wawasan baru",
                    "Kompetensi keahlian",
                    "Jejaring",
                    "Sertifikat pelatihan resmi"
                ],
                'persyaratan' => [
                    "Memahami regulasi dan prosedur sertifikasi halal di Indonesia",
                    "Meningkatkan kemampuan teknis dalam mengidentifikasi bahan, proses produksi, dan dokumentasi yang sesuai dengan syariat Islam",
                    "Membantu pelaku usaha dalam menyiapkan dokumen dan proses sertifikasi halal dengan cara yang mudah dan terjangkau",
                    "Memperluas jaringan pendamping halal untuk mendukung percepatan target Indonesia sebagai pusat industri halal dunia"
                ],
                'alur_proses' => [
                    // 'Pendaftaran',
                    // 'Pelatihan teori dan praktik',
                    // 'Evaluasi peserta',
                    // 'Penerbitan sertifikat resmi',
                ],
                'gambar_banner' => 'program-layanan/p3h-banner.jpg'
            ],
            [
                'nama_program' => 'Sertifikasi',
                'nama_banner' => 'Sertifikasi Halal Salman ITB',
                'slug' => 'sertifikasi-halal',
                'deskripsi' => 'Layanan Pendampingan Sertifikasi Halal untuk UMKM',
                'deskripsi_lengkap' => '<p>Sertifikasi Halal adalah proses pemeriksaan dan pemberian sertifikat oleh lembaga berwenang yang menyatakan bahwa suatu produk memenuhi standar kehalalan berdasarkan syariat Islam. Sertifikasi ini mencakup bahan baku, proses produksi, hingga produk akhir, untuk memastikan bahwa produk tersebut dapat dikonsumsi atau digunakan oleh umat Islam tanpa ragu.</p>

                <p>Seiring dengan pertumbuhan populasi Muslim dunia dan meningkatnya permintaan produk halal global, sertifikasi halal menjadi faktor penting dalam industri pangan, kosmetik, farmasi, dan barang konsumen lainnya. Di Indonesia, kewajiban sertifikasi halal bertujuan untuk melindungi konsumen dan meningkatkan daya saing produk lokal di pasar global.</p>',
                'tipe_kelas' => 'offline',
                'durasi' => 'anytime',
                'materi' => [],
                'manfaat' => [
                    "Kepercayaan Konsumen: Sertifikat halal memberikan jaminan kepada konsumen Muslim bahwa produk aman dikonsumsi sesuai dengan syariat.",
                    "Daya Saing: Membuka peluang lebih besar untuk menembus pasar domestik maupun internasional, khususnya negara-negara dengan mayoritas Muslim.",
                    "Legalitas: Memenuhi kewajiban hukum, terutama sejak diberlakukannya UU No. 33 Tahun 2014 tentang Jaminan Produk Halal di Indonesia.",
                    "Keunggulan Pasar: Produk bersertifikat halal cenderung lebih diminati, bahkan oleh non-Muslim, karena identik dengan kualitas dan kebersihan."

                ],
                'persyaratan' => [],
                'alur_proses' => [
                    // 'Pendaftaran',
                    // 'Pelatihan teori dan praktik',
                    // 'Evaluasi peserta',
                    // 'Penerbitan sertifikat resmi',
                ],
                'gambar_banner' => 'program-layanan/p3h-banner.jpg'
            ],





            // SubSertifikasi

            [
                'nama_program' => 'Jalur Reguler',
                'nama_banner' => 'Sertifikasi Halal Jalur Reguler',
                'slug' => 'sertifikasi-halal-reguler',
                'deskripsi' => 'Jalur sertifikasi standar melalui Lembaga Pemeriksa Halal (LPH) Salman ITB.',
                'deskripsi_lengkap' => '<p>Sertifikasi Halal Jalur Reguler adalah proses sertifikasi halal yang melalui mekanisme standar, mencakup pemeriksaan bahan, proses produksi, hingga audit lapangan oleh Lembaga Pemeriksa Halal (LPH) dan persetujuan kehalalan oleh Majelis Ulama Indonesia (MUI). Jalur ini digunakan untuk semua jenis usaha, baik usaha besar, menengah, maupun kecil yang produknya tidak memenuhi kriteria untuk jalur self declare. Jalur reguler merupakan pilihan utama untuk produk yang kompleks atau memerlukan tingkat verifikasi lebih tinggi, mendukung transparansi dan standar kehalalan yang kuat bagi masyarakat luas.</p>',
                'tipe_kelas' => 'offline',
                'durasi' => 'anytime',
                'status' => 'nonaktif',
                'materi' => [
                    // Syarat Singkat
                    "Memiliki NIB",
                    "Dokumen legalitas usaha",
                    "Data produk lengkap"
                ],
                'manfaat' => [
                    // Manfaat apa saja yang didapatkan dari Sertifikasi Halal jalur Reguler?
                    "Kredibilitas Tinggi: Proses sertifikasi ini sangat terperinci dan melibatkan audit serta fatwa halal, sehingga memberikan kepercayaan lebih kepada konsumen.",
                    "Cakupan Luas: Berlaku untuk berbagai jenis produk, termasuk yang kompleks dan berisiko tinggi.",
                    "Keamanan Konsumen: Memastikan kehalalan produk secara komprehensif dari bahan hingga distribusi."


                ],
                'persyaratan' => [

                    // Syarat apa saja yang harus dipenuhi untuk mengurus Sertifikasi Halal Jalur Reguler?
                    "Merupakan pelaku UMK yang kriterianya sesuai dengan aturan.",
                    "Memiliki izin usaha, seperti Nomor Induk Berusaha (NIB). Jika belum memiliki NIB, nanti akan dibuatkan.",
                    "Memproduksi barang/jasa dengan bahan berisiko atau proses yang memerlukan validasi tambahan untuk memastikan kehalalan.",
                    "Mengisi formulir permohonan sertifikasi halal",
                    "Data perusahaan, seperti biodata perusahaan dan informasi pemilik perusahaan",
                    "Daftar produk beserta deskripsinya",
                    "Daftar bahan baku dan bahan tambahan pembuatan produk",
                    "Membuat dokumen Sistem Jaminan Produk Halal (SJPH), berisi tentang manual/panduan halal perihal kebijakan halal perusahaan, prosedur rinci tahapan pembuatan produk, dan pernyataan kebersihan dan sanitasi pembuatan produk"


                ],
                'alur_proses' => [
                    // Apa saja ciri utama Sertifikasi Halal jalur Reguler?

                    "Semua jenis usaha, termasuk usaha menengah dan besar, serta UMKM dengan produk yang memerlukan pemeriksaan lebih kompleks.",
                    "Produk yang menggunakan bahan berisiko atau proses yang memerlukan validasi tambahan untuk memastikan kehalalan.",
                    "Makanan, minuman, kosmetik, obat-obatan, barang gunaan, dan produk lainnya.",
                    "Produk dengan bahan yang tidak sepenuhnya tersertifikasi halal atau memerlukan pengujian tambahan.",
                    "Melibatkan audit lapangan oleh auditor halal dari LPH.",
                    "Proses Lebih Panjang dibandingkan jalur Self Declare, karena memerlukan waktu lebih lama karena audit dan sidang fatwa.",
                    "Biaya lebih tinggi karena melibatkan audit lapangan dan analisis laboratorium, yang dapat meningkatkan biaya sertifikasi.",
                    "Kompleksitas Prosedur, oleh karena itu pelaku usaha harus memastikan semua dokumen lengkap dan siap untuk diaudit.",
                    "Keputusan kehalalan ditetapkan melalui sidang fatwa oleh MUI.",

                ],
                'gambar_banner' => 'program-layanan/p3h-banner.jpg'
            ],




            [
                'nama_program' => 'Jalur Self Declare',
                'nama_banner' => 'Sertifikasi Halal Jalur Self Declare',
                'slug' => 'sertifikasi-halal-self-declare',
                'deskripsi' => 'Jalur sertifikasi mandiri untuk UMKM dengan kriteria tertentu sesuai regulasi BPJPH.',
                'deskripsi_lengkap' => '<p>Sertifikasi Halal Jalur Self Declare adalah mekanisme sertifikasi halal yang memungkinkan pelaku usaha, khususnya Usaha Mikro dan Kecil (UMK), untuk menyatakan sendiri bahwa produknya halal dengan memenuhi kriteria tertentu yang telah ditetapkan oleh pemerintah. Jalur ini bertujuan untuk mempermudah UMK dalam mendapatkan sertifikasi halal tanpa harus melalui prosedur audit yang kompleks, sehingga lebih cepat, murah, dan efisien.</p>
                
                <p>Sertifikasi halal jalur self declare di Indonesia diatur dalam Undang-Undang No. 33 Tahun 2014 tentang Jaminan Produk Halal dan peraturan turunannya, seperti Peraturan Pemerintah No. 39 Tahun 2021. Kebijakan ini mendukung percepatan sertifikasi halal khusus untuk UMK.</p>',
                'tipe_kelas' => 'offline',
                'durasi' => 'anytime',
                'status' => 'nonaktif',
                'materi' => [
                    // Syarat Singkat
                    "Omset maksimal 1 Miliar/tahun",
                    "Produk tidak berisiko tinggi",
                    "Memiliki NIB"
                ],
                'manfaat' => [
                    // Manfaat apa saja yang didapatkan dari Sertifikasi Halal jalur Reguler?
                    "Proses cepat dan efisien, karena tidak memerlukan audit lapangan sehingga hemat waktu.",
                    "Biaya lebih terjangkau dibanding jalur Reguler.",
                    "Seringkali peluang mendapatkan kuota fasilitasi Sertifikasi Halal gratis lebih banyak dibanding jalur Reguler",
                    "Membantu pelaku UMK meningkatkan daya saing di pasar halal, sehingga pertumbuhan UMK semakin baik",
                    "Memudahkan UMK untuk memenuhi kewajiban sertifikasi halal sesuai regulasi."

                ],
                'persyaratan' => [


                    // Syarat apa saja yang harus dipenuhi untuk mengurus Sertifikasi Halal Jalur Reguler?
                    "Merupakan pelaku UMK yang kriterianya sesuai dengan aturan.",
                    "Memiliki izin usaha, seperti Nomor Induk Berusaha (NIB). Jika belum memiliki NIB, nanti akan dibuatkan.",
                    "Memproduksi barang/jasa dengan risiko kecil terhadap kehalalan."

                ],
                'alur_proses' => [
                    // Apa saja ciri utama Sertifikasi Halal jalur Reguler?

                    "Usaha Mikro dan Kecil (UMK) dengan kategori tertentu.",
                    "Menggunakan bahan yang sudah halal atau tidak berisiko tercampur dengan bahan haram/najis.",
                    "Produk sederhana, seperti makanan/minuman rumah tangga.",
                    "Tidak melibatkan proses produksi yang kompleks.",
                    "Tidak memerlukan audit halal oleh Lembaga Pemeriksa Halal (LPH).",
                    "Deklarasi cukup didasarkan pada kejujuran pelaku usaha dan bukti pendukung."

                ],
                'gambar_banner' => 'program-layanan/p3h-banner.jpg'
            ]
        ];


        foreach ($programs as $program) {

            ProgramLayanan::create($program);
        }
    }
}
