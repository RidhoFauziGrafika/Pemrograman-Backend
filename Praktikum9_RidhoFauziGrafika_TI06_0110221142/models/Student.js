// import database
const db = require("../config/database");

// membuat class model student
class Student {
    // membuat method static all
    static all(){
        // return promise sebagai solusi asynchronous
        return new Promise((resolve, reject) => {
            const sql = "SELECT * FROM students";
    
            /* 
                melakukan query menggunakan method query
                menerima 2 params query dan callback
            */
            
            db.query(sql, (err, results) => {
                resolve(results);
            });
    
        })
    }


    // menambahkan data
    static async create(data, callback){
        // promise 1 melakukan insert data ke database
        const id = await new Promise((resolve, reject) => {
            const sql = "INSERT INTO students SET ?";
            db.query(sql, data, (err, results) => {
                resolve(results.insertId);
            });
        });

       // refactor promise 2 query berdasarkan id
       const student = this.find(id);
       return student;
    }

    static find(id){
        return new Promise((resolve, reject) => {
            const sql = "SELECT * FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                // destructing array
                const [student] = results;
                resolve(student);
            });
        });
    }

    // mengupdate data
    static async update(id, data){
        await new Promise((resolve, reject) => {
            const sql = "UPDATE students SET ? WHERE id = ?";
            db.query(sql, [data, id], (err, results) => {
                resolve(results);
            });
        });

        // mencari data yang baru di update
        const student = await this.find(id);
        return student;
    }

    //menghapus data dari database
    static delete(id){
        return new Promise((resolve, reject) => {
            const sql = "DELETE FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                resolve(results);
            });
        });
    }

    // mencari data berdasarkan id
    static find(id){
        return new Promise((resolve, reject) => {
            const sql = "SELECT * FROM students WHERE id = ?";
            db.query(sql, id, (err, results) => {
                //destructing array
                const [student] = results;
                resolve(student);
            });
        });
    }
}

// export class student
module.exports = Student;