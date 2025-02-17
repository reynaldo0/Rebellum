<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $data = [
            // tawuran
            [
                'title' => 'Tawuran di Terminal Tunjung Teja: Satu Pelajar Tewas, Dua Ditangkap',
                'description' => 'Sebuah insiden tawuran antarpelajar terjadi di Terminal Tunjung Teja, Serang, yang berakhir tragis dengan tewasnya satu pelajar dan dua lainnya ditangkap oleh pihak berwajib. Bentrokan ini diduga dipicu oleh perselisihan antar kelompok yang telah berlangsung lama dan semakin memanas melalui media sosial. Pihak kepolisian saat ini masih mendalami motif utama kejadian ini serta mengamankan sejumlah barang bukti berupa senjata tajam. Insiden ini kembali menyoroti maraknya kekerasan di kalangan pelajar dan perlunya tindakan pencegahan yang lebih tegas.',
                'category_id' => Category::tawuran->value,
                'user_id' => 1,
                'image' => 'articles/tawuran-1.jpg',
                'status' => 'approved'
            ],
            [
                'title' => 'Bentrokan Pemuda di Alor: Suasana Mencekam Dua Malam Berturut-turut',
                'description' => 'Kabupaten Alor, NTT, dilanda bentrokan antar kelompok pemuda selama dua malam berturut-turut yang menyebabkan kepanikan di kalangan warga. Ketegangan mulai terjadi setelah sebuah insiden kecil yang berujung pada aksi saling serang. Polisi dan aparat keamanan setempat dikerahkan untuk mengendalikan situasi, tetapi ketegangan masih terasa. Warga berharap ada langkah konkret dari pihak berwenang untuk mencegah bentrokan serupa di masa depan.',
                'category_id' => Category::tawuran->value,
                'user_id' => 1,
                'image' => 'articles/tawuran-2.jpeg',
                'status' => 'approved'
            ],
            [
                'title' => 'Tawuran di Penjaringan: Pemuda Tewas Dibacok Setelah Jatuh dan Ditinggal Teman',
                'description' => 'Tawuran brutal di kawasan Penjaringan, Jakarta Utara, berujung kematian seorang pemuda yang terjatuh dan langsung menjadi sasaran serangan lawan. Korban diduga terpisah dari kelompoknya, lalu diserang dengan senjata tajam hingga tewas di tempat. Rekaman CCTV yang beredar memperlihatkan detik-detik kejadian yang mengundang keprihatinan banyak pihak. Polisi kini telah mengidentifikasi beberapa pelaku dan sedang melakukan pencarian terhadap mereka.',
                'category_id' => Category::tawuran->value,
                'user_id' => 1,
                'image' => 'articles/tawuran-3.png',
                'status' => 'approved'
            ],
            [
                'title' => 'Tawuran Antar Geng di Bandung: Bagaimana Peran Media Sosial dalam Memicu Kekerasan?',
                'description' => 'Tawuran antar geng remaja di Bandung kembali pecah, dan investigasi awal menunjukkan bahwa media sosial memainkan peran besar dalam memprovokasi perkelahian ini. Para remaja terlibat dalam saling ejek dan tantangan di platform seperti Instagram dan WhatsApp sebelum akhirnya bertemu di lokasi yang telah disepakati untuk bertarung. Fenomena ini menunjukkan bagaimana teknologi dapat mempercepat eskalasi konflik di kalangan anak muda.',
                'category_id' => Category::tawuran->value,
                'user_id' => 1,
                'image' => 'articles/tawuran-4.png',
                'status' => 'approved'
            ],
            [
                'title' => 'Guru dan Orang Tua Gelisah: Tawuran Sekolah Meningkat Pasca Pandemi',
                'description' => 'Pasca pandemi COVID-19, tawuran antar pelajar mengalami lonjakan signifikan. Banyak ahli berpendapat bahwa salah satu faktor penyebabnya adalah kurangnya interaksi sosial yang sehat selama masa pembelajaran daring, sehingga banyak siswa mencari eksistensi melalui cara-cara yang salah. Guru dan orang tua kini mendesak pihak sekolah untuk lebih aktif dalam membina siswa serta memberikan bimbingan konseling yang lebih intensif.',
                'category_id' => Category::tawuran->value,
                'user_id' => 1,
                'image' => 'articles/tawuran-5.jpeg',
                'status' => 'approved'
            ],
            [
                'title' => 'Korban Salah Sasaran: Pelajar Tak Terlibat Tawuran Malah Jadi Korban Kekerasan',
                'description' => 'Seorang pelajar yang tidak terlibat dalam tawuran menjadi korban kekerasan setelah disangka sebagai bagian dari kelompok lawan. Kejadian ini menimbulkan pertanyaan besar mengenai perlindungan bagi siswa yang tidak terlibat dalam konflik, serta bagaimana langkah hukum yang bisa ditempuh untuk kasus seperti ini.',
                'category_id' => Category::tawuran->value,
                'user_id' => 1,
                'image' => 'articles/tawuran-6.jpeg',
                'status' => 'approved'
            ],

            // narkoba
            [
                'title' => 'Penggerebekan Pabrik Narkoba di Bekasi: Polisi Temukan 10 Kg Sabu Siap Edar',
                'description' => 'Polisi berhasil menggerebek sebuah rumah yang dijadikan pabrik narkoba di Bekasi dan
menemukan 10 kg sabu siap edar. Penggerebekan ini berawal dari laporan masyarakat
tentang aktivitas mencurigakan di lokasi tersebut. Dalam operasi ini, tiga tersangka berhasil
diamankan dan diduga terhubung dengan jaringan narkoba internasional. Pihak kepolisian
menegaskan akan terus menindak tegas para pelaku peredaran narkoba guna melindungi
generasi muda dari bahaya penyalahgunaan zat terlarang. ',
                'category_id' => Category::narkoba->value,
                'user_id' => 1,
                'image' => 'articles/narkoba-1.jpg',
                'status' => 'approved'
            ],
            [
                'title' => 'Mahasiswa Tertangkap Basah Mengonsumsi Ganja di Kos, Polisi Turun Tangan',
                'description' => ' Seorang mahasiswa di Yogyakarta tertangkap basah sedang mengonsumsi ganja di
kamar kosnya. Penangkapan ini terjadi setelah warga sekitar melaporkan adanya aroma
ganja yang menyengat dari kamar tersebut. Saat digeledah, polisi menemukan beberapa
bungkus ganja dan alat hisap. Pelaku mengaku mendapatkan barang tersebut dari jaringan
pemasok yang masih dalam penyelidikan. ',
                'category_id' => Category::narkoba->value,
                'user_id' => 1,
                'image' => 'articles/narkoba-2.jpg',
                'status' => 'approved'
            ],

            // Kategori Merokok
            [
                'title' => 'Jumlah Perokok Remaja di Indonesia Meningkat, WHO Beri Peringatan',
                'description' => 'Organisasi Kesehatan Dunia (WHO) mengeluarkan peringatan mengenai meningkatnya
jumlah perokok remaja di Indonesia. Studi terbaru menunjukkan bahwa hampir 20%
remaja laki-laki berusia 13-15 tahun di Indonesia sudah mencoba merokok. Faktor utama
yang menyebabkan tren ini adalah iklan rokok yang masih gencar serta pengaruh
lingkungan sosial.',
                'category_id' => Category::merokok->value,
                'user_id' => 1,
                'image' => 'articles/merokok-1.jpeg',
                'status' => 'approved'
            ],
            [
                'title' => 'Bahaya Rokok Elektrik: Studi Ungkap Kandungan Beracun yang Mengancam Kesehatan',
                'description' => 'Rokok elektrik atau vape semakin populer di kalangan anak muda, namun penelitian
terbaru mengungkap bahwa beberapa cairan vape mengandung zat beracun yang bisa
menyebabkan kerusakan paru-paru. Meskipun banyak yang menganggap vape lebih aman
daripada rokok konvensional, penelitian ini menunjukkan bahwa risiko kesehatan tetap
ada, terutama bagi pengguna jangka panjang. ',
                'category_id' => Category::merokok->value,
                'user_id' => 1,
                'image' => 'articles/merokok-2.jpg',
                'status' => 'approved'
            ],
            // Kategori Pelecehan Seksual
            [
                'title' => 'Kasus Pelecehan Seksual di Transportasi Umum Meningkat, Apa yang Bisa Dilakukan?',
                'description' => 'Laporan mengenai pelecehan seksual di transportasi umum seperti KRL dan bus
TransJakarta meningkat dalam beberapa bulan terakhir. Banyak korban yang enggan melapor
karena takut akan dampaknya, sementara pelaku sering lolos tanpa hukuman. Aktivis
perempuan mendesak pemerintah untuk memperketat pengawasan dan memperbanyak
jalur pelaporan agar korban merasa lebih aman.',
                'category_id' => Category::pelecehanSeksual->value,
                'user_id' => 1,
                'image' => 'articles/pelecehan-1.jpg',
                'status' => 'approved'
            ],
            [
                'title' => 'Kasus Guru Cabul di Sekolah: Orang Tua Diminta Lebih Waspada',
                'description' => 'Seorang guru di sekolah swasta Jakarta ditangkap karena diduga mencabuli beberapa
muridnya. Kasus ini mengundang kemarahan orang tua dan masyarakat yang menuntut
sekolah lebih ketat dalam melakukan screening terhadap tenaga pengajar. Polisi kini tengah
mengumpulkan bukti tambahan untuk menjerat pelaku dengan hukuman maksimal. ',
                'category_id' => Category::pelecehanSeksual->value,
                'user_id' => 1,
                'image' => 'articles/pelecehan-2.jpeg',
                'status' => 'approved'
            ],
            // Kategori Bullying
            [
                'title' => 'Kasus Bullying di Sekolah Meningkat: KPAI Sebut Banyak yang Tak Dilaporkan',
                'description' => 'Komisi Perlindungan Anak Indonesia (KPAI) mengungkap bahwa kasus bullying di sekolah
meningkat secara signifikan pasca pandemi. Banyak korban yang memilih diam karena takut
dikucilkan atau tidak mendapatkan perlindungan yang cukup. Para ahli mendesak pihak
sekolah untuk lebih aktif dalam menciptakan lingkungan yang aman bagi semua siswa. ',
                'category_id' => Category::bullying->value,
                'user_id' => 1,
                'image' => 'articles/bully-1.jpg',
                'status' => 'approved'
            ],
            [
                'title' => 'Video Bullying di Sekolah Viral, Pelaku Dikeluarkan dari Sekolah',
                'description' => 'Sebuah video bullying di sebuah sekolah menengah viral di media sosial,
memperlihatkan seorang siswa yang dikeroyok oleh teman-temannya di dalam kelas. Pihak
sekolah langsung mengambil tindakan dengan mengeluarkan pelaku dari sekolah serta
memberikan konseling kepada korban. Kejadian ini menjadi pengingat bagi sekolah-sekolah
lain untuk lebih memperhatikan isu perundungan di lingkungan pendidikan.',
                'category_id' => Category::bullying->value,
                'user_id' => 1,
                'image' => 'articles/bully-2.jpeg',
                'status' => 'approved'
            ],
            // Kategori Mabuk
            [
                'title' => 'Remaja Tewas Setelah Konsumsi Miras Oplosan di Pesta Ulang Tahun',
                'description' => 'Seorang remaja berusia 17 tahun tewas setelah mengonsumsi minuman keras oplosan di
sebuah pesta ulang tahun di Bogor. Korban dan beberapa temannya mengalami gejala
keracunan, namun nyawa korban tidak tertolong. Polisi kini sedang menyelidiki asal muasal
miras oplosan tersebut dan memburu para penjualnya. ',
                'category_id' => Category::mabuk->value,
                'user_id' => 1,
                'image' => 'articles/mabuk-1.jpg',
                'status' => 'approved'
            ],
            [
                'title' => 'Maraknya Konsumsi Alkohol di Kalangan Remaja: Mengapa Ini Berbahaya?',
                'description' => 'Data terbaru menunjukkan bahwa konsumsi alkohol di kalangan remaja semakin
meningkat. Banyak yang menganggap minum alkohol sebagai bagian dari gaya hidup atau
bentuk pelarian dari stres. Namun, dokter memperingatkan bahwa alkohol bisa merusak otak
remaja yang masih berkembang, meningkatkan risiko kecanduan, serta menyebabkan
berbagai masalah kesehatan jangka panjang.',
                'category_id' => Category::mabuk->value,
                'user_id' => 1,
                'image' => 'articles/mabuk-2.jpg',
                'status' => 'approved'
            ],


            // pending

            [
                'title' => 'Dampak Jangka Panjang Bullying: Studi Ungkap Risiko Gangguan Mental',
                'description' => ' Studi terbaru menunjukkan bahwa korban bullying berisiko lebih tinggi mengalami
                gangguan kecemasan, depresi, dan PTSD di masa dewasa. Para ahli menekankan pentingnya
                intervensi dini dan dukungan psikologis bagi korban bullying. ',
                'category_id' => Category::bullying->value,
                'user_id' => 1,
                'image' => 'articles/bully-3.jpg',
                'status' => 'pending'
            ],
            [
                'title' => 'Siswa Jadi Korban Cyberbullying, Sekolah Wajibkan Edukasi Digital',
                'description' => 'Sebuah kasus cyberbullying yang menimpa siswa sekolah menengah membuat sekolah setempat menerapkan program edukasi digital wajib untuk seluruh siswa dan orang tua. Tujuannya adalah meningkatkan kesadaran tentang dampak bullying di dunia maya.',
                'category_id' => Category::bullying->value,
                'user_id' => 1,
                'image' => 'articles/bully-4.jpg',
                'status' => 'pending'
            ],
            [
                'title' => 'Pelaku Bullying Dihukum Wajib Mengikuti Program Rehabilitasi Mental',
                'description' => 'Sebagai langkah baru dalam menangani kasus bullying, sebuah sekolah di Jakarta mulai menerapkan hukuman berupa program rehabilitasi mental bagi pelaku bullying, bukan hanya sanksi akademik. Program ini bertujuan untuk mencegah perilaku agresif di masa depan.',
                'category_id' => Category::bullying->value,
                'user_id' => 1,
                'image' => 'articles/bully-5.jpeg',
                'status' => 'pending'
            ],
            [
                'title' => 'Orangtua Diminta Lebih Waspada terhadap Tanda-tanda Anak Jadi Korban Bullying',
                'description' => 'Para ahli menyarankan orang tua untuk lebih memperhatikan perubahan perilaku anak, seperti penurunan prestasi akademik, menarik diri dari lingkungan sosial, atau sering sakit tanpa alasan yang jelas, karena bisa jadi itu tanda mereka menjadi korban bullying.',
                'category_id' => Category::bullying->value,
                'user_id' => 1,
                'image' => 'articles/bully-6.jpg',
                'status' => 'pending'
            ],
        ];

        foreach ($data as $article) {
            Article::create($article);
        }
    }
}

enum Category: int
{
    case bullying = 1;
    case merokok = 2;
    case mabuk = 3;
    case narkoba = 4;
    case pelecehanSeksual = 5;
    case tawuran = 6;
}
