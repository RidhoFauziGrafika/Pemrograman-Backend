// import model student
const Student = require("../models/Student");

// membuat class studentController
class StudentController {
    async index(req, res){
        // memanggil method static all dengan asyc await
        const students = await Student.all();

        const data = {
            message: "Menampilkan semua students",
            data: students
        };
        res.json(data);
    }

    async store(req, res){
        // memanggil method static all dengan asyc await
        const students = await Student.create(req.body);

        // const nama = req.body;
        const data = {
            message: `Menambahkan data student`,
            data: students
        };
        res.json(data);
    }
}

// membuat object studentController
const object = new StudentController();

// export object studentController
module.exports = object;