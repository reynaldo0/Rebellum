export interface Kasus {
    title: string;
    description: string;
    image: string;
    button: {
        label: string;
        image: string;
    };
}

export const kasusList: Kasus[] = [
    {
        title: "Membedah Tawuran Remaja",
        description: `Masyarakat merasa resah dengan fenomena tawuran remaja. Menurut KPAI, tawuran remaja marak terjadi sejak Januari hingga Juni 2022 khususnya setelah Pembelajaran Tatap Muka (PTM) dilanjutkan. Data BPS menunjukkan bahwa tawuran remaja terjadi di 0,22% desa/kelurahan di Indonesia pada 2021. Untuk mencegahnya, penting untuk meningkatkan pendidikan karakter dan kualitas hidup remaja, serta peran aktif orang tua, sekolah, dan pemerintah dalam memberikan pemahaman tentang dampak negatif tawuran.`,
        image: "/carousel/tawuran.png",
        button: {
            label: "Tawuran",
            image: "/icon/tawuran.png",
        },
    },
    {
        title: "Bersama Lawan Narkoba",
        description: `Masalah kenakalan remaja dalam bentuk penyalahgunaan narkoba menjadi perhatian serius. Menurut laporan BNN, jumlah korban penyalahgunaan narkoba di Indonesia hingga tahun 2019 mencapai angka 3,6 juta orang pengguna, dengan peningkatan sebesar 24 sampai 28 persen pada kalangan remaja. Pencegahan dapat dilakukan melalui edukasi tentang bahaya narkoba, peningkatan kualitas hidup remaja, dan rehabilitasi bagi remaja yang telah terlibat penyalahgunaan narkoba.`,
        image: "/carousel/narkoba.png",
        button: {
            label: "Narkoba",
            image: "/icon/narkoba.svg",
        },
    },
    {
        title: "Bebas dari Rokok",
        description: `Kenakalan remaja berupa merokok menjadi perhatian masyarakat. Menurut data Riset Kesehatan Dasar, 52,1% perokok di Indonesia mulai merokok pada usia 15-19 tahun. Bahkan, tingkat kecanduan rokok pada remaja di Indonesia masih tinggi dan mengalami kenaikan. Upaya pencegahan merokok pada remaja melibatkan edukasi tentang bahaya merokok, promosi gaya hidup sehat, dan peraturan ketat terkait penjualan rokok kepada remaja. Kampanye global “Commit to Quit” juga menjadi salah satu upaya yang dilakukan untuk mendorong remaja berhenti merokok`,
        image: "/carousel/rokok.png",
        button: {
            label: "Merokok",
            image: "/icon/rokok.svg",
        },
    },
    {
        title: "Menghadapi Tantangan Seksual",
        description: `Tantangan seksual yang dihadapi remaja termasuk pergaulan bebas dan perilaku seksual berisiko. Menurut data BKKBN, 57% remaja di Indonesia telah melakukan hubungan seksual sebelum menikah. Untuk mengatasi permasalahan ini, penting untuk meningkatkan pendidikan seksualitas yang komprehensif, termasuk tentang kesehatan reproduksi, batasan, dan consent. Keterlibatan orang tua, sekolah, dan komunitas juga menjadi kunci dalam memberikan pemahaman yang benar kepada remaja mengenai pentingnya menjaga perilaku seksual yang sehat dan aman.`,
        image: "/carousel/seksual.png",
        button: {
            label: "Seksual",
            image: "/icon/seksual.svg",
        },
    },
    {
        title: "Menghentikan Bullying",
        description: `Bullying menjadi masalah serius dalam kehidupan remaja. Berdasarkan data KPAI, terdapat 2.473 kasus bullying di Indonesia pada tahun 2020. Bullying dapat memberikan dampak negatif jangka panjang bagi korban, termasuk masalah kesehatan mental dan rendahnya kepercayaan diri. Pencegahan bullying memerlukan pendekatan holistik melibatkan edukasi tentang empati, regulasi emosi, peningkatan kualitas hubungan antar remaja, serta tindakan tegas terhadap pelaku bullying. Kampanye “Anti-Bullying” di berbagai sekolah juga menjadi bagian dari upaya mencegah dan menghentikan bullying.`,
        image: "/carousel/bullying.png",
        button: {
            label: "Bullying",
            image: "/icon/bully.svg",
        },
    },
    {
        title: "Lawan Mabuk Sejak Dini",
        description: `Kenakalan remaja berupa penyalahgunaan alkohol menjadi perhatian serius. Menurut data WHO, 4,3% remaja di Indonesia mengkonsumsi alkohol secara berlebihan. Penyalahgunaan alkohol dapat berdampak negatif pada kesehatan fisik dan mental remaja, serta meningkatkan risiko perilaku berbahaya. Pencegahan penyalahgunaan alkohol pada remaja melibatkan edukasi tentang bahaya alkohol, promosi gaya hidup sehat, serta pengawasan dan dukungan dari keluarga dan komunitas.`,
        image: "/carousel/miras.png",
        button: {
            label: "Mabuk",
            image: "/icon/miras.svg",
        },
    },
];