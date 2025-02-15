import axios from "axios";
import Pusher from "pusher-js";
import { FormEvent, useEffect, useRef, useState } from "react";

interface MessagesType {
  username: string;
  message: string;
}

axios.defaults.baseURL = "http://127.0.0.1:8000/api";

const Chat = () => {
  const [messages, setMessages] = useState<MessagesType[]>([]);
  const [message, setMessage] = useState<string>("");

  const chatContainerRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    // Fetch initial messages
    handleScroll();

    axios
      .get("/chat/")
      .then((response) => {
        setMessages(response.data.reverse());
      })
      .catch((error) => {
        console.error("Error fetching messages:", error);
      });

    // Initialize Pusher
    const pusher = new Pusher("cb18b6e07fc02084de32", {
      cluster: "ap1",
      wsHost: "127.0.0.1",
      forceTLS: false,
      disableStats: true,
    });

    Pusher.logToConsole = true;

    pusher.connection.bind("connected", () => {
      console.log("Pusher connected!");
    });

    pusher.connection.bind("error", (err: any) => {
      console.error("Pusher connection error:", err);
    });

    const channel = pusher.subscribe("chat-channel");
    channel.bind("new-message", (event: any) => {
      console.log("New message received:", event);
      setMessages((prev) => [...prev, event.message]);
    });

    return () => {
      pusher.unsubscribe("chat-channel");
      pusher.disconnect();
    };
  }, []);

  useEffect(() => {
    handleScroll();
  }, [messages]); // Jalankan handleScroll setiap kali messages berubah

  const sendMessage = async (e: FormEvent) => {
    e.preventDefault();

    if (message.trim() === "") return;

    try {
      await axios.post("/chat/", {
        message,
      });

      setMessage("");
    } catch (error) {
      console.error("Error sending message:", error);
    }
  };

  const handleScroll = () => {
    if (chatContainerRef.current) {
      chatContainerRef.current.scrollTop =
        chatContainerRef.current.scrollHeight;
    }
  };

  return (
    <div className="pb-[100px] flex flex-col items-center">
      <h1
        data-aos="fade-up"
        data-aos-easing="ease-in-out"
        className="text-center font-radioCasnada text-3xl font-semibold md:text-4xl">
        Forum
      </h1>
      <p
        data-aos="fade-up"
        data-aos-easing="ease-in-out"
        data-aos-delay="100"
        className="text-center text-base text-secondary-200 mb-5">
        Sesi tanya jawab secara langsung terkait kenakalan remaja di sekitar
      </p>

      <div
        ref={chatContainerRef}
        className="border border-gray-300 p-4 h-96 overflow-y-scroll w-[600px]">
        {messages.map((msg, index) => (
          <p key={index} className="mb-2">
            <strong className="font-semibold">{msg.username}:</strong>{" "}
            {msg.message}
          </p>
        ))}
      </div>
      <form onSubmit={sendMessage} className="mt-4 w-[600px]">
        <input
          type="text"
          value={message}
          onChange={(e) => setMessage(e.target.value)}
          placeholder="Ketik pesan..."
          className="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow/60"
        />
        <button
          type="submit"
          className="w-full mt-2 px-4 py-2 bg-yellow text-white rounded-lg hover:bg-yellow/90 focus:outline-none focus:ring-2 focus:ring-blue-500">
          Kirim
        </button>
      </form>
    </div>
  );
};

export default Chat;
