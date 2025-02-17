import IonIcon from "@reacticons/ionicons";
import { useEffect, useRef, useState } from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/swiper-bundle.css";

const News = () => {
    interface Post {
        title: string;
        image?: string;
        date: string;
        content: string;
        category: { id: number; name: string };
    }

    const [posts, setPosts] = useState<Post[]>([]);
    const [visiblePosts, setVisiblePosts] = useState<Post[]>([]);
    const [categories, setCategories] = useState<string[]>([]);
    const [activeCategory, setActiveCategory] = useState<string | undefined>(undefined);
    
    // Create a reference to the Swiper instances for categories and posts
    const categorySwiperRef = useRef<any>(null);

    const handleCategoryPrev = () => {
        if (categorySwiperRef.current && categorySwiperRef.current.swiper) {
            categorySwiperRef.current.swiper.slidePrev();
        }
    };

    const handleCategoryNext = () => {
        if (categorySwiperRef.current && categorySwiperRef.current.swiper) {
            categorySwiperRef.current.swiper.slideNext();
        }
    };

    useEffect(() => {
        const fetchData = async () => {
            try {
                const postResponse = await fetch("http://127.0.0.1:8000/api/article");
                if (!postResponse.ok) {
                    throw new Error("Failed to fetch data");
                }
                const postData: Post[] = await postResponse.json();
                const filteredPosts = postData.filter(post => post.image && post.image.trim() !== "");
                setPosts(filteredPosts);
                setVisiblePosts(filteredPosts);
                const uniqueCategories = Array.from(new Set(filteredPosts.map(post => post.category.name)));
                setCategories(uniqueCategories);
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        };

        fetchData();
    }, []);

    const handleCategoryClick = (categoryName?: string) => {
        setActiveCategory(categoryName);
        if (!categoryName) {
            setVisiblePosts(posts);
        } else {
            setVisiblePosts(posts.filter((post) => post.category.name === categoryName));
        }
    };

    return (
        <div className="container mx-auto px-6 py-16 md:py-24">
            <h1 className="text-3xl md:text-4xl font-bold text-center mb-8 text-gray-800">
                Artikel Tentang <span className="text-yellow">Kenakalan Remaja</span>
            </h1>

            {/* Category Slider on Mobile, Static on Desktop */}
            <div className="mb-8">
                {/* Swiper for Mobile */}
                <div className="block md:hidden relative">
                    <Swiper
                        ref={categorySwiperRef} // Attach the ref to the category swiper
                        spaceBetween={10}
                        slidesPerView={2.5}
                        centeredSlides={true}
                        loop={categories.length > 2}
                    >
                        {categories.map((category) => (
                            <SwiperSlide key={category}>
                                <button
                                    onClick={() => handleCategoryClick(category)}
                                    className={`px-6 py-3 rounded-lg transition-colors duration-300 ${activeCategory === category ? "bg-yellow text-white" : "bg-gray-200 text-gray-700 hover:bg-gray-300"
                                        }`}
                                >
                                    {category}
                                </button>
                            </SwiperSlide>
                        ))}
                    </Swiper>
                    {/* Navigation Buttons */}
                    <div className="flex justify-between mt-4">
                        <button onClick={handleCategoryPrev} className="absolute -left-5 top-0 z-[999] bg-yellow text-white rounded-full p-2">
                            <IonIcon name="arrow-back" size="large" color="white" />
                        </button>
                        <button onClick={handleCategoryNext} className="absolute -right-5 top-0 z-[999] bg-yellow text-white rounded-full p-2">
                            <IonIcon name="arrow-forward" size="large" color="white" />
                        </button>
                    </div>
                </div>

                {/* Static Category List for Desktop */}
                <div className="hidden md:flex justify-center gap-6">
                    <button
                        onClick={() => handleCategoryClick(undefined)}
                        className={`px-6 py-3 rounded-lg transition-colors duration-300 ${activeCategory === undefined ? "bg-yellow text-white" : "bg-gray-200 text-gray-700 hover:bg-gray-300"
                            }`}
                    >
                        Semua
                    </button>
                    {categories.map((category) => (
                        <button
                            key={category}
                            onClick={() => handleCategoryClick(category)}
                            className={`px-6 py-3 rounded-lg transition-colors duration-300 ${activeCategory === category ? "bg-yellow text-white" : "bg-gray-200 text-gray-700 hover:bg-gray-300"
                                }`}
                        >
                            {category}
                        </button>
                    ))}
                </div>
            </div>

            {/* Posts Slider */}
            <Swiper
                spaceBetween={20}
                slidesPerView={1} // Default for mobile
                loop={visiblePosts.length > 3}
                centeredSlides={visiblePosts.length > 1}
                watchOverflow={true}
                breakpoints={{
                    640: {
                        slidesPerView: 1, // For mobile, show 1 slide
                        
                    },
                    1024: {
                        slidesPerView: 3, // For desktop, show 3 slides
                    },
                }}
            >
                {visiblePosts.map((post, index) => (
                    <SwiperSlide key={index} className="transition-transform duration-300 transform scale-90 group zoom-in">
                        <div className="bg-white shadow-lg p-6 rounded-lg hover:shadow-2xl transition-all duration-300 transform scale-100 flex flex-col justify-between h-full">
                            <span className="text-sm font-semibold text-white bg-yellow-500 px-3 py-1 rounded-full self-start mb-3">
                                {post.category.name}
                            </span>
                            {post.image && (
                                <img src={post.image} alt={post.title} className="w-full h-48 object-cover rounded-md mb-4" />
                            )}
                            <h2 className="text-xl font-semibold text-gray-800">{post.title}</h2>
                            <p className="text-sm text-gray-500">{post.date}</p>
                            <p className="text-gray-700 mt-2 flex-grow">{post.content}</p>
                        </div>
                    </SwiperSlide>
                ))}
            </Swiper>
        </div>
    );
};

export default News;
