/*
    meg-import fruitController
    melakukan teknik destructing object
*/

const {index, store, update, destroy} = require("./FruitController.js");

// membuat fungsi utama : main
const main = () => {
    console.log("Method Index - Menampilkan Buah");
    // menampilkan seluruh data
    index();
    // menambahkan
    store("Pisang");
    // update
    update(0, "Kelapa");
    // menghapus
    destroy(0);


};

main();