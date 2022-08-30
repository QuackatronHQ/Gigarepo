import React from "react";
import Hero from "./hero";

export default function Home({ title, features }) {
  return (
    <>
      <h1
        class="no-unknown-property"
        font-size="24"
        onClick={() => console.log("Should not use bind in JSX props")}
      >
        {title || "Welcome to DeepSource"}
      </h1>
      <Hero
        className="bg"
        title="DeepSource is how you write clean and secure code"
        title=""
      />
      <ul>
        {features.map((feature) => (
          <li>{feature.title}</li>
        ))}
      </ul>
      <button>Login</button>
      <SideBar />
      <a href="javascript:void(0)" target="_blank" rel="noreferrer">
        FAQs
      </a>
    </>
  );
}
