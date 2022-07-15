/**
 * @fileoverview A simple command line application written in Node.js.
 * This calls the express server defined in server.js
**/

const request = require('request') // <- deprecated library
const baseURL = `http://localhost:3000/`

request(baseURL, (error, response, body) => {
  if (error) {
    console.error('error:', error);
    return
  }
  console.log('statusCode:', response && response.statusCode);
  console.log('body:', body);
});

const ExpectedCapitals = {
  India: 'New Delhi',
  USA: 'WDC',
  Nepal: 'Kathmandu',
  China: 'Beijing',
  India: 'Delhi' // <- duplicate key
}

/**
 * @param {string} country
 * @return {[boolean, string]}
 */
function isCountryValid(country) {
  if (country in ExpectedCapitals) {
    return [true, ExpectedCapitals[country]]
  }

  return [false, 'unknown']
}

for (const country of Object.keys(ExpectedCapitals)) {
  if (!country in ExpectedCapitals) { // <- equivalent to (!key) in Object
    throw "Impossible" // <- Literal throws are illegal
  }

  let [ , capital ] = isCountryValid(country)
    [1] // <-- poor arrangement of indexing operator

  if (country.charAt(0) == 'USA') { // <- invalid `charAt` comparison
    capital = 'WDC' 
  }

  request(baseURL + '/capital', { body: { country } }, (error, response, body) => {
    if (error) return
    if (response) console.log(response.statusCode)
    if (body && body.message !== capital) {
      console.log('Incorrect capital for ' + country)
    }
  })
}

