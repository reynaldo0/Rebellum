import { Swiper, SwiperSlide } from "swiper/react";
import { Autoplay, EffectCoverflow } from "swiper/modules";
import "swiper/swiper-bundle.css";
import { useEffect, useState } from "react";

const Berita = () => {
    const [isMobile, setIsMobile] = useState(false);
    const [activeIndex, setActiveIndex] = useState(0);

    useEffect(() => {
        const handleResize = () => {
            setIsMobile(window.innerWidth < 768);
        };

        handleResize(); // Jalankan sekali saat komponen dimuat
        window.addEventListener("resize", handleResize);

        return () => window.removeEventListener("resize", handleResize);
    }, []);

    // Daftar gambar berdasarkan slide yang aktif
    const images = [
        "/carousel/bullying.png",
        "/carousel/miras.png",
        "/carousel/narkoba.png",
        "/carousel/rokok.png",
        "/carousel/seksual.png",
    ];

    return (
        <section
            id="berita"
            className="md:bg-[url('/background/wave.png')] bg-cover max-w-screen-4xl"
        >
            <div className="container">
                <div className="flex flex-col-reverse md:flex-row h-[100vh] items-center justify-center gap-10">
                    {/* Swiper Section */}
                    <div
                        className="w-full md:w-1/2"
                        data-aos="fade-up"
                        data-aos-easing="ease-in-out"
                        data-aos-duration="700"
                    >
                        <Swiper
                            spaceBetween={16}
                            direction={isMobile ? "horizontal" : "vertical"}
                            effect={"coverflow"}
                            coverflowEffect={{
                                slideShadows: false,
                                rotate: 0,
                                stretch: -20,
                                depth: 100,
                                modifier: 2.5,
                            }}
                            centeredSlides={false}
                            slidesPerView={isMobile ? 1 : 3}
                            modules={[EffectCoverflow, Autoplay]}
                            autoplay={{ delay: 3500 }}
                            loop
                            className="h-[400px]"
                            onSlideChange={(swiper) => setActiveIndex(swiper.realIndex)}
                        >
                            <SwiperSlide>
                                <div className="bg-white p-4 border-r-8 shadow-md border-yellow">
                                    <h1 className="font-semibold mb-2">
                                        Kasih Sayang Konsisten
                                    </h1>
                                    <p className="text-tertiary">
                                        Kasih sayang melalui pelukan dan kata-kata lembut membantu
                                        bayi merasa aman dan dicintai, memperkuat ikatan emosional
                                        dan kepercayaan.
                                    </p>
                                </div>
                            </SwiperSlide>

                            <SwiperSlide>
                                <div className="bg-white p-4 border-r-8 shadow-md border-yellow">
                                    <h1 className="font-semibold mb-2">
                                        Stimulasi Lingkungan Positif
                                    </h1>
                                    <p className="text-tertiary">
                                        Lingkungan yang penuh mainan edukatif dan warna cerah
                                        merangsang perkembangan otak bayi dan mendukung
                                        pembelajaran awal mereka.
                                    </p>
                                </div>
                            </SwiperSlide>

                            <SwiperSlide>
                                <div className="bg-white p-4 border-r-8 shadow-md border-yellow">
                                    <h1 className="font-semibold mb-2">
                                        Waktu Bermain Berkualitas
                                    </h1>
                                    <p className="text-tertiary">
                                        Bermain bersama bayi mengembangkan kemampuan sosial dan
                                        emosional serta memperkuat hubungan orang tua-anak.
                                    </p>
                                </div>
                            </SwiperSlide>

                            <SwiperSlide>
                                <div className="bg-white p-4 border-r-8 shadow-md border-yellow">
                                    <h1 className="font-semibold mb-2">
                                        Respon Cepat Terhadap Kebutuhan
                                    </h1>
                                    <p className="text-tertiary">
                                        Merespon cepat terhadap tangisan bayi membuat mereka
                                        merasa aman dan dipahami, mendukung perkembangan emosional
                                        yang baik.
                                    </p>
                                </div>
                            </SwiperSlide>

                            <SwiperSlide>
                                <div className="bg-white p-4 border-r-8 shadow-md border-yellow">
                                    <h1 className="font-semibold mb-2">Tempat Tidur Aman</h1>
                                    <p className="text-tertiary">
                                        Tempat tidur yang aman memberikan rasa nyaman dan
                                        mengurangi stres, memperkuat ikatan antara bayi dan orang
                                        tua.
                                    </p>
                                </div>
                            </SwiperSlide>
                        </Swiper>
                    </div>

                    {/* Text and Image Section */}
                    <div className="w-full md:w-1/2 flex flex-col items-center mt-20">
                        <div>
                            <h1
                                className="text-black font-bold text-4xl mb-4 text-center md:text-left"
                                data-aos="fade-up"
                                data-aos-easing="ease-in-out"
                                data-aos-duration="700"
                            >
                                Berita Tekini{" "}
                                <span className="text-yellow">Kenakalan Remaja</span>
                            </h1>
                        </div>
                        {/* Dynamic Image */}
                        <div className="mt-8">
                            <img
                                src={images[activeIndex]}
                                alt="Gambar terkait"
                                className="w-80 h-60 object-contain rounded-lg shadow-lg"
                                data-aos="fade-up"
                                data-aos-easing="ease-in-out"
                                data-aos-duration="800"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default Berita;
