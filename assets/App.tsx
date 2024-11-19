import React from 'react'
import { BrowserRouter, Link, Route, Routes } from "react-router-dom";
import Home from './pages/Home';
import Test from './pages/Test';

function App() {
    // const [count, setCount] = useState(0)

    return (
        <BrowserRouter>
            <header>
                <nav>
                    <Link to="/home">Home</Link>
                    <Link to="/test">Test</Link>
                </nav>
            </header>
            <Routes>
                <Route path="/home" element={<Home />} />
                <Route path="/test" element={<Test />} />
            </Routes>
        </BrowserRouter>
    )
}

export default App

