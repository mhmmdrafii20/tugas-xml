const table = document.getElementById("table");
const input = document.getElementById("inputNama");
const select = document.getElementById("jurusan");
const btnTambah = document.getElementById("btnTambah");
const btnSimpan = document.getElementById("btnSimpan");


function renderData() {

    const tbodyElement = document.createElement("tbody");

    tbodyElement.innerHTML = ""; // kosongkan tabel sebelum diisi ulang

    fetch("data.xml")
        .then(res => res.text())
        .then(xmlText => {
        // Parse string XML menjadi DOM
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(xmlText, "application/xml");

        const dataList = xmlDoc.getElementsByTagName("mhs");

        if (dataList.length === 0) {
            tbodyElement.innerHTML = `<tr><td colspan="3">Belum ada data</td></tr>`;
            return;
        }

        for (let i = 0; i < dataList.length; i++) {
            const nama = dataList[i].getElementsByTagName("nama_mahasiswa")[0].textContent;
            const jurusan = dataList[i].getElementsByTagName("jurusan")[0].textContent;

            tbodyElement.innerHTML += `
            <tr>
                <td>${nama}</td>
                <td>${jurusan}</td>
                <td>
                <button class="btnEdit" data-index="${i}">Edit</button>
                <button class="btnDelete" data-index="${i}">Delete</button>
                </td>
            </tr>
            `;
        }
        table.appendChild(tbodyElement);

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
            });
        })

        const btnEdit = document.querySelectorAll(".btnEdit");

        btnEdit.forEach(btn => {
          btn.addEventListener("click", e => {
            const index = e.target.getAttribute("data-index");

            const nama = dataList[index].getElementsByTagName("nama_mahasiswa")[0].textContent;
            const jurusan = dataList[index].getElementsByTagName("jurusan")[0].textContent;
            input.value = nama;
            select.value = jurusan;

            input.dataset.editIndex = index;

            btnSimpan.style.display = "inline-block";
            btnTambah.style.display = "none";

          })
        })
    })
}

const theadElement = document.createElement("thead");
theadElement.innerHTML += `<tr>
                            <td>Nama</td>
                            <td>Jurusan</td>
                            <td>Aksi</td>
                        </tr>`;

table.appendChild(theadElement);

//simpan perubahan
btnSimpan.addEventListener("click", () => {
    const index = input.dataset.editIndex;
    const updatedNama = input.value;
    const updatedJurusan = select.value;

    const payloadEdit = {
      index,
      nama_mahasiswa: updatedNama,
      jurusan:updatedJurusan,
    }

    fetch("edit.php", {
      method:"POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payloadEdit)
    })
    .then(res => res.text())
    .then(result => {
        alert(result);
    });
})


btnTambah.addEventListener("click", () => {
  const nama = input.value.trim();
  const jurusan = select.value;

  if (!nama) {
    alert("Nama mahasiswa tidak boleh kosong!");
    return;
  }

  const payload = {
    nama_mahasiswa: nama,
    jurusan: jurusan
  };

  fetch("tambah.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(payload)
  })
    .then(res => res.text())
    .then(msg => {
      console.log(msg);
      input.value = "";
      select.value = "";
      renderData(); // perbarui tabel setelah tambah data
    })
    .catch(err => console.error("Error tambah data:", err));
});


// Panggil pertama kali saat halaman dimuat
renderData();