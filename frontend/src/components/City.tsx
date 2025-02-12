import { useRef } from "react";
import useScrollAnimation from "../func/scrollAnimation";

const City = () => {
    const cityRef = useRef<HTMLImageElement>(null);

    useScrollAnimation(cityRef, (element, position) => {
        const positionTop = position.top - window.innerHeight;

        if (positionTop < 0) {
            const newPosition = Math.abs(positionTop);

            if (window.innerWidth >= 768) {
                element.style.left = `-${newPosition / 4}px`;
            }
        }
    });

    return (
        <div className="overflow-hidden pt-48">
            <img
                ref={cityRef}
                src="/icon/city2.png"
                alt="city"
                loading="lazy"
                className="city relative bottom-28 md:bottom-20 -z-10 -mt-5 scale-[2.5] md:w-full md:scale-[1.7]"
            />
        </div>
    );
};

export default City;