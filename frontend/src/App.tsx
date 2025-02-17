
import Chat from "./pages/landing/Chat";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Footer } from "./components/Footer";
import Navbar from "./components/Navbar";
import About from "./pages/landing/About";
import Data from "./pages/landing/Data";
import Dokumentasi from "./pages/landing/Dokumentasi";
import Home from "./pages/landing/Home";
import Kasus from "./pages/landing/Kasus";
import Konsultasi from "./pages/landing/Konsultasi";
import Pengaruh from "./pages/landing/Pengaruh";
import Team from "./pages/landing/Team";
import Berita from "./pages/landing/Berita";

function App() {
  return (
    <BrowserRouter>
      <Navbar />
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
              <Dokumentasi />
              <Team />
              <Berita/>
              <Chat />
              <Footer />
            </>
          }
        />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
