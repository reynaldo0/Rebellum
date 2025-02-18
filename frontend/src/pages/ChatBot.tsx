import { useState, useRef, useEffect } from "react";
import { IoPaperPlane, IoClose } from "react-icons/io5";
import { useRebelBotAI } from "../libs/gemini";
import ReactMarkdown from "react-markdown";

interface ChatbotModalProps {
  isOpen: boolean;
  setIsOpen: (value: boolean) => void;
}

export default function ChatbotModal({ isOpen, setIsOpen }: ChatbotModalProps) {
  const [messages, setMessages] = useState([
    {
      sender: "bot",
      text: "Halo! 👋 Anda bisa bertanya mengenai kenakalan remaja, narkoba, atau cara menghindarinya.",
    },
  ]);

  const [input, setInput] = useState("");
  const { response, loading, error, askRebelBot } = useRebelBotAI();
  const chatContainerRef = useRef<HTMLDivElement>(null);

  useEffect(() => {
    if (chatContainerRef.current) {
      chatContainerRef.current.scrollTop = chatContainerRef.current.scrollHeight;
    }
  }, [messages]);

  useEffect(() => {
    if (error) {
      setMessages((prev) => [...prev, { sender: "bot", text: error }]);
    }
  },[error]);

  useEffect(() => {
    if (response) {
      setMessages((prev) => [...prev, { sender: "bot", text: response }]);
    }
  }, [response]);

  const sendMessage = async () => {
    if (input.trim() === "") return;
    const userMessage = { sender: "user", text: input };
    setMessages([...messages, userMessage]);
    setInput("");

    await askRebelBot(input);
  };

  return (
    <>
      {isOpen && (
        <div
          className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-[999999999999]"
          onClick={() => setIsOpen(false)}>
          <div
            className="bg-white w-[90%] md:w-[500px] rounded-lg shadow-lg flex flex-col"
            onClick={(e) => e.stopPropagation()}>
            <div className="flex items-center justify-between p-4 border-b">
              <div className="flex items-center gap-2">
                <img
                  src="/icon/avatar.png"
                  alt="Bot Avatar"
                  className="w-10 h-10 rounded-full"
                />
                <div>
                  <h2 className="text-lg font-bold text-primary-100 leading-3">
                    Rebel<span className="text-yellow">Bot</span>
                  </h2>
                  <span className="text-green-500 text-sm">Online</span>
                </div>
              </div>
              <IoClose
                className="w-6 h-6 cursor-pointer text-gray-600 hover:text-red-500"
                onClick={() => setIsOpen(false)}
              />
            </div>

            <div
              ref={chatContainerRef}
              className="p-4 h-[450px] overflow-y-auto space-y-3 font-sans leading-snug">
              {messages.map((msg, index) => (
                <div
                  key={index}
                  className={`flex ${
                    msg.sender === "user" ? "justify-end" : "justify-start"
                  }`}>
                  {msg.sender === "bot" && (
                    <img
                      src="/icon/avatar.png"
                      alt="Bot Avatar"
                      className="w-8 h-8 rounded-full mr-2"
                    />
                  )}
                  <div
                    className={`px-4 py-2 rounded-lg max-w-[75%] ${
                      msg.sender === "user"
                        ? "bg-blue-500 text-white"
                        : "bg-gray-200 text-gray-900"
                    }`}>
                    <ReactMarkdown>{msg.text}</ReactMarkdown>
                  </div>
                  {msg.sender === "user" && (
                    <img
                      src="/icon/user.jpg"
                      alt="User Avatar"
                      className="w-8 h-8 rounded-full ml-2"
                    />
                  )}
                </div>
              ))}
              {loading && (
                <div className="flex justify-start">
                  <img
                    src="/icon/avatar.png"
                    alt="Bot Avatar"
                    className="w-8 h-8 rounded-full mr-2"
                  />
                  <div className="px-4 py-2 rounded-lg bg-gray-200 text-gray-900 max-w-[75%]">
                    ✨ Sedang mengetik...
                  </div>
                </div>
              )}
            </div>

            <div className="p-4 border-t flex items-center gap-2">
              <input
                type="text"
                className="w-full p-2 border rounded-lg outline-none"
                placeholder="Tulis pesan..."
                value={input}
                onChange={(e) => setInput(e.target.value)}
                onKeyDown={(e) => e.key === "Enter" && sendMessage()}
              />
              <button
                onClick={sendMessage}
                className="bg-blue-500 p-2 rounded-full text-white hover:bg-blue-600 transition"
                disabled={loading}>
                {loading ? "..." : <IoPaperPlane className="w-5 h-5" />}
              </button>
            </div>
            {error && (
              <p className="text-red-500 text-sm p-4">Error: {error.message}</p>
            )}
          </div>
        </div>
      )}
    </>
  );
}
