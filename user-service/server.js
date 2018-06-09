'use strict';

const express = require('express');
const jwt     = require('jsonwebtoken');
const config  = require('./config');
const mysql = require('mysql');


const PORT = 8080;
const HOST = '0.0.0.0';

const app = express();

app.get('/register', (req, res) => {
    
})

app.get('/login', (req, res) => {
    const con = mysql.createConnection({
        host: 'db',
        database: 'blog',
        user: 'root',
        password: 'root',
        multipleStatements: true
    });
    con.connect();
    con.query('SELECT * FROM blog_user', function (error, results, fields) {
        let users = [];
        users.push(results);
        let user = {
            id: 1
        };

        let token = jwt.sign({ id: user.id }, config.secret, {
            expiresIn: 3600
        });

        res.status(200).send({ token, auth: true, users });
    });
    con.end();
})

app.listen(PORT, HOST);