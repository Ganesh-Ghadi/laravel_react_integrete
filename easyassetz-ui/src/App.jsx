import { useState } from "react";
import Loginpage from "@/Pages/Login/LoginPage";
import Personalpage from "@/Pages/personaldetailpage/Personalpage";
import { Routes, Route } from "react-router-dom";
import { Toaster, toast } from "sonner";

function App() {
  return (
    <div style={{ fontFamily: "Roboto" }}>
      <Toaster position="top-center" richColors />
      <Routes>
        <Route path="/" element={<Loginpage />} />
        <Route path="/personal" element={<Personalpage />} />
        <Route path="/benificiary" element={<Personalpage />} />
        <Route path="/insurance" element={<Personalpage />} />
        <Route path="/lifeinsurance" element={<Personalpage />} />
        <Route path="/lifeinsurance/add" element={<Personalpage />} />
        <Route path="/lifeinsurance/edit" element={<Personalpage />} />
      </Routes>
    </div>
  );
}

export default App;
