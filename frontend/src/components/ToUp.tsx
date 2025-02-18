import IonIcon from "@reacticons/ionicons";
import { useState, useEffect, useRef } from "react";
import { motion } from "framer-motion";  // Importing framer-motion for animation

const ToUp = () => {
    const [showAdditionalButtons, setShowAdditionalButtons] = useState(false);
    const toUpRef = useRef<HTMLAnchorElement>(null);

    const handleScroll = () => {
        if (toUpRef.current) {
            if (window.scrollY > 500) {
                toUpRef.current.classList.add('translate-x-0');
                toUpRef.current.classList.remove('translate-x-[100px]');
            } else {
                toUpRef.current.classList.add('translate-x-[100px]');
                toUpRef.current.classList.remove('translate-x-0');
            }
        }
    };

    const handleClick = () => {
        setShowAdditionalButtons(!showAdditionalButtons);
    };

    useEffect(() => {
        window.addEventListener("scroll", handleScroll);

        return () => {
            window.removeEventListener('scroll', handleScroll);
        };
    }, []);

    return (
        <div>
            {/* Main button with + sign */}
            <a
                ref={toUpRef}
                href="#konsultasi"
                className="group/up flex fixed bottom-8 right-5 items-center justify-center gap-2 z-[999999] cursor-pointer rounded-full bg-yellow text-xl text-white opacity-100 transition duration-500 px-4 py-4 md:py-2 animate-bounce"
                onClick={handleClick}
            >
                <IonIcon
                    name="add-outline"  // Using add icon for + symbol
                    className="text-2xl"
                />
            </a>

            {/* Animate additional buttons */}
            {showAdditionalButtons && (
                <div className="fixed bottom-28 right-5 flex flex-col gap-2 z-[999999]">
                    <motion.a
                        href="#button1"
                        className="flex items-center justify-center gap-2 bg-green-500 text-white px-4 py-2 rounded-full"
                        initial={{ opacity: 0, y: 20 }}  // Start off with opacity 0 and below
                        animate={{ opacity: 1, y: 0 }}   // Animate to full opacity and original position
                        transition={{ duration: 0.5 }}   // Duration of animation
                    >
                        <IonIcon name="checkmark-outline" className="text-xl" />
                        Button 1
                    </motion.a>

                    <motion.a
                        href="#button2"
                        className="flex items-center justify-center gap-2 bg-blue-500 text-white px-4 py-2 rounded-full"
                        initial={{ opacity: 0, y: 20 }}  // Start off with opacity 0 and below
                        animate={{ opacity: 1, y: 0 }}   // Animate to full opacity and original position
                        transition={{ duration: 0.5, delay: 0.2 }}  // Delay for second button
                    >
                        <IonIcon name="arrow-forward-outline" className="text-xl" />
                        Button 2
                    </motion.a>
                </div>
            )}
        </div>
    );
};

export default ToUp;
