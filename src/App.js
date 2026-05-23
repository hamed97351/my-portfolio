import { BrowserRouter, Routes, Route } from "react-router-dom";
import Navbar from "./Navbar";
import Home from "./Home";

import Contact from "./Contact";
import About from "./About";
import Fprojects from "./Fprojects";
import Footer from "./Footer";   

function App() {
  return (
    <BrowserRouter>
       <Navbar />
      <Routes>
           <Route path="/" element={<Home />} />
           
           <Route path="/contact" element={<Contact />} />
           <Route path="/about" element={<About />} />
           <Route path="/Fprojects" element={<Fprojects />} />
      </Routes>
       <Footer />   
    </BrowserRouter>
  );
}
export default App;






