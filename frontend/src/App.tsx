
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
              <NewsPage/>
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
