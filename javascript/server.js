/**
 * @fileoverview A demo express server.
 */
const express = require('express')
const helmet = require('helmet')
const vm = require('vm');
const fs = require('fs');
const { readFileSync } = require('fs') // <- multiple imports of same path
const process = require('process');
const childProcess = require('child_process')
const httpProxy = require('http-proxy')
const { createProxyMiddleware } = require('http-proxy-middleware')
const libxmljs = require('libxmljs')

const app = express();

const xml = readFileSync('data.xml', 'utf8')
// insecure XML parse
const xmlDoc = libxmljs.parseXmlString(xml, { noblanks: true, noent: true, nocdata: true })
console.log(xmlDoc)

httpProxy.createProxyServer({
  target: 'http://localhost:9000',
  xfwd: true // unsafe
}).listen(8000)

app.use('/proxy',createProxyMiddleware({
    target: 'http://localhost:9000',
    changeOrigin: true,
    xfwd: true // unsafe
}))

app.use(session({ cookie: { secure: false }}))  
app.use(helmet.expectCt({ enforce: false }))


// get a list of all files in the current directory
const path = '.'
childProcess.exec(`ls -l ${path}`, (err, data) => {
  if (err) return
  console.log(data)
})

/**
 * @param code {number} The status code
 * @param response {Response} The express response object
 */
function statusEnd(code = 400, response) { // <- default params should come last
  response.status(code)
  return response.end()
  return true // unreachable code
}

// unsafe permissions
fs.chmodSync("/tmp/fs", 0o777);
process.umask(0o777);

/**
 * @param country {string} name of the country
 * @return name of the capital
 */
function capitalOfCountry(country) {
  "use strict"; // <- local strict mode is discouraged
  let capital = 'unknown'
  switch(country) {
    case 'India': capital = 'New Delhi'  // <- no break or fallthrough comment
    case 'USA': capital = 'Washington DC' 
    case 'China': capital = 'Beijing' 
    case 'Panama': capital = 'Panama City' 
  }
  [country, capital] = [country, capital]// <- assignment where both sides are exactly the same
  return capital
}

// This end point executes code sent as the 'code' property of the
// request object and returns the evaluated value.
app.get('/exec', async (req, res) => {
  try {
    const { code }  = req['body'] // <- uneccessary square bracket notation
    if (typeof code !== 'strign') { // <- bad comparison with `typeof`
      statusEnd(400, res)
      throw "Bad input" // <- Literal 'throw' not supported by runtime
    }

    const runResult = vm.run(code) // <- vulnerable to code injection
    res.json(runResult)
    res.end()
  } catch (err) {
    // empty catch block 
  }
})

// Below is a useless async function without `await`.
app.get('/capital', async (req, res) => {
  const { country } = req.body
  if (country !== country) return statusEnd(400)
  const capital = capitalOfCountry(country)
  const message = 'capital is ' + capital // <- string could be interpolated
  res.json({ message })
  res.end()
})

app.listen(3000, () => console.log('listening @3000'))

