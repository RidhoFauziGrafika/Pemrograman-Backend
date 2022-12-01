/*
    meg-import fruitController
    melakukan teknik destructing object
*/

let {index, store, update, destroy} = require("./FruitController.js");

// membuat fungsi utama : main
const main = () => {
    // menampilkan seluruh data 
    console.log("Method Index - Menampilkan Buah");
    index();
    // menambahkan data
    store("Pisang");
    // update data
    update(0, "Kelapa");
    // menghapus data
    destroy(0);


};

main();