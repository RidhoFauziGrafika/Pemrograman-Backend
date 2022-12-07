const showDownload = (value) => {
    return new Promise((resolve) => {
        setTimeout(() => {
            console.log("Download Selesai");
            resolve(value);
        },3000);
    });
};

const callShowDownload = (result) => {
    console.log(`Hasil Download : ${result}`);
}

const main = () => {
    showDownload("windows-10.exe").then((res) => {
        return callShowDownload(res);
    });
};

main();