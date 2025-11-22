import { elements } from "./elements.js";


export function bindListener (xml) {
    const dataList = xml.getElementsByTagName("barang");

    //CREATE
    elements.btnTambah?.addEventListener("click", () => {

        const kodeBarang = elements.inpKBarang.value;
        const namaBarang = elements.inpNBarang.value;
        const hargaPerolehan = elements.inpHargaP.value;
        const hargaJual = elements.inpHargaJ.value;
        const jumlahStok = elements.inpJumlahStok.value;
        const supplierUtama = elements.inpSupplier.value;


        const data = {
           kode_barang:kodeBarang,
           nama_barang:namaBarang,
           harga_perolehan:hargaPerolehan,
           harga_jual:hargaJual,
           jumlah_stok:jumlahStok,
           supplier_utama:supplierUtama,
        }

        fetch("./tambah.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data)
        })
        .then(res => res.text())
        .then(msg => {
            console.log(msg);
        })  
        .catch(err => console.error("Error tambah data:", err));
    })
    //UPDATE
    elements.btnUbah?.addEventListener("click", () => {
        const index = elements.index.value;
        const updatedKodeBarang = elements.inpKBarang.value;
        const updatedNamaBarang = elements.inpNBarang.value;
        const updatedHargaPerolehan = elements.inpHargaP.value;
        const updatedHargaJual = elements.inpHargaJ.value;
        const updatedJumlahStok = elements.inpJumlahStok.value;
        const updatedSupplier = elements.inpSupplier.value;

        const updatedData = {
            index,
            kode_barang: updatedKodeBarang,
            nama_barang:updatedNamaBarang,
            harga_perolehan:updatedHargaPerolehan,
            harga_jual:updatedHargaJual,
            jumlah_stok:updatedJumlahStok,
            supplier_utama:updatedSupplier,
        }

        fetch("./edit.php", {
        method:"POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(updatedData)
        })
        .then(res => res.text())
        .then(result => {
            alert(result);
        });
    });
    //DELETE
    const btnDelete = document.querySelectorAll(".btnDelete");
    btnDelete.forEach(btn => {
        btn.addEventListener("click", e => {
            const index = e.target.getAttribute("data-index");
            fetch("delete.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ index: index })
            })
            .then(res => res.text())
            .then(msg => {
                console.log(msg);
            })
            .catch(err => console.error("Error delete:", err));
        })
    })
    elements.btnCari.addEventListener("click", () => {
        const keyword = elements.inpCari.value;

        fetch("search.php?keyword=" + encodeURIComponent(keyword))
        .then(res => res.text())
        .then(html => {
            elements.tbody.innerHTML = html;
        });
    })
}
