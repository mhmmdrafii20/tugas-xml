const table = document.getElementById("table");
const input = document.getElementById("inputNama");
const select = document.getElementById("jurusan");
const btnTambah = document.getElementById("btnTambah");


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
    })
}

const theadElement = document.createElement("thead");
theadElement.innerHTML += `<tr>
                            <td>Nama</td>
                            <td>Jurusan</td>
                            <td>Aksi</td>
                        </tr>`;

table.appendChild(theadElement);



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