import { index, store, destroy } from "./controller.mjs";

const main = () => {
    // Tambahkan dua data baru
    store({ nama: 'Data 11', umur: 30, alamat: 'Jl. Data 11', email: 'data11@email.com' });
    store({ nama: 'Data 12', umur: 31, alamat: 'Jl. Data 12', email: 'data12@email.com' });

    // Tampilkan data
    index();

    // Hapus salah satu data
    destroy('Data 5');

    // Tampilkan data setelah dihapus
    index();
};

main();
