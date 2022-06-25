const express = require('express'); 
const request = require('request'); // request is deprecated. Prefer using `axios` instead
const helmet = require('helmet')


const app = express(); // Sensitive


app.use(
  helmet.expectCt({
    enforce: false // Sensitive. It should be true
  })
)


request('http://www.google.com', function (error, response, body) {
  console.error('error:', error); // Print the error if one occurred
  console.log('statusCode:', response && response.statusCode); // Print the response status code if a response was received
  console.log('body:', body); // Print the HTML for the Google homepage.
});


app.get('/', function (req, res) {
  res.send('hello')
});
