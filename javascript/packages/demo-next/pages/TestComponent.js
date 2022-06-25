import Head from "next/head";

/** next-google-font-display */
export default Test = () => {
  return (
    <Head>
      <link
        href="https://fonts.googleapis.com/css2?family=Krona+One"
        rel="stylesheet"
      />
    </Head>
  );
};


/** next-google-font-preconnect */
export const TestTwo = () => (
  <div>
    <link href="https://fonts.gstatic.com" />
  </div>
);


/** no-page-custom-font */
export function IndexPage() {
    return (
        <div>
            <Head>
              <link
                href="https://fonts.googleapis.com/css2?family=Inter"
                rel="stylesheet"
              />
            </Head>
            <p>Hello world!</p>
        </div>
    )
}

/** no-sync-scripts */
export const Home = () => {
  return (
    <div class="container">
      <script src="https://third-party-script.js"></script>
      <div>Home Page</div>
    </div>
  )
}
 
