// mengimport data fruits menggunakan require
let fruits = require("./Fruits.js");

// membuat fungsi index dan store
const index = () => {
    for (const fruit of fruits){
        console.log(fruit);
    }
};

const store = (name) => {
    fruits.push(name);
    console.log(`\nMethod Store - Menambahkan buah ${name}`);
    index();
};

// membuat fungsi update dan destroy

const update = (position, name) => {
    fruits[position] = name;
    console.log(`\nMethod Update - Update data ${position} menjadi ${name}`);
    index();
}

const destroy = (position) => {
    fruits.splice(position,1);
    console.log(`\nMethod Destroy - menghapus data ${position}`);
    index();
}


// menge-export method index dan store
module.exports = {index, store, update, destroy};