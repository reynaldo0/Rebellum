import { temuanUmum, TemuanUmum } from "../docs/temuanUmum";
import toggleAccordion from "../func/accordion";
import Sabit from "../components/Sabit";
import Typed from 'typed.js';
import { useEffect, useRef } from "react";

const Home = () => {
    const temuanUmumList: TemuanUmum[] = temuanUmum;

    const typedElementRef = useRef<HTMLSpanElement>(null);
    useEffect(() => {
        if (typedElementRef.current) {
            const typed = new Typed(typedElementRef.current, {
                strings: ["di Indonesia"],
                typeSpeed: 60,
                backSpeed: 30,
                loop: true,
                showCursor: false,
                backDelay: 3500,
                startDelay: 1500,
            });

            return () => {
                typed.destroy();
            };
        }
    }, []);

    return (
        <section id="home" className="pt-24">
            <div className="container">
                <div className="flex w-full flex-col-reverse flex-wrap items-center justify-between gap-10 md:flex-row md:gap-0">
                    <div className="w-full px-4 md:w-1/2">
                        <h1 className="font-poppins text-2xl font-bold md:text-4xl"
                            data-aos="fade-right"
                            data-aos-duration="1400">
                            Bagaimana Kasus Kenakalan Remaja {''}
                            <span ref={typedElementRef} className="bg-yellow text-white transition-all"></span>
                            ?
                        </h1>
                        <p
                            data-aos="fade-right"
                            data-aos-duration="1600"
                            className="color py-4 font-poppins text-sm text-secondary-200 md:text-base">
                            Kenakalan remaja adalah wujud dari konflik yang tidak
                            terselesaikan dengan baik pada masa kanak-kanak maupun pada saat
                            remaja. Tingkat kenakalan remaja di Indonesia cukup tinggi. Data
                            UNICEF tahun 2016 menunjukkan bahwa kenakalan pada usia remaja di
                            Indonesia diperkirakan mencapai sekitar 50%.
                        </p>
                        <button
                            className="learn-more relative inline-block h-auto w-[300px] md:w-[450px] cursor-pointer border-none bg-transparent align-middle font-radioCasnada text-inherit outline-none"
                            onClick={() => (window.location.href = "http://127.0.0.1:8000/")}>
                            <span className="circle" aria-hidden="true">
                                <span className="icon arrow"></span>
                            </span>
                            <span className="button-text hidden md:block translate-x-2">Periksa Dirimu & Cegah Kenakalan Remaja!</span>
                            <span className="button-text text-sm -translate-y-2 md:hidden translate-x-2">Periksa Dirimu & Cegah Kenakalan Remaja!</span>
                        </button>
                    </div>
                    <div className="relative flex md:w-1/2 h-full items-center justify-center -ml-4 md:px-4">
                        <Sabit />
                    </div>
                </div>
            </div>

            {/* <!-- accordion section start --> */}
            <div id="wave">
                <img
                    src="/svg/wave.svg"
                    alt="wave"
                    className="w-full"
                    draggable="false"
                />

                <div id="temuanUmum" className="-mt-1 bg-primary-100 pb-10 pt-36">
                    <div className="container">
                        <h1
                            data-aos="fade-up"
                            data-aos-easing="ease-in-out"
                            className="text-center font-radioCasnada text-2xl font-bold text-white md:text-4xl">
                            Temuan Umum
                        </h1>

                        <div className="mt-10 w-full">
                            <div className="accordion flex flex-col">
                                {temuanUmumList.map((temuanUmum, index) => (
                                    <div
                                        key={index}
                                        className="accordion-item my-2"
                                        data-aos="fade-right"
                                        data-aos-anchor-placement="bottom-bottom"
                                        data-aos-delay="50">
                                        <button
                                            type="button"
                                            className="accordion-title flex w-full items-center justify-between rounded-t-lg bg-primary-200 px-4 py-4 text-white transition duration-300 focus:outline-none"
                                            onClick={(e) => toggleAccordion(e.currentTarget)}>
                                            <span className="text-base font-medium md:text-lg">
                                                {temuanUmum.title}
                                            </span>
                                            <svg
                                                className="plus-icon h-4 w-4 fill-current"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    className="plus"
                                                    d="M7 10V4a1 1 0 0 1 2 0v6h6a1 1 0 1 1 0 2h-6v6a1 1 0 1 1-2 0v-6H4a1 1 0 1 1 0-2h6z"
                                                />
                                            </svg>
                                            <svg
                                                className="minus-icon hidden h-4 w-4 fill-current"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    className="minus"
                                                    d="M4 9h12a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
                                                />
                                            </svg>
                                        </button>
                                        <div className="accordion-content hidden rounded-b-lg bg-primary-200 px-4 py-2 text-base text-slate-100">
                                            {temuanUmum.description}
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    );
};

export default Home;