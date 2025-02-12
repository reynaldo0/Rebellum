import React, { useEffect } from "react";

type ElementPosition = {
    top: number;
    left: number;
    right: number;
    bottom: number;
}

const useScrollAnimation = (
    elementRef: React.RefObject<HTMLElement>,
    callback: (element: HTMLElement, elementPosition: ElementPosition) => void
) => {
    const handleScroll = () => {
        const element = elementRef.current;

        if (element) {
            const elementPosition = element.getBoundingClientRect();

            callback(element, elementPosition);
        }
    };

    useEffect(() => {
        if (elementRef.current) {
            window.addEventListener("scroll", handleScroll);

            return () => {
                window.removeEventListener("scroll", handleScroll);
            };
        }
    }, []);

    return elementRef;
};

export default useScrollAnimation;