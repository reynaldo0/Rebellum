import { useState } from "react";
import { IoPaperPlane, IoClose } from "react-icons/io5";

interface ChatbotModalProps {
    isOpen: boolean;
    setIsOpen: (value: boolean) => void;
}

export default function ChatbotModal({ isOpen, setIsOpen }: ChatbotModalProps) {
    const [messages, setMessages] = useState([
        { sender: "bot", text: "Halo! 👋 Anda bisa bertanya mengenai kenakalan remaja, narkoba, atau cara menghindarinya." },
    ]);
    const [input, setInput] = useState("");

    const sendMessage = () => {
        if (input.trim() === "") return;
        setMessages([...messages, { sender: "user", text: input }]);
        setInput("");
    };

    return (
        <>
            {isOpen && (
                <div
                    className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
                    onClick={() => setIsOpen(false)} // Close modal when clicking outside
                >
                    <div
                        className="bg-white w-[90%] md:w-[500px] rounded-lg shadow-lg flex flex-col"
                        onClick={(e) => e.stopPropagation()} // Prevent closing when clicking inside modal
                    >
                        <div className="flex items-center justify-between p-4 border-b">
                            <div className="flex items-center gap-2">
                                <img src="/icon/avatar.png" alt="Bot Avatar" className="w-10 h-10 rounded-full" />
                                <div>
                                    <h2 className="text-lg font-bold text-primary-100">Rebel<span className="text-yellow">Bot</span></h2>
                                    <span className="text-green-500 text-sm">Online</span>
                                </div>
                            </div>
                            <IoClose className="w-6 h-6 cursor-pointer text-gray-600 hover:text-red-500" onClick={() => setIsOpen(false)} />
                        </div>

                        <div className="p-4 h-80 overflow-y-auto space-y-3">
                            {messages.map((msg, index) => (
                                <div key={index} className={`flex ${msg.sender === "user" ? "justify-end" : "justify-start"}`}>
                                    {msg.sender === "bot" && <img src="/icon/avatar.png" alt="Bot Avatar" className="w-8 h-8 rounded-full mr-2" />}
                                    <div className={`px-4 py-2 rounded-lg max-w-[75%] ${msg.sender === "user" ? "bg-blue-500 text-white" : "bg-gray-200 text-gray-900"}`}>
                                        {msg.text}
                                    </div>
                                    {msg.sender === "user" && <img src="/icon/user.jpg" alt="User Avatar" className="w-8 h-8 rounded-full ml-2" />}
                                </div>
                            ))}
                        </div>

                        <div className="p-4 border-t flex items-center gap-2">
                            <input type="text" className="w-full p-2 border rounded-lg outline-none" placeholder="Tulis pesan..."
                                value={input} onChange={(e) => setInput(e.target.value)} onKeyDown={(e) => e.key === "Enter" && sendMessage()} />
                            <button onClick={sendMessage} className="bg-blue-500 p-2 rounded-full text-white hover:bg-blue-600 transition">
                                <IoPaperPlane className="w-5 h-5" />
                            </button>
                        </div>
                    </div>
                </div>
            )}
        </>
    );
}
