import { useEffect, useRef } from "react";

const Plane = () => {
    const pesawatRef = useRef<HTMLImageElement | null>(null);

    useEffect(() => {
        const handleScroll = () => {
            const element = pesawatRef.current;
            if (element) {
                const positionTop = element.getBoundingClientRect().top - window.innerHeight;
                let parallaxSpeed = 2;

                if (window.innerWidth <= 768) {
                    parallaxSpeed = 0.5;
                }

                if (positionTop < 0) {
                    const parallaxShift = Math.min(Math.abs(positionTop) / 3 * parallaxSpeed, window.innerWidth / 3);
                    element.style.transform = `translateX(-${parallaxShift}px)`;
                }
            }
        };

        window.addEventListener("scroll", handleScroll);
        // Clean up event listener on component unmount
        return () => {
            window.removeEventListener("scroll", handleScroll);
        };
    }, []);
    return (
        <img
            src="/icon/pesawat.png"
            loading="eager"
            className="pesawat-parallax"
            alt="pesawat"
            ref={pesawatRef}
        />
    );
};

export default Plane;