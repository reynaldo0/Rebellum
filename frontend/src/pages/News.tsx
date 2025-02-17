import IonIcon from "@reacticons/ionicons";
import { useState, useRef } from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/swiper-bundle.css";

const categories = [
    "Tawuran",
    "Narkoba",
    "Merokok",
    "Seksual",
    "Bullying",
    "Mabuk"
];

const posts = [
    {
        category: "Bullying",
        title: "Dampak Buruk Bullying pada Remaja",
        date: "February 17, 2025",
        content: "Bullying dapat menyebabkan trauma psikologis dan menurunkan kepercayaan diri remaja.",
        image: "/carousel/bullying.png"
    },
    {
        category: "Bullying",
        title: "Bahaya Narkoba bagi Remaja",
        date: "February 17, 2025",
        content: "Penggunaan narkoba di kalangan remaja semakin meningkat dan berdampak buruk pada kesehatan.",
        image: "/carousel/bullying.png"
    },
    {
        category: "Mabok",
        title: "Dampak Pergaulan Bebas terhadap Masa Depan Remaja",
        date: "February 17, 2025",
        content: "Pergaulan bebas dapat mengarah pada tindakan yang berisiko dan menghambat masa depan remaja.",
        image: "/carousel/bullying.png"
    },
    {
        category: "Mabok",
        title: "Kenapa Kekerasan di Kalangan Remaja Meningkat?",
        date: "February 17, 2025",
        content: "Kekerasan antar remaja sering terjadi akibat tekanan lingkungan dan kurangnya kontrol emosi.",
        image: "kekerasan.jpg"
    },
    {
        category: "Bullying",
        title: "Kenakalan Remaja di Sekolah dan Cara Mengatasinya",
        date: "February 17, 2025",
        content: "Tawuran dan bolos sekolah menjadi masalah besar dalam dunia pendidikan saat ini.",
        image: "/carousel/bullying.png"
    },
    {
        category: "Bullying",
        title: "Kenakalan Remaja di Sekolah dan Cara Mengatasinya",
        date: "February 17, 2025",
        content: "Tawuran dan bolos sekolah menjadi masalah besar dalam dunia pendidikan saat ini.",
        image: "/carousel/bullying.png"
    },
    {
        category: "Mabok",
        title: "Maraknya Cyberbullying di Kalangan Remaja",
        date: "February 17, 2025",
        content: "Cyberbullying di media sosial semakin marak dan berdampak negatif pada kesehatan mental remaja.",
        image: "cyberbullying.jpg"
    }
];

const BlogPage = () => {
    const [visiblePosts, setVisiblePosts] = useState(posts);
    const swiperRef = useRef<any>(null);

    const handlePrev = () => {
        if (swiperRef.current && swiperRef.current.swiper) {
            swiperRef.current.swiper.slidePrev();
        }
    };

    const handleNext = () => {
        if (swiperRef.current && swiperRef.current.swiper) {
            swiperRef.current.swiper.slideNext();
        }
    };

    return (
        <div className="container mx-auto px-6 py-16 md:py-24">
            <h1 className="text-3xl md:text-4xl font-bold text-center mb-8 text-gray-800">Artikel Tentang 
                <span className="text-yellow"> Kenakalan Remaja</span>
            </h1>

            {/* Category Slider on Mobile, Static on Desktop */}
            <div className="mb-8">
                {/* Swiper for mobile with navigation arrows */}
                <div className="block md:hidden relative">
                    <Swiper
                        spaceBetween={10}
                        slidesPerView={2.5}  // Display 2.5 categories
                        centeredSlides={true}
                        loop={true}
                        navigation={false}  // Disable default navigation
                        breakpoints={{
                            640: {
                                slidesPerView: 2.5, // Show 2.5 categories on mobile
                            },
                        }}
                        ref={swiperRef}
                    >
                        {categories.map((category, index) => (
                            <SwiperSlide key={index}>
                                <button
                                    onClick={() => setVisiblePosts(posts.filter((post) => post.category === category))}
                                    className="px-6 py-3 bg-primary-200 text-white rounded-lg hover:bg-primary-100 focus:outline-none transition-colors duration-300"
                                >
                                    {category}
                                </button>
                            </SwiperSlide>
                        ))}
                    </Swiper>
                    {/* Navigation Buttons */}
                    <div className="flex justify-between mt-4">
                        <button onClick={handlePrev} className="absolute -left-5 top-0 z-[999] bg-white text-black rounded-full p-2">
                            <IonIcon name="arrow-back" size="large" color="white" />
                        </button>
                        <button onClick={handleNext} className="absolute -right-5 top-0 z-[999] bg-white text-black rounded-full p-2">
                            <IonIcon name="arrow-forward" size="large" color="white" />
                        </button>
                    </div>
                </div>

                {/* Static Category List on Desktop */}
                <div className="hidden md:flex justify-center gap-6">
                    {categories.map((category) => (
                        <button
                            key={category}
                            onClick={() => setVisiblePosts(posts.filter((post) => post.category === category))}
                            className="px-6 py-3 bg-primary-200 text-white rounded-lg hover:bg-primary-100 focus:outline-none transition-colors duration-300"
                        >
                            {category}
                        </button>
                    ))}
                </div>
            </div>

            {/* Posts Slider with Zoom-In Animation */}
            <Swiper
                spaceBetween={20}
                slidesPerView={1}
                loop={true}
                centeredSlides={true}
                breakpoints={{
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                }}
                className="posts-slider"
            >
                {visiblePosts.slice(0, 6).map((post, index) => (
                    <SwiperSlide key={index} className="transition-transform duration-300 transform scale-90 group zoom-in">
                        <div className="bg-white shadow-lg p-6 rounded-lg hover:shadow-2xl transition-all duration-300 transform scale-100">
                            <img src={post.image} alt={post.title} className="w-full h-48 object-cover rounded-md" />
                            <h2 className="text-xl font-semibold mt-4 text-gray-800">{post.title}</h2>
                            <p className="text-sm text-gray-500">{post.date}</p>
                            <p className="text-gray-700 mt-2">{post.content}</p>
                        </div>
                    </SwiperSlide>
                ))}
            </Swiper>
        </div>
    );
};

export default BlogPage;
