// import express dan routing
const express = require("express");
const router = require("./routes/api");

// membuat object express
const app = express();

// menggunakan routing (router)
app.use(express.json());
app.use(express.urlencoded({extended: true}));

// menggunakan routing (router)
app.use(router);

// mendefinisikan port
app.listen(3000);