let produkToko = [
    {id: 1, nama: "Laptop", harga: 7000000, stok: 5},
    {id: 2, nama: "Mouse", harga: 200000, stok: 10},
    {id: 3, nama: "Keyboard", harga: 350000, stok: 7}
];

function tambahProduk(nama, harga, stok) {
    let idBaru = produkToko.length > 0 ? produkToko[produkToko.length - 1].id + 1 : 1;
    produkToko.push({ id: idBaru, nama, harga, stok });
    console.log(`Produk ${nama} berhasil ditambahkan.`);
}

function hapusProduk(id) {
    let index = produkToko.findIndex(produk => produk.id === id);
    if (index !== -1) {
        console.log(`Produk ${produkToko[index].nama} berhasil dihapus.`);
        produkToko.splice(index, 1);
    } else {
        console.log("Produk tidak ditemukan.");
    }
}

function tampilkanProduk() {
    console.log("Daftar Produk:");
    produkToko.forEach(produk => {
        console.log(`ID: ${produk.id}, Nama: ${produk.nama}, Harga: ${produk.harga}, Stok: ${produk.stok}`);
    });
}

// Contoh penggunaan fungsi
// tambahProduk("Monitor", 1500000, 4);
// hapusProduk(2);
tampilkanProduk();
