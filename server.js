const express = require('express');
const compression = require('compression');
const serveStatic = require('serve-static');
const helmet = require('helmet');
const app = express();
const port = process.env.PORT || 5000;

app.use(compression());
app.use(helmet());
app.use(serveStatic(__dirname, { index: 'index.html' }));

app.listen(port);

console.log('server started ' + port);
