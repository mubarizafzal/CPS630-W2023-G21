import './App.css';
import ReactDOM from "react-dom/client";
import React from 'react';
import { BrowserRouter, Route, Routes } from 'react-router-dom';

import Layout from './components/Layout';
import About from './components/About';
import Contact from './components/Contact';
import Admin from './components/Admin';
import SignUp from './components/SignUp';
import SignIn from './components/SignIn';
import Shopping from './components/Shopping';
import Delivery from './components/Delivery';
import ServiceC from './components/ServiceC';
import Payment from './components/Payment';
import Review from './components/Review';
import Profile from './components/Profile';
import Orders from './components/Orders';

export default function App() {
  return (
    <>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Layout loggedIn={true} />}>
            <Route path="/signin" element={<SignIn />}> </Route>
            <Route path="/signup" element={<SignUp />}> </Route>
            <Route path="/admin" element={<Admin />}></Route>
            <Route path="/profile" element={<Profile />}></Route>
            <Route path="/shopping" element={<Shopping />}></Route>
            <Route path="/delivery" element={<Delivery />}></Route>
            <Route path="/serviceC" element={<ServiceC />}></Route>
            <Route path="/payment" element={<Payment />}></Route>
            <Route path="/review" element={<Review />}></Route>
            <Route path="/about" element={<About />}></Route>
            <Route path="/contact" element={<Contact />}></Route>
            <Route path="/orders" element={<Orders />}></Route>
          </Route>
        </Routes>
      </BrowserRouter>
    </>
  );
}
const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(<App />);