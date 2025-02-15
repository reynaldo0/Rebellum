import { BrowserRouter, Routes, Route } from "react-router-dom";
import { Footer } from "./components/Footer";
import Navbar from "./components/Navbar";
import Login from "./pages/dashboard/admin/Dashboard";
import About from "./pages/landing/About";
import Data from "./pages/landing/Data";
import Dokumentasi from "./pages/landing/Dokumentasi";
import Home from "./pages/landing/Home";
import Kasus from "./pages/landing/Kasus";
import Konsultasi from "./pages/landing/Konsultasi";
import Pengaruh from "./pages/landing/Pengaruh";
import Team from "./pages/landing/Team";

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
              <Footer />
            </>
          }
        />
        <Route path="/login" element={<Login />} />
      </Routes>
    </BrowserRouter>
  );
}

export default App;
