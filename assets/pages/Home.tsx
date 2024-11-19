import React, { useState } from 'react'

export default function Home() {
    const [count, setCount] = useState<number>(() => {
        const savedCount = localStorage.getItem("count");
        return savedCount ? JSON.parse(savedCount) : 0;
    });

    const incrementCount = () => {
        setCount(count => {
            const newCount = count + 1;
            localStorage.setItem("count", JSON.stringify(newCount));
            return newCount;
        });
    };

    return (
        <div>
            <h1 className="text-4xl bg-red-500">Home</h1>
            <p>This is the Home page.</p>
            <button onClick={incrementCount}>
                Count is {count}
            </button>
        </div>
    )
}