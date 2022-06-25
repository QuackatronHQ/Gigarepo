import Document from "next/document"

/** next-no-document-import-in-page */
export const Text = () => (
    <p>
        Test
        <a href="/about">About Us</a>
         <img
            src="https://example.com/test"
            alt="Landscape picture"
            width={500}
            height={500}
          />
    </p>
)
