import { useEffect, useRef } from "react";
import "swiper/css";
import Swiper from "swiper/bundle";
import { SwiperOptions } from "swiper/types";
import { kasusList } from "../../docs/kasus";
// import 'swiper/css/bundle';

const Kasus = () => {
  const carouselRef = useRef(null);
  const buttonRefs = useRef<HTMLButtonElement[]>([]);

  const swiperOptions: SwiperOptions = {
    slidesPerView: 1,
    centeredSlides: true,
  };

  const handleButtonCLick = (button: HTMLButtonElement, carousel: Swiper) => {
    const slideIndex = parseInt(button.dataset.slide as string);
    carousel.slideTo(slideIndex - 1);
  };

  useEffect(() => {
    if (carouselRef.current) {
      const carousel = new Swiper(carouselRef.current, swiperOptions);

      buttonRefs.current.forEach((button) => {
        button.onclick = () => handleButtonCLick(button, carousel);
      });
    }
  }, []);

  return (
    <section id="kasus">
      <div className="relative bg-primary-100 pt-20 md:pt-32">
        <div className="overflow-x-hidden">
          <div className="absolute -top-10 left-1/2 grid w-full -translate-x-1/2 scale-95 grid-cols-6 rounded-2xl bg-primary-300 sm:w-[80%] md:-top-16 md:w-2/3 md:max-w-screen-md md:scale-100">
            {kasusList.map((kasus, index) => (
              <button
                key={index}
                data-slide={index + 1}
                className={`swiper-btn flex flex-col items-center border-primary-200 px-2 py-1 transition-all hover:scale-110 hover:rounded-2xl hover:border-none hover:bg-yellow md:px-7 md:py-5 ${
                  index === 0
                    ? "rounded-l-2xl border-r-2"
                    : index === 5
                    ? "rounded-r-2xl"
                    : "border-r-2"
                }`}
                ref={(el) => {
                    if (el) buttonRefs.current[index] = el;
                }}
                >
                <img
                  src={kasus.button.image}
                  alt=""
                  className="h-auto w-[75px] md:w-[100px]"
                />
                <p className="font-poppins text-xs font-medium text-white md:text-base">
                  {kasus.button.label}
                </p>
              </button>
            ))}
          </div>

          <div
            className="carousel mx-auto h-min w-[95%] overflow-x-hidden rounded-3xl bg-white"
            ref={carouselRef}>
            <div className="swiper-wrapper">
              {/* Slides */}
              {kasusList.map((kasus, index) => (
                <div
                  className="swiper-slide flex w-full items-center justify-center bg-white"
                  key={index}>
                  <div className="flex h-full w-full items-center justify-center">
                    <div className="flex flex-col flex-wrap items-center gap-5 rounded-xl bg-white px-5 py-8 sm:gap-0 md:flex-row md:justify-between md:px-10">
                      <div className="w-full md:w-1/2">
                        <h1 className="mb-5 font-radioCasnada text-2xl font-semibold sm:text-3xl md:text-4xl">
                          {kasus.title}
                        </h1>
                        <p className="w-fit max-w-screen-sm text-sm text-secondary-200 md:text-base">
                          {kasus.description}
                        </p>
                      </div>
                      <div className="w-full md:w-1/2">
                        <img
                          loading="lazy"
                          src={kasus.image}
                          className="mx-auto h-full max-h-full w-auto"
                          alt={`${kasus.button.label} image`}
                        />
                      </div>
                    </div>
                  </div>
                </div>
              ))}
            </div>
            <div className="swiper-pagination"></div>
          </div>
        </div>
      </div>

      {/* wave triangle */}
      <img
        alt="wave"
        src="/svg/wave-triangle.png"
        className="m-auto -mt-1 flex h-auto w-full"
        draggable="false"
      />
    </section>
  );
};

export default Kasus;