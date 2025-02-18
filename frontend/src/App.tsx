
import Chat from "./pages/Chat";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Footer } from "./components/Footer";
import Navbar from "./components/Navbar";
import About from "./pages/About";
import Data from "./pages/Data";
import Dokumentasi from "./pages/Dokumentasi";
import Home from "./pages/Home";
import Kasus from "./pages/Kasus";
import Konsultasi from "./pages/Konsultasi";
import Pengaruh from "./pages/Pengaruh";
import Team from "./pages/Team";
import NewsPage from "./pages/News";
import ChatbotModal from "./pages/ChatBot";
import { useState } from "react";
import FloatingButton from "./components/FloatingButton";

function App() {
  const [isOpen, setIsOpen] = useState(false);
  return (
    <BrowserRouter>
      <Navbar />
      <FloatingButton setIsOpen={setIsOpen} />
      <ChatbotModal isOpen={isOpen} setIsOpen={setIsOpen} />
      <Routes>
        <Route
          path="/"
          element={
            <>
              <Home />
              <About />
              <Kasus />
              <Pengaruh />
              <Data />
              <Konsultasi />
              <NewsPage />
              <Chat />
              <Dokumentasi />
              <Team />
              <Footer />
            </>
          }
        />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
