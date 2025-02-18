import axios from "axios";
import Pusher from "pusher-js";
import { FormEvent, useEffect, useRef, useState } from "react";
import { motion, AnimatePresence } from "framer-motion";

interface MessagesType {
  username: string;
  message: string;
  created_at: string;
}

axios.defaults.baseURL = "http://127.0.0.1:8000/api";

const Chat = () => {
  const [messages, setMessages] = useState<MessagesType[]>([]);
  const [message, setMessage] = useState<string>("");
  const chatContainerRef = useRef<HTMLDivElement>(null);

  // To keep track of timestamps in real-time
  const [timeNow, setTimeNow] = useState<Date>(new Date());

  useEffect(() => {
    const interval = setInterval(() => {
      setTimeNow(new Date());
    }, 1000);

    axios
      .get("/chat/")
      .then((response) => {
        setMessages(response.data.reverse());
        handleScroll();
      })
      .catch((error) => {
        console.error("Error fetching messages:", error);
      });

    const pusher = new Pusher("cb18b6e07fc02084de32", {
      cluster: "ap1",
      wsHost: "127.0.0.1",
    });

    const channel = pusher.subscribe("chat-channel");
    channel.bind("new-message", (event: any) => {
      setMessages((prev) => [...prev, event.message]);
      handleScroll();
    });

    return () => {
      clearInterval(interval);
      pusher.unsubscribe("chat-channel");
      pusher.disconnect();
    };
  }, []);

  const sendMessage = async (e: FormEvent) => {
    e.preventDefault();
    if (message.trim() === "") return;

    try {
      // const newMessage = {
      //   username: "Anonim",
      //   message,
      //   created_at: new Date().toISOString(),
      // };
      // setMessages((prev) => [...prev, newMessage]);

      setMessage(""); // Reset input
      handleScroll();

      await axios.post("/chat/", { message });
    } catch (error) {
      console.error("Error sending message:", error);
    }
  };

  const handleScroll = () => {
    setTimeout(() => {
      if (chatContainerRef.current) {
        chatContainerRef.current.scrollTop =
          chatContainerRef.current.scrollHeight;
      }
    }, 100);
  };

  const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    const diff = Math.floor((timeNow.getTime() - date.getTime()) / 1000);

    if (diff < 60) return `${diff} detik yang lalu`;
    const minutes = Math.floor(diff / 60);
    if (minutes < 60) return `${minutes} menit yang lalu`;
    const hours = Math.floor(minutes / 60);
    if (hours < 24) return `${hours} jam yang lalu`;
    const days = Math.floor(hours / 24);
    return `${days} hari yang lalu`;
  };

  return (
    <div className="min-h-screen flex items-center justify-center px-4 py-10">
      <div className="bg-gray-200 shadow-lg rounded-xl p-6 w-full max-w-2xl">
        <h1 className="text-center text-4xl font-extrabold text-black mb-4">
          Berikan Tanggapan Anda
        </h1>
        <p className="text-center text-lg text-black mb-6">
          Diskusi seputar kenakalan remaja
        </p>

        {/* Chat Box */}
        <div
          ref={chatContainerRef}
          className="h-80 overflow-y-auto border border-gray-300 rounded-lg p-4 bg-white shadow-md">
          <AnimatePresence>
            {messages.map((msg, index) => (
              <motion.div
                key={index}
                initial={{ opacity: 0, y: 10 }}
                animate={{ opacity: 1, y: 0 }}
                exit={{ opacity: 0, y: -10 }}
                transition={{ duration: 0.3 }}
                className="mb-4">
                <div className="flex justify-between">
                  <strong className="text-yellow">Anonim</strong>
                  <span className="text-sm text-gray-500">
                    {formatDate(msg.created_at)}
                  </span>
                </div>
                <p className="bg-gray-50 shadow-sm p-3 rounded-lg mt-1 text-gray-700 break-words whitespace-pre-wrap">
                  {msg.message}
                </p>
              </motion.div>
            ))}
          </AnimatePresence>
        </div>

        {/* Form Input */}
        <form onSubmit={sendMessage} className="mt-6 flex gap-4 items-center">
          <input
            type="text"
            value={message}
            onChange={(e) => setMessage(e.target.value)}
            placeholder="Ketik pesan..."
            className="w-full p-4 rounded-lg text-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"
          />
          <button
            type="submit"
            className="bg-yellow text-white py-3 px-6 rounded-lg font-semibold hover:bg-yellow/90 transition-all">
            Kirim
          </button>
        </form>
      </div>
    </div>
  );
};

export default Chat;
