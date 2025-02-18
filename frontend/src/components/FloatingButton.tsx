import { useState, useEffect, useRef } from "react";
import IonIcon from "@reacticons/ionicons";
import { motion } from "framer-motion";

interface ToUpProps {
  setIsOpen: (value: boolean) => void;
}

const FloatingButton = ({ setIsOpen }: ToUpProps) => {
  const [showAdditionalButtons, setShowAdditionalButtons] = useState(false);
  const toUpRef = useRef<HTMLAnchorElement | null>(null);

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

  useEffect(() => {
    window.addEventListener("scroll", handleScroll);
    return () => {
      window.removeEventListener('scroll', handleScroll);
    };
  }, []);

  return (
    <div>
      <a
        ref={toUpRef}
        className="group/up flex fixed bottom-8 right-5 items-center justify-center gap-2 z-[999999] cursor-pointer rounded-full bg-yellow text-xl text-white opacity-100 transition duration-500 px-4 py-4 animate-bounce"
        onClick={() => setShowAdditionalButtons(!showAdditionalButtons)}
      >
        <IonIcon name="add-outline" className="text-2xl" />
      </a>

      {showAdditionalButtons && (
        <div className="fixed bottom-28 right-5 flex flex-col gap-2 z-[999999]">
          <motion.a
            href="#konsultasi"
            className="flex items-center justify-center gap-2 bg-red-600 text-white px-4 py-2 rounded-full"
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5 }}
          >
            <IonIcon name="megaphone-outline" className="text-xl" />
            Laporkan Kenakalan!
          </motion.a>

          <motion.a
            className="flex  gap-2 bg-green-600 text-white px-4 py-2 rounded-full cursor-pointer"
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.5, delay: 0.2 }}
            onClick={() => setIsOpen(true)} // Trigger modal chatbot
          >
            <IonIcon name="chatbubbles-outline" className="text-xl" />
            Chat dengan AI
          </motion.a>
        </div>
      )}
    </div>
  );
};

export default FloatingButton;
