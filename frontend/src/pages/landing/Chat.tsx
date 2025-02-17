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
    handleScroll();

    axios
      .get("/chat/")
      .then((response) => {
        setMessages(response.data.reverse());
      })
      .catch((error) => {
        console.error("Error fetching messages:", error);
      });

    const pusher = new Pusher("cb18b6e07fc02084de32", {
      cluster: "ap1",
      wsHost: "127.0.0.1",
    });

    Pusher.logToConsole = true;

    const channel = pusher.subscribe("chat-channel");
    channel.bind("new-message", (event: any) => {
      setMessages((prev) => [...prev, event.message]);
    });

    return () => {
      pusher.unsubscribe("chat-channel");
      pusher.disconnect();
    };
  }, []);

  useEffect(() => {
    handleScroll();
  }, [messages]);

  const sendMessage = async (e: FormEvent) => {
    e.preventDefault();
    if (message.trim() === "") return;

    try {
      await axios.post("/chat/", { message });
      setMessage("");
    } catch (error) {
      console.error("Error sending message:", error);
    }
  };

  const handleScroll = () => {
    if (chatContainerRef.current) {
      chatContainerRef.current.scrollTop = chatContainerRef.current.scrollHeight;
    }
  };

  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4 py-10">
      <div className="bg-white shadow-lg rounded-xl p-6 w-full max-w-2xl">
        <h1 className="text-center text-3xl font-bold text-gray-800 mb-2">Forum</h1>
        <p className="text-center text-gray-600 mb-5">Diskusi seputar kenakalan remaja</p>
        <div
          ref={chatContainerRef}
          className="h-80 overflow-y-auto border border-gray-300 rounded-lg p-4 bg-gray-50">
          {messages.map((msg, index) => (
            <div key={index} className="mb-3">
              <strong className="text-blue-600">{msg.username}:</strong>
              <p className="bg-white shadow-sm p-2 rounded-lg mt-1">{msg.message}</p>
            </div>
          ))}
        </div>
        <form onSubmit={sendMessage} className="mt-4 flex flex-col gap-2">
          <input
            type="text"
            value={message}
            onChange={(e) => setMessage(e.target.value)}
            placeholder="Ketik pesan..."
            className="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
          />
          <button
            type="submit"
            className="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-all">
            Kirim
          </button>
        </form>
      </div>
    </div>
  );
};

export default Chat;