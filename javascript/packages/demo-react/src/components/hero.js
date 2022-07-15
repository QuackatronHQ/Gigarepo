import React from "react";

export default function Hero({ className, title }) {
  return (
    <>
      <div className={className}>{title}</div>
      <br dangerouslySetInnerHTML={{ __html: 'HTML' }} />
    </>
  );
}
