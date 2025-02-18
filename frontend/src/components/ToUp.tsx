import IonIcon from "@reacticons/ionicons";
import { useEffect, useRef } from "react";

const ToUp = () => {
    const toUpRef = useRef<HTMLAnchorElement>(null);

    const handleScroll = () => {
        if (toUpRef.current) {
            if (window.scrollY > 500) {
                // toUpRef.current.style.transform = 'translateX(0)'
                toUpRef.current.classList.add('translate-x-0')
                toUpRef.current.classList.remove('translate-x-[100px]')
            } else {
                // toUpRef.current.style.transform = 'translateX(100px)'
                toUpRef.current.classList.add('translate-x-[100px]')
                toUpRef.current.classList.remove('translate-x-0')
            }
        }
    };

    useEffect(() => {
        window.addEventListener("scroll", handleScroll);

        return () => {
            window.removeEventListener('scroll', handleScroll);
        }
    }, [toUpRef]);

    return (
        <a
            ref={toUpRef}
            href="#konsultasi"
            className="group/up flex fixed bottom-8 right-5 items-center justify-start gap-2 z-30 cursor-pointer rounded-full bg-yellow text-xl text-white opacity-100 transition duration-500 px-4 py-4 md:py-2 animate-bounce">
            <IonIcon
                name="megaphone-outline"
                className="transition group-hover/up:-translate-y-1 text-xl animate-ping" />
            <span className="text-white hidden md:block">Lapor Kenakalan!</span>
        </a>


    );
};

export default ToUp;