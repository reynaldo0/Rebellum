<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'content' => "Insiden tawuran yang berujung kematian ini menunjukkan betapa
                pentingnya interaksi yang sehat antara pelajar. Pihak sekolah dan orang tua harus
                berperan lebih aktif dalam mencegah terjadinya kekerasan.",
                'commentable_id' => 1,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Media sosial sepertinya berperan besar dalam memicu konflik di
kalangan pelajar. Kita perlu menekankan pentingnya pendidikan karakter dan
pemanfaatan media sosial yang bijak.",
                'commentable_id' => 1,
                'commentable_type' => 'App\Models\Article',
            ],

            [
                'content' => "Bentrokan yang melibatkan pemuda ini menambah daftar kekerasan
yang harus segera ditangani. Aparat keamanan harus lebih aktif dalam mencegah
terjadinya bentrokan serupa.",
                'commentable_id' => 2,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Pihak berwenang seharusnya juga memberikan perhatian lebih
terhadap pencegahan eskalasi kekerasan antar pemuda, dengan lebih banyak
program edukasi di tingkat komunitas.",
                'commentable_id' => 2,
                'commentable_type' => 'App\Models\Article',
            ],

            [
                'content' => "Penyelidikan terhadap para pelaku harus dilakukan dengan serius.
Namun, tindakan preventif melalui bimbingan dan mediasi lebih penting agar
kejadian serupa bisa diminimalisir.",
                'commentable_id' => 3,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Kejadian tragis ini mengingatkan kita bahwa tawuran seringkali
berakhir dengan kerugian besar. Pendidikan damai di sekolah dan masyarakat harus
ditingkatkan.",
                'commentable_id' => 3,
                'commentable_type' => 'App\Models\Article',
            ],

            [
                'content' => "Media sosial bisa memperburuk konflik yang ada. Kita perlu melibatkan generasi muda dalam diskusi terbuka tentang dampak buruk media sosial terhadap interaksi sosial.",
                'commentable_id' => 4,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Selain media sosial, faktor pengaruh teman sebaya juga sangat besar. Program pendidikan dan bimbingan karakter sangat penting agar mereka tidak mudah terprovokasi.",
                'commentable_id' => 4,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Peningkatan tawuran antar pelajar pasca-pandemi menunjukkan perlunya interaksi sosial yang lebih sehat. Sekolah harus memberi perhatian khusus pada pembinaan mental dan sosial siswa.",
                'commentable_id' => 5,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Selain bimbingan dari guru, orang tua juga harus lebih aktif dalam memantau aktivitas anak-anak di luar sekolah untuk mencegah mereka terlibat dalam kekerasan.",
                'commentable_id' => 5,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Perlindungan terhadap pelajar yang tidak terlibat dalam tawuran harus menjadi prioritas. Pembinaan siswa untuk lebih peduli terhadap sesama sangat penting agar kejadian seperti ini bisa dihindari.",
                'commentable_id' => 6,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Kasus ini harus mendorong pihak sekolah untuk lebih tegas dalam menindak kekerasan, serta lebih memperhatikan keamanan para siswa.",
                'commentable_id' => 6,
                'commentable_type' => 'App\Models\Article',
            ],

            [
                'content' => "Penting untuk meningkatkan pengawasan apartemen mewah dan daerah yang sering disalahgunakan sebagai tempat peredaran narkoba. Harus ada kerja sama lebih intens antara aparat dan warga sekitar untuk menghindari kejadian serupa.",
                'commentable_id' => 7,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Penindakan tegas seperti ini harus didukung oleh program rehabilitasi bagi para pelaku dan pencegahan yang lebih gencar, terutama di kalangan generasi muda yang rentan.",
                'commentable_id' => 7,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Peringatan dari WHO ini harus menjadi perhatian serius, terutama bagi orang tua dan sekolah. Edukasi tentang bahaya narkoba sejak dini bisa mengurangi angka penyalahgunaan di kalangan remaja.",
                'commentable_id' => 8,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Selain kontrol ketat terhadap peredaran narkoba, pemerintah harus meningkatkan kampanye penyuluhan yang melibatkan influencer dan tokoh muda agar lebih efektif menjangkau remaja.",
                'commentable_id' => 8,
                'commentable_type' => 'App\Models\Article',
            ],

            [
                'content' => "Peran iklan rokok memang sangat kuat, terutama di kalangan remaja. Mungkin sudah saatnya pemerintah mengatur iklan rokok dengan lebih ketat, bahkan melarangnya di media sosial.",
                'commentable_id' => 9,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Pendidikan kesehatan yang lebih komprehensif di sekolah bisa menjadi solusi terbaik. Remaja harus lebih disadarkan tentang bahaya jangka panjang dari merokok.",
                'commentable_id' => 9,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Meskipun banyak yang menganggap rokok elektrik lebih aman, hasil studi ini membuktikan bahwa itu bukan pilihan yang sehat. Edukasi tentang bahaya vape harus lebih digencarkan.",
                'commentable_id' => 10,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Penting untuk melibatkan komunitas kesehatan dalam kampanye menanggulangi penggunaan vape, terutama di kalangan anak muda yang menganggapnya sebagai alternatif yang lebih aman.",
                'commentable_id' => 10,
                'commentable_type' => 'App\Models\Article',
            ],

            [
                'content' => "Penting bagi korban pelecehan seksual untuk merasa aman melapor. Harus ada lebih banyak kamera pengawas dan sistem pelaporan anonim yang lebih mudah diakses di transportasi umum.",
                'commentable_id' => 11,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Perlu ada pendidikan kepada masyarakat untuk tidak hanya melaporkan pelecehan, tetapi juga mendukung korban untuk memberikan kesaksian tanpa rasa takut.",
                'commentable_id' => 11,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Penting bagi orang tua untuk lebih selektif dalam memilih sekolah untuk anak-anak mereka. Pemeriksaan latar belakang tenaga pendidik harus diperketat untuk mencegah kejadian serupa.",
                'commentable_id' => 12,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Sekolah juga perlu lebih serius dalam memberikan edukasi kepada siswa dan melibatkan orang tua dalam memantau interaksi antara guru dan murid.",
                'commentable_id' => 12,
                'commentable_type' => 'App\Models\Article',
            ],

            [
                'content' => "Sangat penting untuk menciptakan lingkungan yang lebih aman bagi siswa di sekolah. Program anti-bullying harus diperkenalkan lebih intensif di sekolah-sekolah.",
                'commentable_id' => 13,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Orang tua juga perlu lebih peka terhadap perubahan perilaku anak-anak mereka dan memberikan dukungan saat mereka menjadi korban bullying.",
                'commentable_id' => 13,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Kasus bullying yang viral di media sosial ini mengingatkan kita akan pentingnya kontrol yang lebih ketat terhadap penggunaan media sosial oleh pelajar.",
                'commentable_id' => 14,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Sekolah harus mengambil tindakan lebih tegas untuk memberikan efek jera bagi pelaku bullying dan menunjukkan bahwa tindakan tersebut tidak bisa ditoleransi.",
                'commentable_id' => 14,
                'commentable_type' => 'App\Models\Article',
            ],

            [
                'content' => "Kejadian ini mengingatkan kita betapa bahayanya mengonsumsi miras oplosan, yang bisa berakibat fatal. Peran orang tua dan sekolah sangat penting untuk memberikan pemahaman mengenai risiko miras.",
                'commentable_id' => 15,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Polisi harus serius menangani peredaran miras oplosan, dan lebih banyak edukasi harus diberikan kepada remaja untuk menghindari kebiasaan tersebut.",
                'commentable_id' => 15,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Peningkatan konsumsi alkohol di kalangan remaja sangat mengkhawatirkan. Alkohol bisa merusak perkembangan otak remaja dan memengaruhi kesehatan mental mereka.",
                'commentable_id' => 16,
                'commentable_type' => 'App\Models\Article',
            ],
            [
                'content' => "Pendidikan yang lebih intensif tentang bahaya alkohol sangat penting untuk menanamkan kesadaran sejak dini kepada remaja.",
                'commentable_id' => 16,
                'commentable_type' => 'App\Models\Article',
            ],


        ];

        foreach ($data as $comment) {
            Comment::create($comment);
        }
    }
}
