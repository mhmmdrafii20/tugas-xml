import { elements } from "./elements.js";

export function renderXML (xml) {
    const dataList = xml.getElementsByTagName("barang");
    
    elements.thead.innerHTML += `<tr>
                            <td>Kode Barang</td>
                            <td>Nama Barang</td>
                            <td>Harga Perolehan</td>
                            <td>Harga Jual</td>
                            <td>Jumlah Stok</td>
                            <td>Supplier Utama</td>
                            <td>Aksi</td>
                        </tr>`;
    elements.table?.append(elements.thead);

    for (let i = 0; i < dataList.length; i++) {

        const kodeBarang = dataList[i].getElementsByTagName("kode_barang")[0].textContent;
        const namaBarang = dataList[i].getElementsByTagName("nama_barang")[0].textContent;
        const hargaPerolehan = dataList[i].getElementsByTagName("harga_perolehan")[0].textContent;
        const hargaJual = dataList[i].getElementsByTagName("harga_jual")[0].textContent;
        const jumlahStok = dataList[i].getElementsByTagName("jumlah_stok")[0].textContent;
        const supplier_utama = dataList[i].getElementsByTagName("supplier_utama")[0].textContent;

        elements.tbody.innerHTML +=`
            <tr>
                <td>${kodeBarang}</td>
                <td>${namaBarang}</td>
                <td>${hargaPerolehan}</td>
                <td>${hargaJual}</td>
                <td>${jumlahStok}</td>
                <td>${supplier_utama}</td>
                <td>
                <a class="btnEdit" href="form-edit.php?index=${i}">Edit</a>
                <button class="btnDelete" data-index="${i}">Delete</button>
                </td>
            </tr>
            `;
        elements.table?.append(elements.tbody);
    }
}