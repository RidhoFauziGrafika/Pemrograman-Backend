// import data student dari folder data/student.js
const student = require("../data/students");

// membuat class studentcontroller
class StudentController{
    // menampilkan semua data students
    index(req, res){
        const data = {
            message: `Menampilkan semua students`,
            data: student,
        };
        res.json(data);
    }

    // menambahkan data students
    store(req, res){
        const {nama} = req.body;
        student.push(`${nama}`);
        const data = {
            message: `Menambahkan data student : ${nama}`,
            data: student
        };
        res.json(data);
    }
    
    // mengupdate data students
    update(req, res){
        const {id} = req.params;
        const {nama} = req.body;
        student[id] = nama;
        const data = {
            message: `Mengupdate data student id ${id}, nama ${nama}`,
            data: student,
        };
        res.json(data);
    }
    
    // menghapus data students
    destroy(req, res){
        const {id} = req.params;
        student.splice(id,1);
        const data = {
            message: `Menghapus data student id ${id}`,
            data: student,
        };
        res.json(data);
    }
}

// membuat object studentController
const object = new StudentController();

// export object studentController
module.exports = object;