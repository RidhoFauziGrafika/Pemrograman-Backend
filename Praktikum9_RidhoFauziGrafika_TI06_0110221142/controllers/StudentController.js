// import model student
const Student = require("../models/Student");

// membuat class studentController
class StudentController {
    async index(req, res){
        // memanggil method static all dengan asyc await
        const students = await Student.all();

        // data array lebih dari 0
        if(students.length > 0){
            const data = {
                message: "Menampilkan semua students",
                data: students
            };
            res.status(200).json(data);
        }else {
            const data = {
                message: "Student is empty"
            };

            res.status(200).json(data);
        }
    }

    async store(req, res){
        /*
            validasi sederhana
            handle jika salah satu data tidak diterima
        */
        // destructing object req.body
        const {nama, nim, email, jurusan} = req.body;

        // jika data undefined maka kirim response error
        if(!nama || !nim || !email || !jurusan){
            const data = {
                message: "Semua data harus dikirim"
            };

            return res.status(422).json(data);
        }

        const student = await Student.create(req.body);
        const data = {
            message: `Menambahkan data student`,
            data: student
        };

        return res.status(201).json(data);
    }

    async update(req, res){
        const { id } = req.params;
        // cari id student yang ingin di update
        const student = await Student.find(id);

        if(student){
            // melakukan update data
            const student = await Student.update(id,req.body);
            const data = {
                message : 'Mengedit data student',
                data : student,
            };
            res.status(200).json(data);
        }
        else {
            const data = {
                message: `Student not found`
            };
            res.status(404).json(data); 
        }
    }

    async destroy(req, res){
        
        const {id} = req.params;
        const student = await Student.find(id);

        if(student){
            await Student.delete(id);
            const data = {
                message : `Menghapus data students`,
            };
            res.status(200).json(data);
        }else {
            const data = {
                message : `Student not found`,
            };
            res.status(404).json(data);
        }
    }

    async show(req, res){
        const { id } = req.params;
        // cari student berdasarkan id
        const student = await Student.find(id);

        if(student){
            const data = {
                message : `Menampilkan detail students`,
                data : student
            };

            res.status(200).json(data);
        }
        else {
            const data = {
                message: `Student not found`
            };

            res.status(404).json(data);
        }
    }
}

// membuat object studentController
const object = new StudentController();

// export object studentController
module.exports = object;