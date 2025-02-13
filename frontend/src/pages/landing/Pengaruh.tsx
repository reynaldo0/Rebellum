import { Dampak, Solusi } from "../../components/Accordion";
import Plane from "../../components/Plane";

const Pengaruh = () => {
    return (
        <section id="pengaruh" className="relative overflow-x-hidden pt-36">
            <Plane />;
            <div className="container">
                <h1
                    data-aos="fade-up"
                    data-aos-easing="ease-in-out"
                    className="text-center text-3xl font-semibold md:text-4xl">
                    Pengaruh dari <span className="text-yellow">Kenakalan Remaja</span>
                </h1>
                <p
                    data-aos="fade-up"
                    data-aos-easing="ease-in-out"
                    data-aos-delay="100"
                    className="mx-auto mt-5 text-center text-sm text-secondary-200 md:max-w-2xl md:text-base">
                    Kenakalan remaja memiliki dampak yang luas, mempengaruhi baik individu
                    maupun lingkungan sekitarnya dengan menciptakan ketidakstabilan
                    emosional dan ketegangan sosial.
                </p>

                <div className="mt-8 flex flex-wrap justify-evenly gap-10 overflow-x-hidden pb-5">
                    <Dampak />
                    <Solusi />
                </div>
            </div>
        </section>
    );
};

export default Pengaruh;