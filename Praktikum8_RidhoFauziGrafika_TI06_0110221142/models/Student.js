// import database
const db = require("../config/database");

// membuat class model student
class Student {
    // membuat method static all
    static all(){
        // return promise sebagai solusi asynchronous
        return new Promise((resolve, reject) => {
            const query = "SELECT * FROM students";
    
            /* 
                melakukan query menggunakan method query
                menerima 2 params query dan callback
            */
            
            db.query(query, (err, results) => {
                resolve(results);
            });
    
        })
    }

    static create(req){
        // return promise sebagai solusi asynchronous
        return new Promise((resolve, reject) => {
            const query = "INSERT INTO students SET ?";
            db.query(query,req,(err, results) => {
                if(err) throw err;
                const query = `SELECT * FROM students WHERE id = ${results.insertId}`;
                db.query(query, (err,results) => {
                    resolve(results);
                });
            });
        });
    }
}

// export class student
module.exports = Student;